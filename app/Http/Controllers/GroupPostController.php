<?php

namespace App\Http\Controllers;

use App\Group;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;


class GroupPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
       $posts= $group->posts()->get();
        return new PostResource($posts);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request,Group $group)
    {   
        $image = $request->image->store('images-posts', 'public');
        $post= $group->posts()->create([
                           'body' => $request->body,
                           'image' => $image,
                           'user_id' => auth()->user()->id]);

        return (new PostResource($post))->response()->setStatusCode(201);
    }


}
