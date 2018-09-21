<?php

namespace App\Http\Responses;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Responsable;

class CategoryIndexResponse implements Responsable
{
    protected $categories;

    public function __construct(Collection $categories)
    {
        $this->categories = $categories;
    }

    public function toResponse($request)
    {
        if (request()->ajax()) {

            return DataTables::of($this->categories)->addIndexColumn()
                    ->addColumn('action', function ($category) {
                        return '<a href="/backend/categories/'. $category->slug.'"
                                class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>

                                <a href="/backend/categories/'.$category->slug.'/edit"
                                class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>

                                <button data-remote="/backend/categories/'.$category->slug.'"
                                class="btn btn-sm btn-danger btn-delete"><i class="glyphicon glyphicon-trash"></i></button>';
                    })
                    ->make(true);
        }

        return view('backend.categories.index');
    }
}
