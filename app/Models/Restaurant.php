<?php

namespace App\Models;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'restaurants';

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
        'name', 'slug', 'contact_name', 'phone', 'email', 'address', 'description','service_charges(%)',
        'packagings(per item)', 'opening_time', 'closing_time', 'image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function getImagePathAttribute()
    {
        return asset('storage/restaurants/' . $this->image);
    }

    public function getServiceChargesAttribute()
    {
        return $this->{'service_charges(%)'};
    }

    public function getPackagingsAttribute()
    {
        return $this->{'packagings(per item)'};
    }
}
