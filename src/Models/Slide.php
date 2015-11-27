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
        'page_id',
        // Translatable columns
        'title',
        'slug',
        'position',
        'status',
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
        'body',
    ];

    protected $appends = ['status', 'title', 'thumb'];

    /**
     * Columns that are file.
     *
     * @var array
     */
    public $attachments = [
        'image',
    ];

    /**
     * Get the page record associated with the slide.
     */
    public function page()
    {
        return $this->belongsTo('TypiCMS\Modules\Pages\Models\Page');
    }
}
