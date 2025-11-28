<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynaPage extends Model
{
  
    protected $fillable = [
        'name',
        'banner',
        'slug',
        'heading',
        'shortdiscription',
        'longdiscription',
          'status',
        'm_tiitle',
        'm_descrip',
        'dyna_region',
         'ismenu'

    ];
 public function region()
    {
        return $this->belongsTo(Region::class, 'dyna_region');
    }
}
