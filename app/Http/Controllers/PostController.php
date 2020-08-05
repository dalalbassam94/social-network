<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
//use App\Http\Resources\PostCollection;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;


class PostController extends Controller
{
     public function index(){

         $posts=Post::all();
        return  PostResource::collection($posts);
      
}

    public function store(Request $request)
    {
          if (isset($request->image)) {
            $image = $request->image->store('post-images', 'public');
            }
 
         $post = auth()->user()->posts()->create([
            'body' => $request->body,
             'image' =>$image]);
     
 return (new PostResource($post))->response()->setStatusCode(201);

    }

    public function edit(Post $post)
    {
         $this->authorize('update', $post);

          return new PostResource( $post);
     }


     public function update(UpdatePostRequest $request ,Post $post)
     {
         $this->authorize('update', $post);

         if (isset($request->image)) {
            $path = $request->image->store('post-images', 'public');
            }
                 $post->update([
                    'body'=>$request->body,
                     'image'=>$path,
                    
              ]);

            response()->json(['success'=>true],204);

}

    public function destroy (Post $post){

           $this->authorize('delete', $post);

           $post->delete();

           return  response()->json(['success'=>true],204);

}
}
