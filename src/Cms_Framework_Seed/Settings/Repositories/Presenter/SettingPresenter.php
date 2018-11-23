<?php

namespace Cms_Framework_Seed\Settings\Repositories\Presenter;

use Cms_Framework_Seed\Repository\Presenter\FractalPresenter;

class SettingPresenter extends FractalPresenter
{
    /**
     * Prepare data to present.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SettingTransformer();
    }
}
