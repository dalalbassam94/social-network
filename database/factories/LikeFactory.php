<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
            'user_id' => factory(\App\User::class)->create()->id,
      'post_id' => factory(\App\Post::class)->create()->id,


'liked'=>true,

    ];
});
