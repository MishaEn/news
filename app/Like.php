<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $fillable = ['news_id', 'user_id'];
    public function news(){
        return $this->belongsTo(News::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
