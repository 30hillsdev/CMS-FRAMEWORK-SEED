<?php

namespace Cms_Framework_Seed\Roles\Models;

use Cms_Framework_Seed\Database\Model;
use Cms_Framework_Seed\Database\Traits\Slugger;
use Cms_Framework_Seed\Filer\Traits\Filer;
use Cms_Framework_Seed\Hashids\Traits\Hashids;
use Cms_Framework_Seed\Repository\Traits\PresentableTrait;
use Cms_Framework_Seed\Roles\Traits\PermissionHasRelations;
use Cms_Framework_Seed\Trans\Traits\Translatable;

class Permission extends Model
{
    use Filer, Hashids, Slugger, Translatable,  PresentableTrait, PermissionHasRelations;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'roles.permission.model';

    public function getSlugIdAttribute()
    {
        return $this->slug.'.'.$this->id;
    }
}
