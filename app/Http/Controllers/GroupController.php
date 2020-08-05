<?php

namespace App\Http\Controllers;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Resources\GroupResource;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;


class GroupController extends Controller
{
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
          if (isset($request->image)) {
          $image = $request->image->store('group-images', 'public');
        }
      
             $group = auth()->user()->groups()->create([
                                     'description'=> $request->description ,
                                     'image'=>$image,
                                      'name'=>$request->name
                                        ]); 
 
        return (new GroupResource($group))->response()->setStatusCode(201);
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $Group)
    {
        return (new GroupResource($group))
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request,Group $group)
    {   
         if (isset($request->image)) {
              $image = $request->image->store('group-images', 'public');
            }
       $group->update([
                    'description'=> $request->description ,
                    'image'=>$image,  
                     'name'=>$request->name,
            
               ]);     

        return response()->json(['success'=>true],204);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json(['success'=>true],204);
    }
}
