<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model 
{
   

    protected $fillable = [
        'title',
        'slug',
        'heading',
        'description',
        'thumbnail',
        'banner',
        'start_date',
        'end_date',
        'top_events',
        'status',
        'm_tiitle',
        'm_descrip',
        'event_region',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
    ];
    public function region()
    {
        return $this->belongsTo(Region::class, 'event_region');
    }

    // If events are tied to stores
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_events', 'event_id', 'store_id');
    }
}
