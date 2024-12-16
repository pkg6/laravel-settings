<?php

namespace Pkg6\Laravel\Settings;

use Pkg6\DB\Settings\Contracts\Context;

class Settings extends \Pkg6\DB\Settings\Settings
{
    public function context(Context $context = null): \Pkg6\DB\Settings\Settings
    {
        parent::context($context);
        if (method_exists($this->driver,'context')){
            $this->driver->context($context);
        }
        return $this;
    }
}
