<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static chunk(int $int, \Closure $param)
 */
class RssFeed extends Model
{
    public function news(){
        return $this->hasMany(News::class);
    }
}
