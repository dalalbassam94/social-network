<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable,Followable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts(){

     return $this->hasMany('App\Post');

   }


    public function comments()
    {
        return $this->hasMany('App\Comment');

    }

 
   public function groups(){

    return $this->hasMany('App\Group');
   }
 

   public function follows()
    {
        return $this->belongsToMany(User::class,'follows'); 
    }

  
   public function bookmarks()
    {
        return $this->belongsToMany(Post::class,'bookmarks');
    }

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');   

        return Post::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)->with('comments')
            ->paginate(10);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function coverImage()
    {
        return $this->hasOne(UserImage::class)
            ->orderByDesc('id')
            ->where('location', 'cover')
            ->withDefault(function ($userImage) {
                $userImage->path = 'user-images/cover-default-image.png';
            });
    }

    public function profileImage()
    {
        return $this->hasOne(UserImage::class)
            ->orderByDesc('id')
            ->where('location', 'profile')
            ->withDefault(function ($userImage) {
                $userImage->path = 'user-images/profile-default-image.jpeg';
            });
    }



}
