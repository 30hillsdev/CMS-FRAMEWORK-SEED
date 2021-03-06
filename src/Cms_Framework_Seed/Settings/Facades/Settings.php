<?php

namespace Cms_Framework_Seed\Settings\Facades;

use Illuminate\Support\Facades\Facade;

class Settings extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cms_framework_seed.settings';
    }
}
