<?php

namespace Iyngaran\LaravelMessages;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Iyngaran\LaravelMessages\Skeleton\SkeletonClass
 */
class LaravelMessagesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-messages';
    }
}
