<?php

namespace TypiCMS\Modules\Slides\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;

class ModulePresenter extends Presenter
{
    public function url(): string
    {
        if ($this->entity->url !== null) {
            return $this->entity->url;
        }
        if ($this->entity->page !== null) {
            return url($this->entity->page->uri(config('app.locale')));
        }

        return '';
    }

    public function title(): string
    {
        return __('Edit');
    }

    public function title_attribute(): string
    {
        if ($this->entity->url) {
            return $this->entity->url;
        }
        if ($this->entity->page) {
            return $this->entity->page->title;
        }
    }
}
