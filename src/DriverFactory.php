<?php

namespace Pkg6\Laravel\Settings;

use Illuminate\Support\Arr;
use Pkg6\DB\Settings\Drivers\PDODriver;
use Pkg6\Laravel\Settings\Drivers\DatabaseDriver;
use Pkg6\Laravel\Settings\Drivers\EloquentDriver;
use RuntimeException;

class DriverFactory extends \Pkg6\DB\Settings\DriverFactory
{
    /**
     * @param $driverConfig
     * @return EloquentDriver
     */
    protected function createEloquentDriver($driverConfig): EloquentDriver
    {
        return new EloquentDriver(app($driverConfig['model']));
    }

    /**
     * @param array $config
     * @return \Pkg6\Laravel\Settings\Drivers\DatabaseDriver
     */
    protected function createDatabaseDriver(array $config): DatabaseDriver
    {
        return new DatabaseDriver(
            app('db')->connection(Arr::get($config, 'connection', config('database.default'))),
            config('settings.table'),
        );
    }

    /**
     * @param $driverConfig
     * @return PDODriver
     */
    protected function createPdoDriver($driverConfig): PDODriver
    {
        throw new RuntimeException("To be implemented");
    }
}
