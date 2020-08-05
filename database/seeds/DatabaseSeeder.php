<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
   
        factory(App\User::class,20)->create();
   factory(App\Group::class,20)->create();
        factory(App\Post::class,20)->create();

  factory(App\Like::class,20)->create();
        factory(App\Comment::class,20)->create();

    }
}
