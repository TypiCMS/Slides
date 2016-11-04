<?php

namespace TypiCMS\Modules\Slides\Models;

use TypiCMS\Modules\Core\Models\BaseTranslation;

class SlideTranslation extends BaseTranslation
{
    protected $fillable = [
        'status',
        'body',
    ];

    /**
     * get the parent model.
     */
    public function owner()
    {
        return $this->belongsTo('TypiCMS\Modules\Slides\Models\Slide', 'slide_id');
    }
}
