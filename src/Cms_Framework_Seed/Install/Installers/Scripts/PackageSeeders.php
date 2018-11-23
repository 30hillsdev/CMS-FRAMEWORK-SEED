<?php

namespace Cms_Framework_Seed\Install\Installers\Scripts;

use Illuminate\Console\Command;
use Cms_Framework_Seed\Install\Installers\SetupScript;

class PackageSeeders implements SetupScript
{
    /**
     * Fire the install script.
     *
     * @param Command $command
     *
     * @return mixed
     */
    public function fire(Command $command)
    {
        if ($command->option('verbose')) {
            $command->blockMessage('Seeds', 'Starting the package seeders ...', 'comment');
        }

        $command->call('db:seed', ['--force' => true]);
    }
}
