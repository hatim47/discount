<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Event extends Model 
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'heading',
        'description',
        'banner',
        'start_date',
        'end_date',
        'top_events',
        'status',
        'event_region',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
    ];

    // ✅ Relationships
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
