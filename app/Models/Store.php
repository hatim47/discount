<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Store extends Model 
{
     protected $fillable = [
            'name',
        'slug',
        'logo',
        'image',
        'promo_text',
        'status',
        'trend',
        'feature',
        'recom',
        'heading',
        'description',
        'link',
        'relat_store',
        'relat_cate',
        'like_store',
        'view',
        'store_region',
        'category_id',
    ];

    // Relationships
     public function region()
    {
        return $this->belongsTo(Region::class, 'store_region');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    // Optional: likes, related, events, etc.
    public function likes()
    {
        return $this->hasMany(StoreLike::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function dynacontents()
{
    return $this->hasMany(Dynacontent::class, 'store_id');
}

    public function trendingWith()
    {
        return $this->hasMany(StoreTrend::class, 'store_id');
    }

    public function categories()
    {
        return $this->hasMany(StoreRelatedCategory::class, 'store_id');
    }

    public function relatedStores()
    {
        return $this->hasMany(StoreRelated::class, 'store_id');
    }
}
