<?php

namespace Cms_Framework_Seed\Menu\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cms_Framework_Seed\Database\Model;
use Cms_Framework_Seed\Database\Traits\Slugger;
use Cms_Framework_Seed\Hashids\Traits\Hashids;
use Cms_Framework_Seed\Node\Traits\SimpleNode;
use Cms_Framework_Seed\Trans\Traits\Translatable;

class Menu extends Model
{
    use Hashids, Slugger, Translatable, SoftDeletes, SimpleNode;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'menu.menu';

    public function getHasRoleAttribute($value)
    {
        if (empty($this->role)) {
            return true;
        }

        if (is_array($this->role) && user()->isOne($this->role)) {
            return true;
        }

        return false;
    }
}
