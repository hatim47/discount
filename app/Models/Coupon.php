<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model  
{
    


    protected $fillable = [
        'code',
        'title',
        'description',
        'link',
        'discount',
        'start_date',
        'end_date',
        'trend',
        'feature',
        'recom',
        'deals',
        'verified',
        'exclusive',
        'show_top',
        'image',
        'trems',
        'sort_store',
        'sort_cate',
        'view',
        'copon_region',
        'store_id',
        'status',
        'event_id',
         'dyna_id ',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    // ✅ Relationships
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    
    public function region()
    {
        return $this->belongsTo(Region::class, 'copon_region');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'sort_cate');
    }
}
