<?php

namespace Cms_Framework_Seed\Install\Http\Controllers;

use Artisan;

trait InstallCommands
{
    /**
     * @var array
     */
    protected $search = [
        'DB_HOST=127.0.0.1',
        'DB_DATABASE=homestead',
        'DB_USERNAME=homestead',
        'DB_PASSWORD=secret',
    ];

    /**
     * @var string
     */
    protected $template = '.env.example';

    /**
     * @var string
     */
    protected $file = '.env';
    /**
     * @var array
     */
    protected $packages = [
        'Block'    => \Cms_Framework_Seed\Block\BlockServiceProvider::class,
        'Calendar' => \Cms_Framework_Seed\Calendar\CalendarServiceProvider::class,
        'Contact'  => \Cms_Framework_Seed\Contact\ContactServiceProvider::class,
        'Menu'     => \Cms_Framework_Seed\Menu\MenuServiceProvider::class,
        'Message'  => \Cms_Framework_Seed\Message\MessageServiceProvider::class,
        'News'     => \Cms_Framework_Seed\News\NewsServiceProvider::class,
        'Page'     => \Cms_Framework_Seed\Page\PageServiceProvider::class,
        'Settings' => \Cms_Framework_Seed\Settings\SettingsServiceProvider::class,
        'Task'     => \Cms_Framework_Seed\Task\TaskServiceProvider::class,
        'User'     => \Cms_Framework_Seed\User\UserServiceProvider::class,
    ];
    /**
     * @var array
     */
    protected $model = [
        'superuser' => '\App\User',
        'admin' 	   => '\App\User',
        'user' 		   => '\App\User',
        'client' 	  => '\App\Client',
    ];

    /**
     * @var array
     */
    protected $tags = [
        'config', 'view', 'seeds', 'lang', 'migrations', 'public',
    ];

    /**
     * @param $name
     * @param $username
     * @param $password
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function write($finder, $name, $username, $password, $host)
    {
        $environmentFile = $finder->get(base_path($this->template));

        $replace = [
            "DB_HOST=$host",
            "DB_DATABASE=$name",
            "DB_USERNAME=$username",
            "DB_PASSWORD=$password",
        ];

        $newEnvironmentFile = str_replace($this->search, $replace, $environmentFile);

        $finder->put(base_path($this->file), $newEnvironmentFile);
    }

    /**
     * Fire the install script.
     *
     * @param Command $command
     *
     * @return mixed
     */
    public function setAppKey()
    {
        Artisan::call('key:generate');
    }

    /**
     * Fire the install script.
     *
     * @param Command $command
     *
     * @return mixed
     */
    public function dbMigrate()
    {
        Artisan::call('migrate:refresh');
    }

    /**
     * Fire the install script.
     *
     * @param Command $command
     *
     * @return mixed
     */
    public function dbSeed()
    {
        Artisan::call('db:seed');
    }

    /**
     * Fire the install script.
     *
     * @param  $tag
     *
     * @return mixed
     */
    public function publish($tag)
    {
        $package = implode(',', array_keys($this->packages));
        foreach ($this->packages as $kp => $package) {
            $this->call(['--provider' => $package, '--tag' => $tag, '--force' => true]);
        }
    }

    /**
     * Fire the install script.
     *
     * @param  $command
     *
     * @return mixed
     */
    public function call($option)
    {
        Artisan::call('vendor:publish', $option);
    }

    /**
     * Fire the install script.
     *
     * @param Command $command
     *
     * @return mixed
     */
    public function setCredentials($attributes, $model)
    {
        $data['email'] = $attributes['email'];
        $data['password'] = bcrypt($attributes['password']);
        $data['api_token'] = str_random(60);

        $user = $model::create($data);
    }
}
