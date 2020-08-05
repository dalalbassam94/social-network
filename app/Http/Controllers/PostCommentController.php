<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\Http\Resources\CommentCollection;
use App\Notifications\NotifyPostNewComment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\Comment as CommentResource;

class PostCommentController extends Controller
{
    public function store(Post $post ,StoreCommentRequest $request)
    {
        $comment= $post->addComment(['body' => $request->body,
          'user_id' => auth()->user()->id
        ]); 
      

        return (new CommentResource($comment))->response()->setStatusCode(201);

     }

    public function show(Comment $comment)
    {

      return (new CommentResource( $commment))->response()->setStatusCode(200);

     }

    public function edit(Comment $comment)
    {

         return new CommentResource( $commment);

    }

    public function update(UpdateCommentRequest $request,Comment $comment)
    {
      $this->authorize('update', $comment); 

     $comment->update(['body' => $request->body
    ]);
    
   response()->json(['success'=>true],204);
     }   
   

     public function destroy(Comment $comment)
     {

      $this->authorize('delete',$comment);
       $comment->delete();
     
       response()->json(['success'=>true],204);

    }
}
