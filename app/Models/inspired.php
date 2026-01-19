<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inspired extends Model
{
    //
        protected $fillable = [
        'titel',
        'descr',
        'heading',
        'subheading',
        'longdiscription',
        'regions',
    ];
       public function region()
     
    {
        return $this->belongsTo(Region::class, 'regions');
    }
}
