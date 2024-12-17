<?php

namespace Pkg6\Laravel\Settings\Drivers;

use Pkg6\DB\Settings\Contracts\Driver;
use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder;
use Throwable;

class DatabaseDriver implements Driver
{
    use DriverContext;

    /**
     * @var \Illuminate\Database\Connection
     */
    protected $connection;
    protected $table;

    public function __construct(Connection $connection, string $table)
    {
        $this->connection = $connection;
        $this->table = $table;
    }

    public function forget($key)
    {
        $this->table()->where($this->getContextAttributes($key))->delete();
    }

    public function get($key, $default = null)
    {
        $value = $this->table()->where($this->getContextAttributes($key))->value('value');
        return $value ?? $default;
    }

    public function has($key)
    {
        return $this->table()->where($this->getContextAttributes($key))->exists();
    }

    public function set(string $key, $value = null)
    {
        try {
            $this->table()->insert(array_merge($this->getContextAttributes($key), compact('value')));
        } catch (Throwable) {
            $this->table()->where($this->getContextAttributes($key))->update(compact('value'));
        }
    }

    protected function table(): Builder
    {
        return $this->connection->table($this->table);
    }
}
