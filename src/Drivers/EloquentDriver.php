<?php

namespace Pkg6\Laravel\Settings\Drivers;

use Illuminate\Database\Eloquent\Model;
use Pkg6\DB\Settings\Contracts\Driver;

class EloquentDriver implements Driver
{
    use DriverContext;

    /**
     * @var Model
     */
    protected $model;
    /**
     * @var \Pkg6\DB\Settings\Contracts\Context
     */
    protected $context;

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $key
     * @return void
     */
    public function forget($key): void
    {
        $this->model->newQuery()->where($this->getContextAttributes($key))->delete();
    }

    /**
     * @param $key
     * @param $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $value = $this->model->newQuery()->where($this->getContextAttributes($key))->value('value');
        return $value ?? $default;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        return $this->model->newQuery()->where($this->getContextAttributes($key))->exists();
    }

    /**
     * @param string $key
     * @param $value
     * @return void
     */
    public function set(string $key, $value = null): void
    {
        $attributes = $this->getContextAttributes($key);
        $this->model->newQuery()->updateOrCreate($attributes, compact('value'));
    }
}
