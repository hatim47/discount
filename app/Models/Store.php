<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;
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
        'ismenu',
        'category_id',
        'm_tiitle',
        'socails',
        'm_descrip',

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
        return $this->belongsToMany(    Store::class,        
        'store_likes',    
        'store_id',          
        'like_store_id'   
    );
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
        return $this->belongsToMany(
        Store::class,
        'store_trends',
        'store_id',
        'trend_store_id'
        );
    }

    public function categories()
    {
       return $this->belongsToMany(
        Category::class,
        'store_related_categories', 
        'store_id',                 
        'category_id'               
    );
    }

    public function relatedStores()
    {
        return $this->belongsToMany(
        Store::class,        
        'store_related',    
        'store_id',          
        'related_store_id'   
    );
    }

       public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

        protected static function booted()
        {
            static::saving(function ($store) {
                $store->slug = Str::slug($store->name);
            });
        }

    
}
