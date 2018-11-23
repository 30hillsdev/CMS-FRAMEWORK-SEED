<?php

namespace Cms_Framework_Seed\Roles\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class RoleListTransformer extends TransformerAbstract
{
    public function transform(\Cms_Framework_Seed\Roles\Models\Role $role)
    {
        return [
            'id'                => $role->getRouteKey(),
            'name'              => $role->name,
            'slug'              => $role->slug,
            'description'       => $role->description,
            'level'             => $role->level,
            'created_at'        => format_date($role->created_at),
            'updated_at'        => format_date($role->updated_at),
        ];
    }
}
