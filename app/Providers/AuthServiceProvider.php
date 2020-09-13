<?php

namespace App\Providers;
use App\Policies\UserPolicy;
use App\ActRules;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        ActRules::class => UserPolicy::class,
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
        Gate::define('authorize_menu', function ($user) {
            if($user->subs == 1){ return true; }else{ return false; };
        });

        //
    }
}
