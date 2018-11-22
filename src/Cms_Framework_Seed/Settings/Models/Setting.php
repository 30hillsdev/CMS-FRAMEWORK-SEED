<?php

namespace Cms_Framework_Seed\Settings\Models;

use Cms_Framework_Seed\Database\Model;
use Cms_Framework_Seed\Filer\Traits\Filer;
use Cms_Framework_Seed\Repository\Traits\PresentableTrait;

class Setting extends Model
{
    use Filer,  PresentableTrait;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'settings.setting';
}
