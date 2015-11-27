<?php

namespace TypiCMS\Modules\Slides\Repositories;

use Illuminate\Database\Eloquent\Model;
use TypiCMS\Modules\Core\Repositories\RepositoriesAbstract;

class EloquentSlide extends RepositoriesAbstract implements SlideInterface
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
