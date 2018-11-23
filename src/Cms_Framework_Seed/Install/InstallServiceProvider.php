<?php

namespace Cms_Framework_Seed\Install;

use Illuminate\Support\ServiceProvider;

class InstallServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'install');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'install');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            \Cms_Framework_Seed\Install\InstallCommand::class,
        ]);

        $this->app->register(\Cms_Framework_Seed\Install\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['install'];
    }
}
