<?php

namespace Pkg6\Laravel\Settings\Models;


use Pkg6\DB\Settings\Context;
use Pkg6\DB\Settings\Contracts\Context as ContextContract;
use Pkg6\DB\Settings\Settings;
use Pkg6\Laravel\Settings\Facades\Settings as SettingsFacade;

trait HasSettings
{
    public function context(): ContextContract
    {
        return new Context([
            'model' => static::class,
            'id' => $this->getKey(),
            ...$this->contextArguments(),
        ]);
    }

    public function settings(): Settings
    {
        return SettingsFacade::context($this->context());
    }

    protected function contextArguments(): array
    {
        return [];
    }
}
