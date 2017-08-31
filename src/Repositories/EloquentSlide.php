<?php

namespace TypiCMS\Modules\Slides\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Slides\Models\Slide;

class EloquentSlide extends EloquentRepository
{
    protected $repositoryId = 'slides';

    protected $model = Slide::class;
}
