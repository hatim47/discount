<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreRelatedCategory extends Model
{
     protected $fillable = [
        'store_id',
        'category_id',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
