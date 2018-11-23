<?php

namespace Cms_Framework_Seed\User\Repositories\Presenter;

use Cms_Framework_Seed\Repository\Presenter\FractalPresenter;

class ClientPresenter extends FractalPresenter
{
    /**
     * Prepare data to present.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClientTransformer();
    }
}
