<?php

namespace Cms_Framework_Seed\Filer;

use Illuminate\Support\ServiceProvider;

class FilerServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'filer');
        $this->app->register('\Cms_Framework_Seed\Filer\ImageServiceProvider');
        $this->publishResources();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', 'filer');

        $this->app->bind('filer', function ($app) {
            return new \Cms_Framework_Seed\Filer\Filer();
        });

        $this->app->register(\Cms_Framework_Seed\Filer\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['filer'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([
            __DIR__.'/config.php' => config_path('filer.php'),
            __DIR__.'/image.php'  => config_path('image.php'),
        ], 'config');

        // Publish public view
        $this->publishes([__DIR__.'/views' => base_path('resources/views/vendor/filer')], 'view');
    }
}
