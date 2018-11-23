<?php

namespace Cms_Framework_Seed\User\Models;

use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Cms_Framework_Seed\Database\Traits\DateFormatter;
use Cms_Framework_Seed\Filer\Traits\Filer;
use Cms_Framework_Seed\Hashids\Traits\Hashids;
use Cms_Framework_Seed\Repository\Traits\PresentableTrait;
use Cms_Framework_Seed\Roles\Traits\CheckRoleAndPermission;
use Cms_Framework_Seed\User\Contracts\UserPolicy;
use Cms_Framework_Seed\User\Traits\User as UserProfile;

class Client extends Model implements UserPolicy
{
    use Filer, Notifiable, DateFormatter, CheckRoleAndPermission, UserProfile, SoftDeletes, Hashids, PresentableTrait;
    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = null;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $role = null;

    /**
     * Initialiaze client modal.
     *
     * @param $name
     */
    public function __construct($attributes = [])
    {
        $config = config($this->config);

        foreach ($config as $key => $val) {
            if (property_exists(get_called_class(), $key)) {
                $this->$key = $val;
            }
        }

        $this->setRole($this->role);

        parent::__construct($attributes);
    }

    public function messages()
    {
        return $this->morphMany('\Cms_Framework_Seed\Message\Models\Message', 'user');
    }

    public function setPasswordAttribute($val)
    {
        if (Hash::needsRehash($val)) {
            $this->attributes['password'] = bcrypt($val);
        } else {
            $this->attributes['password'] = ($val);
        }
    }
}
