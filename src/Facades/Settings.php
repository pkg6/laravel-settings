<?php

namespace Pkg6\Laravel\Settings\Facades;

use Illuminate\Support\Facades\Facade;
use Pkg6\DB\Settings\Contracts\Context;

/**
 * @see \Pkg6\DB\Settings\Settings
 *
 * @method static \Pkg6\DB\Settings\Settings context(Context $context = null)
 * @method static null|mixed forget($key)
 * @method static mixed get(string $key, null|mixed $default = null)
 * @method static bool isFalse(string $key, bool|int|string $default = false)
 * @method static bool isTrue(string $key, bool|int|string $default = true)
 * @method static bool has($key)
 * @method static null|mixed set(string $key, null|mixed $value = null)
 * @method static self disableCache()
 * @method static self enableCache()
 * @method static self temporarilyDisableCache()
 * @method static self disableEncryption()
 * @method static self enableEncryption()
 */
class Settings extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'db.laravel.settings';
    }
}
