<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BookmarksController extends Controller
{

      public function show(Post $post){

        $bookmarks =$post->bookmarks()->where('user_id',auth->user->id)->get();

        if ($bookmarks->isEmpty()) {
            return  response()->json([ 'message' =>"You haven’t added any posts to your Bookmarks yet"],200);
        }
        
         return response()->json([],200);
    }


    public function store(Post $post)
    {
        $post->bookmarks()->toggle(auth()->user());

        return response()->json([],201);
    }
}
