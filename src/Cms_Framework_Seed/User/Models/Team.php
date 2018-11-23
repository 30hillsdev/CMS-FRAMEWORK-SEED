<?php

namespace Cms_Framework_Seed\User\Models;

use Cms_Framework_Seed\Database\Model;
use Cms_Framework_Seed\Database\Traits\Slugger;
use Cms_Framework_Seed\Filer\Traits\Filer;
use Cms_Framework_Seed\Hashids\Traits\Hashids;
use Cms_Framework_Seed\Repository\Traits\PresentableTrait;
use Cms_Framework_Seed\Trans\Traits\Translatable;
use Cms_Framework_Seed\User\Traits\Team as TeamTrait;

// use Cms_Framework_Seed\Workflow\Model\Workflow;

class Team extends Model
{
    use Filer, Hashids, Slugger, Translatable,  PresentableTrait, TeamTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'users.team.model';
}
