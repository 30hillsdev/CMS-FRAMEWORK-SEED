<?php

namespace Cms_Framework_Seed\User\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Request;
use Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Cms_Framework_Seed\User\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (Request::is('admin/user/user/*')) {
            Route::bind('user', function ($user) {
                $userrepo = $this->app->make('Cms_Framework_Seed\User\Interfaces\UserRepositoryInterface');

                return $userrepo->findorNew($user);
            });
        }

        if (Request::is('admin/user/team/*')) {
            Route::bind('team', function ($team) {
                $teamrepo = $this->app->make('Cms_Framework_Seed\User\Interfaces\TeamRepositoryInterface');

                return $teamrepo->findorNew($team);
            });
        }

        if (Request::is('admin/user/*')) {
            Route::bind('client', function ($client) {
                $userrepo = $this->app->make('Cms_Framework_Seed\User\Interfaces\ClientRepositoryInterface');

                return $userrepo->findorNew($client);
            });
        }
    }

    /**
     * Define the routes for the package.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        //$this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the package.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'prefix'     => trans_setlocale(),
        ], function ($router) {
            require __DIR__.'/../routes/auth.php';
            require __DIR__.'/../routes/web.php';
        });
    }
}
