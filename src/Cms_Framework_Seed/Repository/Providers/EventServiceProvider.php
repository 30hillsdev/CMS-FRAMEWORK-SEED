<?php

namespace Cms_Framework_Seed\Repository\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Cms_Framework_Seed\Repository\Events\RepositoryEntityCreated' => [
            'Cms_Framework_Seed\Repository\Listeners\CleanCacheRepository',
        ],
        'Cms_Framework_Seed\Repository\Events\RepositoryEntityUpdated' => [
            'Cms_Framework_Seed\Repository\Listeners\CleanCacheRepository',
        ],
        'Cms_Framework_Seed\Repository\Events\RepositoryEntityDeleted' => [
            'Cms_Framework_Seed\Repository\Listeners\CleanCacheRepository',
        ],
    ];

    /**
     * Register the application's event listeners.
     *
     * @return void
     */
    public function boot()
    {
        $events = app('events');

        foreach ($this->listen as $event => $listeners) {
            foreach ($listeners as $listener) {
                $events->listen($event, $listener);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }

    /**
     * Get the events and handlers.
     *
     * @return array
     */
    public function listens()
    {
        return $this->listen;
    }
}
