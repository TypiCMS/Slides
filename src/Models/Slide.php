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
     * Get the page record associated with the slide.
     */
    public function page()
    {
        return $this->belongsTo('TypiCMS\Modules\Pages\Models\Page');
    }

    /**
     * Append status attribute from translation table.
     *
     * @return string
     */
    public function getStatusAttribute($value)
    {
        return $value;
    }

    /**
     * Append thumb attribute.
     *
     * @return string
     */
    public function getThumbAttribute()
    {
        return $this->present()->thumbSrc(null, 22);
    }

    /**
     * Append body_cleaned attribute from translation table.
     *
     * @return string
     */
    public function getBodyCleanedAttribute()
    {
        return strip_tags(html_entity_decode($this->body));
    }

    /**
     * Set page_id to null when empty.
     *
     * @return string
     */
    public function setPageIdAttribute($value)
    {
        $this->attributes['page_id'] = ($value == '') ? null : $value;
    }
}
