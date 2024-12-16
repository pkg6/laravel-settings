<?php

namespace Pkg6\Laravel\Settings\Drivers;

use Illuminate\Database\Eloquent\Model;
use Pkg6\DB\Settings\Contracts\Context;
use Pkg6\DB\Settings\Contracts\Driver;

class EloquentDriver implements Driver
{
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
     * @param \Pkg6\DB\Settings\Contracts\Context|null $context
     * @return void
     */
    public function context(Context $context = null)
    {
        $this->context = $context;
    }

    /**
     * @return array
     */
    public function contextArray()
    {
        if (!is_null($this->context)) {
            return [
                'model' => $this->context->get('model'),
                'model_id' => $this->context->get('id'),
            ];
        }
        return [];
    }

    /**
     * @param $key
     * @return void
     */
    public function forget($key): void
    {
        $context = $this->contextArray();
        $context = array_merge($context, compact('key'));
        $this->model->newQuery()->where($context)->delete();
    }

    /**
     * @param $key
     * @param $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $context = $this->contextArray();
        $context = array_merge($context, compact('key'));
        return $this->model->newQuery()->where($context)->value('value');
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        $context = $this->contextArray();
        $context = array_merge($context, compact('key'));
        return $this->model->newQuery()->where($context)->exists();
    }

    /**
     * @param string $key
     * @param $value
     * @return void
     */
    public function set(string $key, $value = null): void
    {
        $context = $this->contextArray();
        $context = array_merge($context, compact('key'));
        $this->model->newQuery()->updateOrCreate($context, compact('value'));
    }
}
