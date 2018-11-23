<?php

namespace Cms_Framework_Seed\Install;

use Illuminate\Console\Command;
use Cms_Framework_Seed\Install\Installers\Installer;
use Cms_Framework_Seed\Install\Installers\Traits\BlockMessage;
use Cms_Framework_Seed\Install\Installers\Traits\SectionMessage;

class InstallCommand extends Command
{
    use BlockMessage, SectionMessage;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms_framework_seed:install {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Cms_Framework_Seed';

    /**
     * @var Installer
     */
    private $installer;

    /**
     * Create a new command instance.
     *
     * @param Installer $installer
     *
     * @internal param Filesystem $finder
     * @internal param Application $app
     * @internal param Composer $composer
     */
    public function __construct(Installer $installer)
    {
        parent::__construct();
        $this->getLaravel()['env'] = 'local';
        $this->installer = $installer;
    }

    /**
     * Execute the actions.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->alert('Cms_Framework_Seed Installation');

        $success = $this->installer->stack([
            \Cms_Framework_Seed\Install\Installers\Scripts\ProtectInstaller::class,
            \Cms_Framework_Seed\Install\Installers\Scripts\ConfigureDatabase::class,
            \Cms_Framework_Seed\Install\Installers\Scripts\PackgeAssets::class,
            \Cms_Framework_Seed\Install\Installers\Scripts\PackageMigrators::class,
            \Cms_Framework_Seed\Install\Installers\Scripts\PackageSeeders::class,
            \Cms_Framework_Seed\Install\Installers\Scripts\SetSuperuserUser::class,
            \Cms_Framework_Seed\Install\Installers\Scripts\SetAppKey::class,
        ])->install($this);

        if ($success) {
            $this->line('Cms_Framework_Seed is ready.');
            $this->info('You can now login with your username and password at ['.url('/admin').']');
        }
    }
}
