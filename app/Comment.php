<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\News;
class Comment extends Model
{
    protected $fillable = ['user_id', 'news_id', 'comment_id','description'];

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
