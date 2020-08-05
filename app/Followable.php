
<?php


namespace App;

trait FollowableTrait
{
 
    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);
    }

    public function following(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }}
