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
                    ->editColumn('user_id', function($restaurant) {
                        return $restaurant->user->name;
                    })
                    ->editColumn('image', function($restaurant) {
                        return '<div class="thumbnail" style="max-height: 60px;overflow: hidden;">
                                <img alt="" src="'.$restaurant->image_path.'"></div>';
                    })
                    ->editColumn('opening_time', function($restaurant) {
                        return date('h:i A', strtotime($restaurant->opening_time));;
                    })
                    ->editColumn('closing_time', function($restaurant) {
                        return date('h:i A', strtotime($restaurant->closing_time));;
                    })
                    ->addColumn('action', function ($restaurant) {
                        return '<a href="/backend/restaurants/'. $restaurant->slug.'"
                                class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>

                                <a href="/backend/restaurants/'.$restaurant->slug.'/edit"
                                class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>

                                <button data-remote="/backend/restaurants/'.$restaurant->slug.'"
                                class="btn btn-sm btn-danger btn-delete"><i class="glyphicon glyphicon-trash"></i></button>';
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
        }

        return view('backend.restaurants.index');
    }
}
