<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class advertise extends Model
{
    //

   
    protected $fillable = [
        'titel',
        'descr',
        'heading',
        'subheading',
        'contents',
        'longdiscription',
        'regions',
    ];
       public function region()
    {
        return $this->belongsTo(Region::class, 'regions');
    }
}
