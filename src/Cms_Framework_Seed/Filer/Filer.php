<?php

namespace Cms_Framework_Seed\Filer;

use App;
use Cms_Framework_Seed\Filer\Traits\FileDisplay;
use Cms_Framework_Seed\Filer\Traits\Uploader;

class Filer
{
    use FileDisplay, Uploader;

    public function __construct()
    {
        $this->image = App::make('image');
    }
}
