<?php

namespace Cms_Framework_Seed\User\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class TeamTransformer extends TransformerAbstract
{
    public function transform(\Cms_Framework_Seed\User\Models\Team $team)
    {
        return [
            'id'                => $team->getRouteKey(),
            'manager_id'        => @$team->manager->name,
            'name'              => $team->name,
            'description'       => $team->description,
            'status'            => trans('app.'.$team->status),
            'created_at'        => format_date($team->created_at),
            'updated_at'        => format_date($team->updated_at),
        ];
    }
}
