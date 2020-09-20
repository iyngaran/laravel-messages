<?php

namespace Iyngaran\LaravelMessages;

use Illuminate\Support\ServiceProvider;

class LaravelMessagesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-messages.php'),
            ], 'config');

        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-messages');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-messages', function () {
            return new LaravelMessages;
        });
    }
}
