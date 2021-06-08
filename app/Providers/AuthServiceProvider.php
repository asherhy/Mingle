<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('admin-priv', function(){
            return Auth::user()->allRoles()->contains('admin');
          });
        
        Gate::define('student-priv', function(){
            return Auth::user()->allRoles()->contains('student');

        });

        Gate::define('mentor-priv', function(){
            return Auth::user()->allRoles()->contains('mentor');

        });
    }
}
