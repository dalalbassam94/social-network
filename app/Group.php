<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','image', 'description','user_id' 
    ];



    public function owner()
    {

       return $this->belongsTo('App\User');
    }


    public function posts()
    {
        return $this->hasMany('App\Post');
     }


    public function subscriptions()
    {
       return $this->hasMany(Subscription::class);
     }

   /**
     * Invite a user to the group.
     *
     * @param \App\User $user
     */
    public function invite(User $user)
    {
       $this->members()->attach($user);
    }


    /**
     * Get all members that are assigned to the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(User::class, 'group_members')->withTimestamps();
    }
}
