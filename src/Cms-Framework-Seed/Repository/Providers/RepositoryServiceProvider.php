<?php

namespace Litepie\Repository\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider.
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../../resources/config/repository.php' => config_path('repository.php'),
        ]);

        $this->mergeConfigFrom(__DIR__.'/../../../resources/config/repository.php', 'repository');

        $this->loadTranslationsFrom(__DIR__.'/../../../resources/lang', 'repository');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands('Cms_Framework_Seed\Repository\Generators\Commands\RepositoryCommand');
        $this->commands('Cms_Framework_Seed\Repository\Generators\Commands\TransformerCommand');
        $this->commands('Cms_Framework_Seed\Repository\Generators\Commands\PresenterCommand');
        $this->commands('Cms_Framework_Seed\Repository\Generators\Commands\EntityCommand');
        $this->commands('Cms_Framework_Seed\Repository\Generators\Commands\ValidatorCommand');
        $this->commands('Cms_Framework_Seed\Repository\Generators\Commands\ControllerCommand');
        $this->commands('Cms_Framework_Seed\Repository\Generators\Commands\BindingsCommand');
        $this->commands('Cms_Framework_Seed\Repository\Generators\Commands\CriteriaCommand');
        $this->app->register('Litepie\Repository\Providers\EventServiceProvider');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
