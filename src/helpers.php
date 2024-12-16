<?php

namespace Pkg6\Laravel\Settings;

use Pkg6\DB\Settings\Contracts\Context;
use Pkg6\DB\Settings\Settings;

function settings($key = null, $default = null, $context = null)
{
    $settings = app('db.laravel.settings');
    // If nothing is passed in to the function, simply return the settings instance.
    if ($key === null) {
        return $settings;
    }
    // If an array is passed, we are setting values.
    if (is_array($key)) {
        foreach ($key as $name => $value) {
            if ($context instanceof Context) {
                $settings->context($context);
            }
            $settings->set($name, $value);
        }
        return null;
    }
    if ($context instanceof Context || is_bool($context)) {
        $settings->context($context);
    }
    return $settings->get($key, $default);
}

