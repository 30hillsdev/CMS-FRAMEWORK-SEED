<?php

namespace Cms_Framework_Seed\Roles\Repositories\Presenter;

use Cms_Framework_Seed\Repository\Presenter\FractalPresenter;

class PermissionItemPresenter extends FractalPresenter
{
    /**
     * Prepare data to present.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PermissionItemTransformer();
    }
}
