<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateRelated extends Model 
{
 use HasFactory;

    protected $fillable = [
        'store_id',
        'related_cate_id',
    ];

    // ✅ Relationships
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'related_cate_id');
    }
}
