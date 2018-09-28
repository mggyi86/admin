<?php

namespace App\Providers;

use App\Models\Merchant;
use App\Models\Restaurant;
use App\Observers\MerchantObserver;
use App\Observers\RestaurantObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Merchant::observe(MerchantObserver::class);
        Restaurant::observe(RestaurantObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
