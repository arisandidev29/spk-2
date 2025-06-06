<?php

namespace App\Providers;

use App\Service\BobotService;
use App\Service\SpkService;
use App\Service\TokenService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TokenService::class, function ($app) {
            return new TokenService();
        });

        $this->app->singleton(BobotService::class, function ($app) {
            return new BobotService();
        });

        $this->app->singleton(SpkService::class, function ($app) {
            return new SpkService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
