<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLike extends Model
{

    protected $fillable = [
        'store_id',
        'like_store_id',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function likeStore()
    {
        return $this->belongsTo(Store::class, 'like_store_id');
    }
}
