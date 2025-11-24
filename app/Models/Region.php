<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model 
{
  

    protected $fillable = [
        'code',
        'title',
        'status',
    ];

    // ✅ Relationships
    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
