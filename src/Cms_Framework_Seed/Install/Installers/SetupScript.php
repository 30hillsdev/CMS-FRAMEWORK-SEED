<?php

namespace Cms_Framework_Seed\Install\Installers;

use Illuminate\Console\Command;

interface SetupScript
{
    /**
     * Fire the install script.
     *
     * @param Command $command
     *
     * @return mixed
     */
    public function fire(Command $command);
}
