<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
  
          return [
        'user_id' => factory(\App\User::class)->create()->id,
  'post_id' => factory(\App\Post::class)->create()->id,
         'body'=>$faker->sentence,
  
  
    ];
});
