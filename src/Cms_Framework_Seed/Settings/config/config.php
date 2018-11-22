<?php

return [

    /*
     * Provider.
     */
    'provider'  => 'cms_framework_seed',

    /*
     * Package.
     */
    'package'   => 'settings',

    /*
     * Modules.
     */
    'modules'   => ['setting'],

    'setting'       => [
        'model'             => 'Cms_Framework_Seed\Settings\Models\Setting',
        'table'             => 'settings',
        'presenter'         => \Cms_Framework_Seed\Settings\Repositories\Presenter\SettingPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => ['slug' => 'name'],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id', 'key',  'package',  'module',  'name',  'value',  'file',  'control',  'type'],
        'translate'         => ['key',  'package',  'module',  'name',  'value',  'file',  'control',  'type'],
        'upload_folder'     => 'settings/setting',
        'uploads'           => [],
        'casts'             => [],
        'revision'          => [],
        'perPage'           => '20',
        'search'            => [
            'name'  => 'like',
            'status',
        ],

    ],
];
