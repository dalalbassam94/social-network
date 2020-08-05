<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\NotifyPostNewComment;
use App\Events\PostReceivedNewComment;

class Post extends Model
{

  //use LikableTrait;

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','group_id', 'image', 'body'
    ];
    protected $guarded = [];

    public function user(){

      return $this->belongsTo('App\User');
   }


  public function comments()
    {
        return $this->hasMany('App\Comment');

    }

   public function group(){

      return $this->belongsTo('App\Group');
   }


  public function addComment($comment)
    {
        $comment = $this->comments()->create($comment);

       auth->user()->notify(new NotifyPostNewComment($comment));

        return $comment;
    }

   public function bookmarks()
    {
        return $this->belongsToMany(User::class,'bookmarks'); 
    }


   public function isBookmarks(){
       return $this->bookmarks()->where('user_id',request()->user()->id())->count() > 0);
}
 
}
