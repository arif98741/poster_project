<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(BlogPost::class);
    }
}