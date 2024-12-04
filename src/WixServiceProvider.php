<?php

namespace StoresSuite\Wix;

use Illuminate\Support\ServiceProvider;
use StoresSuite\Wix\Facades\Wix;

class WixServiceProvider extends ServiceProvider
{
    /**
     * Register services
     */
    public function register()
    {
        $this->app->singleton(Wix::class, WixService::class);
    }

    /**
     * Bootstrap package services
     */
    public function boot(){
        $this->mergeConfigFrom(__DIR__ . '/config/wix.php', 'wix');
        $this->publishes([
            __DIR__ . '/config/wix.php' => $this->app->configPath('wix.php')
        ], 'config');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
}
