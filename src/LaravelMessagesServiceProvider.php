<?php

namespace Iyngaran\LaravelMessages;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Iyngaran\LaravelMessages\Repositories\MessageRepository;
use Iyngaran\LaravelMessages\Repositories\MessageRepositoryInterface;
use Iyngaran\LaravelMessages\Repositories\ReplyRepository;
use Iyngaran\LaravelMessages\Repositories\ReplyRepositoryInterface;

class LaravelMessagesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('iyngaran.messages.php'),
            ], 'config');
        }
        $this->registerResources();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'iyngaran.messages');
        $this->registerRepositories();
        // Register the main class to use with the facade
        $this->app->singleton('laravel-messages', function () {
            return new LaravelMessages;
        });
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../database/factories');

        $this->registerWebRoutes();
        $this->registerApiRoutes();
    }

    private function registerWebRoutes()
    {
        Route::group(
            $this->webRouteConfiguration(),
            function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            }
        );
    }

    private function registerApiRoutes()
    {
        Route::group(
            $this->apiRouteConfiguration(),
            function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
            }
        );
    }

    private function webRouteConfiguration()
    {
        return  [
            'prefix' => "/",
            'middleware' => "web",
            'namespace' => 'Iyngaran\LaravelMessages\Http\Controllers'
        ];
    }

    private function apiRouteConfiguration()
    {
        return  [
            'prefix' => 'api/',
            'middleware' => "api",
            'namespace' => 'Iyngaran\LaravelMessages\Http\Controllers\Api'

        ];
    }

    private function registerRepositories()
    {
        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);
        $this->app->bind(ReplyRepositoryInterface::class, ReplyRepository::class);
    }
}
