<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Request\StoreUserRequest;

class AuthController extends Controller
{
   public function register(Request $request )
   {
      $validatedData = $request->validate([
          'first_name'=>'required|max:55',
         'email'=>'email|required|unique:users',
          'password'=>'required|confirmed'
      ]);
      $validatedData['password'] = bcrypt($request->password);


        $user = User::create(['first_name'=>$request->first_name,'last_name'=>$request->last_name,
              'email'=> $request->email,
              'password'=>bcrypt($request->password)
    ]);

        return response(['user'=> $user]);
       
   }


   public function login(Request $request)
   {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
       
        if(!auth()->attempt($loginData)) {
            return response(['message'=>'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

   }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json('Logged out successfully', 200);
    }
}
