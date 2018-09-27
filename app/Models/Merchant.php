<?php

namespace App\Models;

use App\Models\User;
use App\Models\Restaurant;
use App\Scopes\MerchantScope;
use Illuminate\Database\Eloquent\Model;

class Merchant extends User
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new MerchantScope);
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
