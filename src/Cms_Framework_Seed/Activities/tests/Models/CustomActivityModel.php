<?php

namespace Cms_Framework_Seed\Activities\Test\Models;

use Cms_Framework_Seed\Activities\Models\Activity;

class CustomActivityModel extends Activity
{
    public function getCustomPropertyAttribute()
    {
        return $this->changes();
    }
}
