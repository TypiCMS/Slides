<?php

namespace TypiCMS\Modules\Slides\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        $rules = [
            'position' => 'required|integer|min:1',
            'url' => 'url|max:255',
            'image' => 'image|max:2000',
            'title.*' => 'max:255',
            'slug.*' => 'max:255',
        ];

        return $rules;
    }
}
