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
                    ->editColumn('image', function($stockstock) {
                        return '<div class="thumbnail" style="max-height: 60px;overflow: hidden;">
                                <img alt="" src="'.$restaurant->image_path.'"></div>';
                    })
                    ->editColumn('opening_time', function($stock) {
                        return date('h:i A', strtotime($stock->opening_time));;
                    })
                    ->editColumn('closing_time', function($stock) {
                        return date('h:i A', strtotime($stock->closing_time));;
                    })
                    ->addColumn('action', function ($stock) {
                        return '<a href="/backend/stocks/'. $stock->slug.'"
                                class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>

                                <a href="/backend/stocks/'.$stock->slug.'/edit"
                                class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>

                                <button data-remote="/backend/stocks/'.$stock->slug.'"
                                class="btn btn-sm btn-danger btn-delete"><i class="glyphicon glyphicon-trash"></i></button>';
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
        }

        return view('backend.stocks.index');
    }
}
