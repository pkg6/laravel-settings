<?php

namespace Pkg6\Laravel\Settings;

use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__ . '/../config/settings.php') => config_path('settings.php'),
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'settings');
    }

    public function register()
    {
        $this->app->singleton('db.laravel.settings.factory', function () {
            return new DriverFactory(config('settings'));
        });

        $this->app->singleton('db.laravel.settings', function () {
            $driverFactory = $this->app->get('db.laravel.settings.factory');
            $settings = new Settings($driverFactory->driver());
            $settings->setCache($this->app->get('cache.store'));
            if (config('app.key')) {
                $settings->setEncrypter($this->app->get('encrypter'));
            }
//            config('settings.cache') ? $settings->enableCache() : $settings->disableCache();
            config('settings.encryption') ? $settings->enableEncryption() : $settings->disableEncryption();
            return $settings;
        });
    }
}
