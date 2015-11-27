<?php

namespace TypiCMS\Modules\Slides\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Slides\Http\Requests\FormRequest;
use TypiCMS\Modules\Slides\Repositories\SlideInterface;

class AdminController extends BaseAdminController
{
    public function __construct(SlideInterface $slide)
    {
        parent::__construct($slide);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest $request
     *
     * @return Redirect
     */
    public function store(FormRequest $request)
    {
        $model = $this->repository->create($request->all());

        return $this->redirect($request, $model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $model
     * @param FormRequest $request
     *
     * @return Redirect
     */
    public function update($model, FormRequest $request)
    {
        $this->repository->update($request->all());

        return $this->redirect($request, $model);
    }
}
