<?php

declare(strict_types=1);

namespace TypiCMS\Modules\Slides\Facades;

use Illuminate\Support\Facades\Facade;

class Slides extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Slides';
    }
}
