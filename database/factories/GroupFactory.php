<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use App\User;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
    'user_id' => factory(\App\User::class)->create()->id,
   'image' => 'image.jpg',
   'description' =>$faker->sentence,
 'name'=>$faker->sentence,
    ];
});
