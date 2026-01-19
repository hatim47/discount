<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentt extends Model
{
    //
    protected $fillable = [
        'titel',
        'descr',
        'heading',
        'subheading',
        'contents',
        'regions',
    ];
         public function region()
     {
          return $this->belongsTo(Region::class, 'regions');
     }
}
