<?php

namespace App\Http\Responses;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Responsable;

class MerchantIndexResponse implements Responsable
{
    protected $merchants;

    public function __construct(Collection $merchants)
    {
        $this->merchants = $merchants;
    }

    public function toResponse($request)
    {
        if (request()->ajax()) {

            return DataTables::of($this->merchants)->addIndexColumn()
                    ->addColumn('action', function ($merchant) {
                        return '<a href="/backend/merchants/'. $merchant->slug.'"
                                class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>

                                <a href="/backend/merchants/'.$merchant->slug.'/edit"
                                class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>

                                <button data-remote="/backend/merchants/'.$merchant->slug.'"
                                class="btn btn-sm btn-danger btn-delete"><i class="glyphicon glyphicon-trash"></i></button>';
                    })
                    ->make(true);
        }

        return view('backend.merchants.index');
    }
}
