<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function news(){
        return $this->belongsTo(News::class);
    }
    public function childComments(){
        return $this->hasMany(Comment::class);
    }
    public function parentComments(){
        return $this->belongsTo(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
