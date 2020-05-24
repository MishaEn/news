<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 */
class News extends Model
{
    protected $fillable = ['rss_feed_id','author','category','title','description','publication_date'];
/*Flight::chunk(200, function ($flights) {
    foreach ($flights as $flight) {
        //
    }
});*/
    public function rssFeeds()
    {
        return $this->belongsTo(RssFeed::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function like(){
        return $this->hasMany(Like::class);
    }
}
