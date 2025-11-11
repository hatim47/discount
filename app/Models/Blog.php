<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

 protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image', 'author', 'published',
    ];

    // Auto-generate slug when saving
    protected static function booted()
    {
        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
        });
    }

}
