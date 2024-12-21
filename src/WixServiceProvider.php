<?php

namespace StoresSuite\Wix;

use Illuminate\Support\ServiceProvider;

class WixServiceProvider extends ServiceProvider
{
    /**
     * Register services
     */
    public function register() {}

    /**
     * Bootstrap package services
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->mergeConfigFrom(__DIR__ . '/config/wix.php', 'wix');
        $this->publishes([ __DIR__ . '/config/wix.php' => $this->app->configPath('wix.php') ], 'config');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
}
