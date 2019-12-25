<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosterCategory extends Model
{
    protected $guarded = [];

    public function posters()
    {
        return $this->hasMany(Poster::class);
    }
}