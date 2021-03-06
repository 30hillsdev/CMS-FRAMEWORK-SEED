<?php

namespace Cms_Framework_Seed\User\Repositories\Eloquent;

use Cms_Framework_Seed\Repository\Eloquent\BaseRepository;
use Cms_Framework_Seed\User\Interfaces\TeamRepositoryInterface;

class TeamRepository extends BaseRepository implements TeamRepositoryInterface
{
    /**
     * @var array
     */
    public function boot()
    {
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $this->fieldSearchable = config('cms_framework_seed.user.user.search');

        return config('cms_framework_seed.user.team.model');
    }

    /**
     * Find a agents.
     *
     * @param type $id
     *
     * @return type
     */
    public function reportingTo($team_id)
    {
        $temp = [];
        $team = $this->model->select('id', 'name', 'manager_id')->whereId($team_id)->first();
        foreach ($team->member as $key => $value) {
            $temp[$value->pivot->user_id] = $value->name;
        }

        return $temp;
    }
}
