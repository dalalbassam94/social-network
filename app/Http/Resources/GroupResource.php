<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class GroupResource extends JsonResource
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
                'type' => 'groups',  
                'group_id' => $this->id,
                'attributes' => [
                   
                    'name' => $this->name,
                     'image' => url($this->image),
                    'description' => $this->description,
                 //  'users' => new UserResource(auth()->user),
                   
                ]
            ],
         
        ];


    }
}
