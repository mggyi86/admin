<?php

namespace App\Http\Responses;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Responsable;

class StockIndexResponse implements Responsable
{
    protected $stocks;

    public function __construct(Collection $stocks)
    {
        $this->stocks = $stocks;
    }

    public function toResponse($request)
    {
        if (request()->ajax()) {

            return DataTables::of($this->stocks)->addIndexColumn()
                    ->editColumn('restaurant_id', function($stock) {
                        return $stock->restaurant->name;
                    })
                    ->editColumn('image', function($stock) {
                        return '<div class="thumbnail" style="max-height: 60px;overflow: hidden;">
                                <img alt="" src="'.$stock->image_path.'"></div>';
                    })
                    ->addColumn('action', function ($stock) {
                        return '<a href="/backend/stocks/'. $stock->uuid.'"
                                class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>

                                <a href="/backend/stocks/'.$stock->uuid.'/edit"
                                class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>

                                <button data-remote="/backend/stocks/'.$stock->uuid.'"
                                class="btn btn-sm btn-danger btn-delete"><i class="glyphicon glyphicon-trash"></i></button>';
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
        }

        return view('backend.stocks.index');
    }
}
