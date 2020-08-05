<?php

namespace App\Http\Resources;

use App\Friend;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ FriendResource;

use App\Http\Resources\UserImageResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
           return [
            'data' => [
                'type' => 'users',
                'user_id' => $this->id,
                'attributes' => [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                     'avatar'=>$this->avatar,
                      'bio' => $this->bio,
                      'email'=>$this->email,
                      'password'=>$this->password,
                   'cover_image' => new UserImageResource($this->coverImage),
                    'profile_image' => new UserImageResource($this->profileImage),

                ]
            ],
            'links' => [
                'self' => url('/users/'.$this->id),
            ]
        ];
    }
}
