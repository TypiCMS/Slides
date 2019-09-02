<?php

namespace TypiCMS\Modules\Slides\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Slides\Http\Requests\FormRequest;
use TypiCMS\Modules\Slides\Models\Slide;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('slides::admin.index');
    }

    public function create(): View
    {
        $model = new Slide();

        return view('slides::admin.create')->with(compact('model'));
    }

    public function edit(Slide $slide): View
    {
        return view('slides::admin.edit')->with(['model' => $slide]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $model = Slide::create($request->all());

        return $this->redirect($request, $model);
    }

    public function update(Slide $slide, FormRequest $request): RedirectResponse
    {
        $slide->update($request->all());

        return $this->redirect($request, $slide);
    }
}
