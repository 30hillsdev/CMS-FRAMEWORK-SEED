<?php

namespace Cms_Framework_Seed\Roles\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the package.
     *
     * @var array
     */
    protected $policies = [
        // Bind Role policy
        'Cms_Framework_Seed\Roles\Models\Role' => \Cms_Framework_Seed\Roles\Policies\RolePolicy::class,
// Bind Permission policy
        'Cms_Framework_Seed\Roles\Models\Permission' => \Cms_Framework_Seed\Roles\Policies\PermissionPolicy::class,
    ];

    /**
     * Register any package authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
