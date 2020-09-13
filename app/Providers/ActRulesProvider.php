<?php

namespace App\Providers;
use App\Http\Controllers\HomeController;
use Illuminate\Support\ServiceProvider;

class ActRulesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HomeController::class, function ($app) {
            return new HomeController("test success");
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
