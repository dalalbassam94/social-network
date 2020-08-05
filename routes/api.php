<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




//Route::post('/login', 'AuthController@login');
//Route::post('/register', 'AuthController@register');


Route::middleware('auth:api')->group(function () {


Route::get('auth-user', 'AuthUserController@show');

Route::put('/profile/{user}','ProfileController@update');

Route::delete('comment/{comment}','PostCommentController@destroy');
Route::patch('comment/{comment}','PostCommentController@update');
Route::post('/posts/{post}/comment','PostCommentController@store');
Route::get('comment/{comment}','PostCommentController@show');

Route::post('/groups/{group}/post','GroupPostController@store');
Route::resource('/groups', 'GroupController');

Route::resource('/posts', 'PostController');

Route::post('subscriptions/{group}','SubscriptionController@store');

Route::delete('subscriptions/{subscription}','SubscriptionController@destroy');
  Route::post('/user-images','UserImageController@store');
    Route::apiResources([
        '/posts/{post}/like' => 'PostLikeController',
        '/users' => 'UserController',
        '/users/{user}/posts' => 'UserPostController',
    
 
    ]);

});
