<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stocks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_mm', 'name_en', 'uuid', 'net_price', 'discounted_price', 'image'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function getImagePathAttribute()
    {
        return asset('storage/stocks/' . $this->image);
    }
}
