<?php

namespace TypiCMS\Modules\Slides\Models;

use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Pages\Models\Page;

class Slide extends Base
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;

    protected $presenter = 'TypiCMS\Modules\Slides\Presenters\ModulePresenter';

    protected $guarded = ['id', 'exit'];

    public $translatable = [
        'status',
        'body',
    ];

    protected $appends = ['thumb', 'body_cleaned_translated'];

    public $attachments = [
        'image',
    ];

    /**
     * Get the page record associated with the slide.
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
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
     * Append body_cleaned_translated attribute.
     *
     * @return string
     */
    public function getBodyCleanedTranslatedAttribute()
    {
        $locale = config('app.locale');
        $body = $this->translate('body', config('typicms.content_locale', $locale));
        return trim(strip_tags(html_entity_decode($body)), '"');
    }
}
