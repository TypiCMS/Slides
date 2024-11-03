<?php

namespace TypiCMS\Modules\Slides\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;

class ModulePresenter extends Presenter
{
    public function link(): string
    {
        if ($this->entity->website !== null) {
            return $this->entity->website;
        }
        if ($this->entity->page !== null) {
            return $this->entity->page->url();
        }

        return '';
    }

    public function title(): string
    {
        return __('Edit');
    }

    public function title_attribute(): string
    {
        if ($this->entity->website) {
            return $this->entity->website;
        }
        if ($this->entity->page) {
            return $this->entity->page->title;
        }

        return '';
    }
}
