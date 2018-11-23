<?php

namespace Cms_Framework_Seed\Repository\Contracts;

/**
 * Interface CriteriaInterface.
 */
interface CriteriaInterface
{
    /**
     * Apply criteria in query repository.
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository);
}
