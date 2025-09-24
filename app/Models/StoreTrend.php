<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreTrend extends Model
{
    protected $fillable = [
        'store_id',
        'trend_store_id',
    ];

    // Parent store
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
