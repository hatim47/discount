<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model 
{
   use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'status',
    ];

    // ✅ Relationships
    public function stores()
    {
        return $this->hasMany(Store::class, 'store_region');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'cate_region');
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'copon_region');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'event_region');
    }
}
