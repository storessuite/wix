<?php

namespace StoresSuite\Wix;

use Illuminate\Support\ServiceProvider;
use StoresSuite\Wix\Facades\Wix;
use StoresSuite\Wix\WixApi\V1\Catalog;

class WixServiceProvider extends ServiceProvider
{
    /**
     * Register services
     */
    public function register()
    {
        $this->app->singleton(Wix::class, function () {
            return new WixService(new Catalog());
        });
    }

    /**
     * Bootstrap package services
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/wix.php', 'wix');
        $this->publishes([
            __DIR__ . '/config/wix.php' => $this->app->configPath('wix.php')
        ], 'config');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
}
