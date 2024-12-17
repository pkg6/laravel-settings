<?php

namespace Pkg6\Laravel\Settings\Drivers;

use Pkg6\DB\Settings\Contracts\Context;

trait DriverContext
{
    /**
     * @param Context|null $context
     * @return void
     */
    public function context(Context $context = null)
    {
        $this->context = $context;
    }

    /**
     * @param string $key
     * @return array
     */
    protected function getContextAttributes(string $key)
    {
        $contextArray = [];

        if (!is_null($this->context)) {
            $contextArray = [
                'model' => $this->context->get('model'),
                'model_id' => $this->context->get('id'),
            ];
        }
        return array_merge($contextArray, compact('key'));
    }
}
