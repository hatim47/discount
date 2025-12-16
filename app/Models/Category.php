<?php

namespace App\Models;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Category extends Model 
{
  

    protected $fillable = [
         'name',
        'slug',
        'status',
        'trend',
        'm_title',
        'm_descrip',
        'shrt_content',
        'long_content',
        'logo', 
        'url',
        'ismenu',
        'feature',
        'recom',
        'relat',
        'like',
        'showe',
        'cate_region',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'cate_region');
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    //   protected static function booted()
    // {
    //     static::saving(function ($category) {
    //         $category->slug = Str::slug($category->name);
    //     });
    // }
}
