<?php

namespace Pkg6\Laravel\Settings\Facades;

use Closure;
use Illuminate\Support\Facades\Facade;
use Pkg6\DB\Settings\Contracts\Driver;
use Pkg6\Laravel\Settings\DriverFactory;

/**
 * @see \Pkg6\DB\Settings\DriverFactory
 *
 * @method static Driver driver(string $driver = null)
 * @method static DriverFactory extend(string $driver, Closure $callback)
 */
class Factory extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'db.laravel.settings.factory';
    }
}
