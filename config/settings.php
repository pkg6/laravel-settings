<?php

return [
    /*
  |--------------------------------------------------------------------------
  | Settings Table
  |--------------------------------------------------------------------------
  |
  | Database table used to store settings in.
  |
  */
    'table' => 'settings',

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | If enabled, all settings are cached after accessing them.
    |
    */
    'cache' => true,

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | Specify a prefix to prepend to any setting key being cached.
    |
    */
    'cache_key_prefix' => 'settings.',

    /*
    |--------------------------------------------------------------------------
    | Encryption
    |--------------------------------------------------------------------------
    |
    | If enabled, all values are encrypted and decrypted.
    |
    */
    'encryption' => true,

    'driver' => env('SETTINGS_DRIVER', 'eloquent'),

    "drivers" => [
        'eloquent' => [
            'driver' => 'eloquent',
            'model' => \Pkg6\Laravel\Settings\Models\Setting::class,
        ]
    ]
];
