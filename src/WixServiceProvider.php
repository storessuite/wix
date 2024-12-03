<?php

namespace StoresSuite;

use Illuminate\Support\ServiceProvider;

class WixServiceProvider extends ServiceProvider
{
    /**
     * Register services
     */
    public function register()
    {
        $this->app->bind(WixService::class, WixService::class);
        $this->mergeConfigFrom(__DIR__ . '/src/config/wix.php', 'wix');
        $this->publishes([
            __DIR__ . '/src/config/wix.php' => $this->app->configPath('wix.php')
        ], 'config');

        $this->loadMigrationsFrom(__DIR__ . '/src/database/migrations');
    }
}
