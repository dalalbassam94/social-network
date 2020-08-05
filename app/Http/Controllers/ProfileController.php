<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
     public function edit(User $user)
     {
   
        return response()->json(['success'=>true],200); 
     }


     public function update(UpdateProfileRequest $request ,User $user){
  
        $user->update(['first_name'=>$request->first_name,
                        'last_name'=>$request->last_name,
                         'email'=>$request->email,
                           'bio'=>$request->bio,
                          'password'=>$request->password,
                          ]);

       return response()->json(['success'=>true],204);  
   
}






}
