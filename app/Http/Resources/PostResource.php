<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;



class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {    return [
        'data' => [
            'type' => 'posts',
            'post_id' => $this->id,
            'attributes' => [
         'posted_by' => new UserResource($this->user),
             'likes' => new LikeCollection($this->likes),
          'comments' => new CommentCollection($this->comments),
                'body' => $this->body,
                'image' => url($this->image),
                'posted_at' => $this->created_at->diffForHumans(),
            ]
        ],
        'links' => [
            'self' => url('/posts/'.$this->id),
        ]
    ];
        
    }
}
