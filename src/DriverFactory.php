<?php

namespace Pkg6\Laravel\Settings;

use Pkg6\DB\Settings\Drivers\PDODriver;
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
     * @param $driverConfig
     * @return PDODriver
     */
    protected function createPdoDriver($driverConfig): PDODriver
    {
        throw new RuntimeException("To be implemented");
    }
}
