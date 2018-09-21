<?php

namespace App\Http\Responses;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Responsable;

class TownshipIndexResponse implements Responsable
{
    protected $townships;

    public function __construct(Collection $townships)
    {
        $this->townships = $townships;
    }

    public function toResponse($request)
    {
        if (request()->ajax()) {

            return DataTables::of($this->townships)->addIndexColumn()
                    ->editColumn('division_id', function($township) {
                        return $township->division->name;
                    })
                    ->addColumn('action', function ($township) {
                        return '<a href="/backend/townships/'. $township->slug.'"
                                class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>

                                <a href="/backend/townships/'.$township->slug.'/edit"
                                class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>

                                <button data-remote="/backend/townships/'.$township->slug.'"
                                class="btn btn-sm btn-danger btn-delete"><i class="glyphicon glyphicon-trash"></i></button>';
                    })
                    ->make(true);
        }

        return view('backend.townships.index');
    }
}
