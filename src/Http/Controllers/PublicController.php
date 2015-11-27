<?php

namespace TypiCMS\Modules\Slides\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Slides\Repositories\SlideInterface;

class PublicController extends BasePublicController
{
    public function __construct(SlideInterface $slide)
    {
        parent::__construct($slide);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index()
    {
        $models = $this->repository->all();

        return view('slides::public.index')
            ->with(compact('models'));
    }

    /**
     * Show news.
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($slug)
    {
        $model = $this->repository->bySlug($slug);

        return view('slides::public.show')
            ->with(compact('model'));
    }
}
