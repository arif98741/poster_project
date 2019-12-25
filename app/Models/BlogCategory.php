<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;

class BlogCategory extends Model
{
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(BlogPost::class);
    }
    
}
