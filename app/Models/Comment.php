<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $guarded = [];
    
    public function blog_posts()
    {
        return $this->belongsToMany(BlogPost::class);
    }
}