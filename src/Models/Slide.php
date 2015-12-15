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
        'position',
        'url',
        // Translatable columns
        'status',
        'body',
    ];

    /**
     * Translatable model configs.
     *
     * @var array
     */
    public $translatedAttributes = [
        'status',
        'body',
    ];

    protected $appends = ['status', 'thumb', 'body_cleaned'];

    /**
     * Columns that are file.
     *
     * @var array
     */
    public $attachments = [
        'image',
    ];

    /**
     * Get title attribute from translation table
     * and append it to main model attributes.
     *
     * @return string title
     */
    public function getTitleAttribute($value)
    {
        return 'Slide '.$this->id;
    }

    /**
     * Get the page record associated with the slide.
     */
    public function page()
    {
        return $this->belongsTo('TypiCMS\Modules\Pages\Models\Page');
    }

    /**
     * Get Body attribute from translation table
     * and append it to main model attributes.
     *
     * @return string
     */
    public function getBodyCleanedAttribute()
    {
        return strip_tags(html_entity_decode($this->body));
    }
}
