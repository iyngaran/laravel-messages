<?php


namespace Iyngaran\LaravelMessages\Tests;

use Iyngaran\LaravelMessages\LaravelMessagesServiceProvider;
use Spatie\Permission\PermissionServiceProvider;
use Illuminate\Support\Facades\Config;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase();
    }

    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LaravelMessagesServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app['config']->set('database.default', 'testdb');
        $app['config']->set(
            'database.connections.testdb',
            [
                'driver' => 'sqlite',
                'database' => ':memory:'
            ]
        );
        $app['config']->set('mail.driver', 'log');
    }


    private function setUpDatabase(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/resources/database/migrations');
    }
}
