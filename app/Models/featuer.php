<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class featuer extends Model
{
    //
            protected $fillable = [
        'titel',
        'descr',
        'content',
        'regions',
    ];
       public function region()
     
    {
        return $this->belongsTo(Region::class, 'regions');
    }
}
