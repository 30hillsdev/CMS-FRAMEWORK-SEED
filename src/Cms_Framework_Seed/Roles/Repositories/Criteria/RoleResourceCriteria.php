<?php

namespace Cms_Framework_Seed\Roles\Repositories\Criteria;

use Cms_Framework_Seed\Repository\Contracts\CriteriaInterface;
use Cms_Framework_Seed\Repository\Contracts\RepositoryInterface;

class RoleResourceCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        return $model;
    }
}
