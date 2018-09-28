<?php

namespace App\Observers;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Log;

class RestaurantObserver
{
    /**
     * Handle the restaurant "created" event.
     *
     * @param  \App\Restaurant  $restaurant
     * @return void
     */
    public function created(Restaurant $restaurant)
    {
        //
    }

    /**
     * Handle the restaurant "updated" event.
     *
     * @param  \App\Restaurant  $restaurant
     * @return void
     */
    public function updated(Restaurant $restaurant)
    {
        //
    }

    /**
     * Handle the restaurant "deleted" event.
     *
     * @param  \App\Restaurant  $restaurant
     * @return void
     */
    public function deleted(Restaurant $restaurant)
    {
        $restaurant->stocks()->delete();
        Log::info('Restaurant id ' . $restaurant->id . '/Restaurant Name ' . $restaurant->name . '\'s stocks had successfully deleted');
    }

    /**
     * Handle the restaurant "restored" event.
     *
     * @param  \App\Restaurant  $restaurant
     * @return void
     */
    public function restored(Restaurant $restaurant)
    {
        //
    }

    /**
     * Handle the restaurant "force deleted" event.
     *
     * @param  \App\Restaurant  $restaurant
     * @return void
     */
    public function forceDeleted(Restaurant $restaurant)
    {
        //
    }
}
