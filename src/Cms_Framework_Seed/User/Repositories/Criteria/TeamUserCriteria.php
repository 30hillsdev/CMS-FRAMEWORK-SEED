<?php

namespace Cms_Framework_Seed\User\Repositories\Criteria;

use Cms_Framework_Seed\Contracts\Repository\Criteria as CriteriaInterface;
use Cms_Framework_Seed\Repository\Contracts\RepositoryInterface;

class TeamUserCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('user_id', '=', user_id());

        return $model;
    }
}
