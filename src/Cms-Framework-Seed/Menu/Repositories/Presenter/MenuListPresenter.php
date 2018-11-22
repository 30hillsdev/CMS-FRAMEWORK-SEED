<?php

namespace Cms_Framework_Seed\Menu\Repositories\Presenter;

use Cms_Framework_Seed\Repository\Presenter\FractalPresenter;

class MenuListPresenter extends FractalPresenter
{
    /**
     * Prepare data to present.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuListTransformer();
    }
}
