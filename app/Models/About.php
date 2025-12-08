<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
    'heading1',
    'heading2',
    'head2sub1',
    'head2sub1text',
    'head2sub2',
    'head2sub2text',
    'head2sub3',
    'head2sub3text',
    'heading3',
    'heading3text',
    'head3sub1',
    'head3sub1text',
    'head3sub2',
    'head3sub2text',
    'head3sub3',
    'head3sub3text',
    'heading4',
    'heading4text',
    'm_tiitle',
    'm_descrip',
    'about_region',
];

    // Parent store
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class, 'about_region');
    }
}
