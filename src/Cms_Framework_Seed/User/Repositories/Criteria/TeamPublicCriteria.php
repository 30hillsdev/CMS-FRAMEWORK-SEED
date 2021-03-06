<?php

namespace Cms_Framework_Seed\Package\Repositories\Criteria;

use Cms_Framework_Seed\Contracts\Repository\Criteria as CriteriaInterface;
use Cms_Framework_Seed\Repository\Contracts\RepositoryInterface;

class TeamPublicCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('status', '=', 'Published');

        return $model;
    }
}
