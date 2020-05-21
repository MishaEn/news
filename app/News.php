<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function posts()
    {
        return $this->hasMany(News::class);
    }
}
