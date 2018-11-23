<?php

namespace Cms_Framework_Seed\User\Repositories\Eloquent;

use Cms_Framework_Seed\Repository\Eloquent\BaseRepository;
use Cms_Framework_Seed\User\Interfaces\ClientRepositoryInterface;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    public function boot()
    {
        $type = request('type', 'client');
        $this->fieldSearchable = config('users.'.$type.'.model.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $type = request('type', 'client');

        return config('users.'.$type.'.model.model');
    }
}
