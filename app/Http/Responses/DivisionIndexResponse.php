<?php

namespace App\Http\Responses;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Responsable;

class DivisionIndexResponse implements Responsable
{
    protected $divisions;

    public function __construct(Collection $divisions)
    {
        $this->divisions = $divisions;
    }

    public function toResponse($request)
    {
        if (request()->ajax()) {

            return DataTables::of($this->divisions)->addIndexColumn()
                    ->addColumn('action', function ($division) {
                        return '<a href="/backend/divisions/'. $division->slug.'"
                                class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>

                                <a href="/backend/divisions/'.$division->slug.'/edit"
                                class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>

                                <button data-remote="/backend/divisions/'.$division->slug.'"
                                class="btn btn-sm btn-danger btn-delete"><i class="glyphicon glyphicon-trash"></i></button>';
                                // <button data-remote="/backend/division/'.$division->name.'"
                                // class="btn btn-xs btn-info btn-delete"><i class="glyphicon glyphicon-ok"></i> </button>';
                    })
                    ->make(true);
        }

        return view('backend.divisions.index');
    }
}
