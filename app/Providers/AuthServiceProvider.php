<?php

namespace App\Providers;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPrevelleges();
        //
    }
    public function registerPrevelleges(){
        Gate::define('isCharge',function($user){
             return stristr($user->role,'2');
        });
        Gate::define('isAdmin',function($user){
             return stristr($user->role,'4');
        });
        Gate::define('isAss',function($user){
             return stristr($user->role,'3');
        });
        Gate::define('isChef',function($user){
             return stristr($user->role,'1');
        });
    }
}
