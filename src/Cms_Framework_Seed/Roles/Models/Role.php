<?php

namespace Cms_Framework_Seed\Roles\Models;

use Cms_Framework_Seed\Database\Model;
use Cms_Framework_Seed\Database\Traits\Slugger;
use Cms_Framework_Seed\Filer\Traits\Filer;
use Cms_Framework_Seed\Hashids\Traits\Hashids;
use Cms_Framework_Seed\Repository\Traits\PresentableTrait;
use Cms_Framework_Seed\Roles\Interfaces\RoleHasRelations as RoleHasRelationsContract;
use Cms_Framework_Seed\Roles\Traits\RoleHasRelations;

class Role extends Model implements RoleHasRelationsContract
{
    use Filer, Hashids, Slugger, PresentableTrait, RoleHasRelations;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'roles.role.model';

    public function setLevelAttribute($value)
    {
        if (empty($value)) {
            return $this->level = 1;
        }

        return $this->level = $value;
    }
}
