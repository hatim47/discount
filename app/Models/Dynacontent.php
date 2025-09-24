<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dynacontent extends Model
{
     

    protected $fillable = [
        'store_id',
        'heading',
        'description',
    ];

    // 🔗 Relationship: each dynacontent belongs to one store
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
