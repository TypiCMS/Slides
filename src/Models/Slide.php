<?php

namespace TypiCMS\Modules\Slides\Models;

use Dimsav\Translatable\Translatable;
use Laracasts\Presenter\PresentableTrait;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;

class Slide extends Base
{
    use Historable;
    use PresentableTrait;
    use Translatable;

    protected $presenter = 'TypiCMS\Modules\Slides\Presenters\ModulePresenter';

    protected $fillable = [
        'image',
        // Translatable columns
        'title',
        'slug',
        'position',
        'homepage',
        'status',
        'website',
        'summary',
        'body',
    ];

    /**
     * Translatable model configs.
     *
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'slug',
        'status',
        'website',
        'summary',
        'body',
    ];

    protected $appends = ['status', 'title', 'thumb', 'website'];

    /**
     * Columns that are file.
     *
     * @var array
     */
    public $attachments = [
        'image',
    ];

    /**
     * Get attribute from translation table
     * and append it to main model attributes.
     *
     * @return string title
     */
    public function getWebsiteAttribute()
    {
        return $this->website;
    }
}
