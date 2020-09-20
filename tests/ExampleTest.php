<?php

namespace Iyngaran\LaravelMessages\Tests;

use Orchestra\Testbench\TestCase;
use Iyngaran\LaravelMessages\LaravelMessagesServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelMessagesServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
