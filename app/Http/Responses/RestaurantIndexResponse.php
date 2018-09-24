<?php

namespace App\Http\Responses;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Responsable;

class RestaurantIndexResponse implements Responsable
{
    protected $restaurants;

    public function __construct(Collection $restaurants)
    {
        $this->restaurants = $restaurants;
    }

    public function toResponse($request)
    {
        if (request()->ajax()) {

            return DataTables::of($this->restaurants)->addIndexColumn()
                    ->addColumn('action', function ($restaurant) {
                        return '<a href="/backend/restaurants/'. $restaurant->slug.'"
                                class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>

                                <a href="/backend/restaurants/'.$restaurant->slug.'/edit"
                                class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>

                                <button data-remote="/backend/restaurants/'.$restaurant->slug.'"
                                class="btn btn-sm btn-danger btn-delete"><i class="glyphicon glyphicon-trash"></i></button>';
                    })
                    ->make(true);
        }

        return view('backend.divisions.index');
    }
}
