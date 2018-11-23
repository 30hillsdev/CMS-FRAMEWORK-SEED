<?php

return [

    /*
     * Provider.
     */
    'provider' => 'cms_framework_seed',

    /*
     * Package.
     */
    'package'  => 'user',

    /*
     * Modules.
     */
    'modules'  => ['user', 'team', 'client'],
    /*
     * Additional user types other than user.
     */
    'types'    => ['client'],

    'policies' => [
        // Bind User policy
        \App\User::class                 => \Cms_Framework_Seed\User\Policies\UserPolicy::class,
        \App\Client::class               => \Cms_Framework_Seed\User\Policies\ClientPolicy::class,
        // Bind Team policy
        \Cms_Framework_Seed\User\Models\Team::class => \Cms_Framework_Seed\User\Policies\TeamPolicy::class,
    ],

    'user'     => [
        'model' => [
            'model'         => \App\User::class,
            'table'         => 'users',
            'presenter'     => \Cms_Framework_Seed\User\Repositories\Presenter\UserPresenter::class,
            'hidden'        => [],
            'visible'       => [],
            'guarded'       => ['*'],
            'slugs'         => [],
            'dates'         => ['created_at', 'updated_at', 'deleted_at', 'dob'],
            'appends'       => [],
            'fillable'      => ['user_id', 'name', 'email', 'parent_id', 'password', 'api_token', 'remember_token', 'sex', 'dob', 'designation', 'mobile', 'phone', 'address', 'street', 'city', 'district', 'state', 'country', 'photo', 'web', 'permissions'],
            'translate'     => [],

            'upload_folder' => 'user/user',
            'uploads'       => [
                'photo' => [
                    'count' => 1,
                    'type'  => 'image',
                ],
            ],
            'casts'         => [
                'permissions' => 'array',
                'photo'       => 'array',
                'dob'         => 'date',
            ],
            'revision'      => [],
            'perPage'       => '20',
            'search'        => [
                'name'        => 'like',
                'email'       => 'like',
                'sex'         => 'like',
                'dob'         => 'like',
                'designation' => 'like',
                'mobile'      => 'like',
                'street'      => 'like',
                'status'      => 'like',
                'created_at'  => 'like',
                'updated_at'  => 'like',
            ],
        ],

    ],

    'client'   => [
        'model'      => [
            'model'         => \App\Client::class,
            'table'         => 'clients',
            'presenter'     => \Cms_Framework_Seed\User\Repositories\Presenter\ClientPresenter::class,
            'hidden'        => [],
            'visible'       => [],
            'guarded'       => ['*'],
            'slugs'         => ['slug' => 'name'],
            'dates'         => ['deleted_at', 'created_at', 'updated_at'],
            'appends'       => [],
            'fillable'      => ['id', 'name', 'email', 'password', 'api_token', 'remember_token', 'sex', 'dob', 'mobile', 'phone', 'address', 'street', 'city', 'district', 'state', 'country', 'photo', 'web', 'status', 'upload_folder', 'deleted_at', 'created_at', 'updated_at'],
            'translatables' => [],
            'upload_folder' => 'user/client',
            'uploads'       => [
                'photo' => [
                    'count' => 1,
                    'type'  => 'image',
                ],
            ],
            'casts'         => [
                'photo' => 'array',
            ],

            'revision'      => [],
            'perPage'       => '20',
            'search'        => [
                'name' => 'like',
                'status',
            ],
        ],

        'controller' => [
            'provider' => 'Cms_Framework_Seed',
            'package'  => 'Clients',
            'module'   => 'Client',
        ],

    ],

    'team'     => [
        'model' => [
            'model'         => \Cms_Framework_Seed\User\Models\Team::class,
            'table'         => 'teams',
            'presenter'     => \Cms_Framework_Seed\User\Repositories\Presenter\TeamPresenter::class,
            'hidden'        => [],
            'visible'       => [],
            'guarded'       => ['*'],
            'slugs'         => ['slug' => 'name'],
            'dates'         => ['deleted_at'],
            'appends'       => [],
            'fillable'      => ['user_id', 'name', 'description'],
            'translate'     => [],

            'upload-folder' => 'user/team',
            'uploads'       => [],
            'casts'         => [
            ],
            'revision'      => [],
            'perPage'       => '20',
            'search'        => [
                'name'        => 'like',
                'description' => 'like',
                'status'      => 'like',
                'created_at'  => 'like',
                'updated_at'  => 'like',
            ],
        ],
    ],
];
