<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'messages_table_name' => 'messages',
    'replies_table_name' => 'replies',
    'user_table_name' => 'users',
    'user_model' => \Iyngaran\LaravelMessages\Tests\Models\User::class,
    'messageable_type' => \Iyngaran\LaravelMessages\Tests\Models\Products::class
];
