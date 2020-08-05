<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use App\Policies\PostPolicy;
use App\Post;
use App\Policies\GroupPolicy;
use App\Group;
use App\Policies\VideoPolicy;
use App\Video;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Post' => 'App\Policies\PostPolicy',
          'App\Group' => 'App\Policies\GroupPolicy',
           'App\Video' => 'App\Policies\VideoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

    }
}
