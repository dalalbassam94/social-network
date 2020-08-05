<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class AuthUserController extends Controller
{
    
    public function show()
    {
        return new UserResource(auth()->user());
    }
}
