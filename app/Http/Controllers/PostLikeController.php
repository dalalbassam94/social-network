<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\LikeCollection;
use App\Post;

class PostLikeController extends Controller
{
   public function store(Post $post)
    {
        $post->like(auth()->user);      
       return new LikeCollection($post->likes);
    }

    public function destroy(Post $post)
    {
        $post->dislike(auth()->user);     
        return response()->json(['success'=>true],204);
    }

 

}
