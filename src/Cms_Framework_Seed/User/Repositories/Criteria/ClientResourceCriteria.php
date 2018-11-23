<?php

namespace Cms_Framework_Seed\User\Repositories\Criteria;

use Cms_Framework_Seed\Repository\Contracts\CriteriaInterface;
use Cms_Framework_Seed\Repository\Contracts\RepositoryInterface;

class ClientResourceCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        return $model;
    }
}
