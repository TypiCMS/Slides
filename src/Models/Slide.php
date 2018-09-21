<?php

namespace TypiCMS\Modules\Slides\Models;

use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Files\Models\File;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Pages\Models\Page;
use TypiCMS\Modules\Slides\Presenters\ModulePresenter;

class Slide extends Base implements Sortable
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['id', 'exit'];

    public $translatable = [
        'status',
        'body',
    ];

    public $sortable = [
        'order_column_name' => 'position',
    ];

    protected $appends = ['thumb', 'body_cleaned_translated'];

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

    /**
     * Get the page record associated with the slide.
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * This model belongs to one image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
    }
}
