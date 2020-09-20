<?php

namespace Iyngaran\LaravelMessages\Tests;

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

    /** @test */
    public function check_config()
    {
        $this->assertEquals('messages', $this->getMessagesTable());
        $this->assertEquals('users', $this->getUsersTable());
        $this->assertEquals('replies', $this->getRepliesModel());
        $this->assertEquals(\Iyngaran\LaravelMessages\Tests\Models\User::class, $this->getUserModel());
    }

    private function getMessagesTable()
    {
        return config('iyngaran.messages.messages_table_name');
    }

    private function getUsersTable()
    {
        return config('iyngaran.messages.user_table_name');
    }

    private function getUserModel()
    {
        return config('iyngaran.messages.user_model');
    }

    private function getRepliesModel()
    {
        return config('iyngaran.messages.replies_table_name');
    }
}
