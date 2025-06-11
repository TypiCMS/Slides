<?php

namespace TypiCMS\Modules\Slides\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Models\History;
use TypiCMS\Modules\Core\Models\Page;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Slides\Presenters\ModulePresenter;

/**
 * @property int $id
 * @property int $position
 * @property int|null $page_id
 * @property int|null $image_id
 * @property string|null $website
 * @property array<array-key, mixed> $status
 * @property array<array-key, mixed> $body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, History> $history
 * @property-read int|null $history_count
 * @property-read File|null $image
 * @property-read Page|null $page
 * @property-read mixed $thumb
 * @property-read mixed $translations
 */
class Slide extends Base implements Sortable
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use SortableTrait;

    protected string $presenter = ModulePresenter::class;

    protected $guarded = [];

    protected $appends = ['thumb'];

    /** @var array<string> */
    public array $translatable = [
        'status',
        'body',
    ];

    /** @var array<string> */
    public array $sortable = [
        'order_column_name' => 'position',
    ];

    /** @return Attribute<string, null> */
    protected function thumb(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->present()->image(null, 54),
        );
    }

    /** @return BelongsTo<Page, $this> */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    /** @return BelongsTo<File, $this> */
    public function image(): BelongsTo
    {
        return $this->belongsTo(File::class, 'image_id');
    }
}
