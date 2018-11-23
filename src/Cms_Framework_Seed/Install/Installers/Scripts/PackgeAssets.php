<?php

namespace Cms_Framework_Seed\Install\Installers\Scripts;

use Illuminate\Console\Command;
use Cms_Framework_Seed\Install\Installers\SetupScript;

class PackgeAssets implements SetupScript
{
    /**
     * @var array
     */
    protected $packages = [
        'Block'    => \Cms_Framework_Seed\Block\BlockServiceProvider::class,
        'Calendar' => \Cms_Framework_Seed\Calendar\CalendarServiceProvider::class,
        'Contact'  => \Cms_Framework_Seed\Contact\ContactServiceProvider::class,
        'Menu'     => \Cms_Framework_Seed\Menu\MenuServiceProvider::class,
        'Message'  => \Cms_Framework_Seed\Message\MessageServiceProvider::class,
        'Page'     => \Cms_Framework_Seed\Page\PageServiceProvider::class,
        'Settings' => \Cms_Framework_Seed\Settings\SettingsServiceProvider::class,
        'Task'     => \Cms_Framework_Seed\Task\TaskServiceProvider::class,
        'User'     => \Cms_Framework_Seed\User\UserServiceProvider::class,
    ];

    /**
     * @var array
     */
    protected $tags = [
        'config' => 0, 'view' => 0, 'lang' => 0, 'public' => 1,
    ];

    /**
     * Fire the install script.
     *
     * @param Command $command
     *
     * @return mixed
     */
    public function fire(Command $command)
    {
        $this->command = $command;

        if ($this->command->option('verbose')) {
            $package = implode(',', array_keys($this->packages));
            $this->command->blockMessage('Package resources', "Publishing package resources for [$package] ...", 'comment');
        }

        foreach ($this->tags as $tag => $option) {
            $this->command->sectionMessage(ucfirst($tag).' files', "Publishing {$tag} files");

            if ($confirm = $this->confirm($tag, $option)) {
                if ($confirm == 'Ask') {
                    foreach ($this->packages as $kp => $package) {
                        if (!$reConfirm = $this->reConfirm($tag, $kp)) {
                            continue;
                        }

                        $this->publish($reConfirm);
                    }
                } else {
                    $this->publish($confirm);
                }
            }
        }
    }

    public function confirm($tag, $option)
    {
        $choice = $this->command->choice("Do you want to publish {$tag} files?", ['No', 'Yes', 'Overwrite', 'Ask'], $option);

        if ($choice == 'No') {
            return false;
        }

        if ($choice == 'Ask') {
            return $choice;
        }

        $options = ['--tag' => $tag];

        if ($choice == 'Overwrite') {
            $options['--force'] = true;
        }

        return $options;
    }

    public function reConfirm($tag, $package)
    {
        $choice = $this->command->choice("Do you want to publish \"{$tag}\" files of \"{$package}\" package?", ['No', 'Yes', 'Overwrite'], 1);

        if ($choice == 'No') {
            return false;
        }

        $options = ['--provider' => $package, '--tag' => $tag];

        if ($choice == 'Overwrite') {
            $options['--force'] = true;
        }

        return $options;
    }

    public function publish($options)
    {
        if ($this->command->option('verbose')) {
            $this->command->call('vendor:publish', $options);

            return;
        }

        $this->command->callSilent('vendor:publish', $options);
    }
}
