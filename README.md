### 安装

```
composer require pkg6/laravel-settings
```

### 在 `config/app.php` 注册

```
'providers' => [
    .....
    \Pkg6\Laravel\Settings\SettingsServiceProvider::class
]

php artisan vendor:publish --provider="\Pkg6\Laravel\Settings\SettingsServiceProvider::class"
php artisan vendor:publish --tag="settings"

php artisan migrate --path=database/migrations/2024_12_16_122545_create_settings_table.php
```

### 基本使用

~~~
// Setting
Settings::set('foo', 'bar');
settings()->set('foo', 'bar');
settings(['foo' => 'bar']);

// Retrieving
Settings::get('foo'); // 'bar'
settings()->get('foo');
settings('foo');
~~~

