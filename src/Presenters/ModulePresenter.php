<?php

namespace TypiCMS\Modules\Slides\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;

class ModulePresenter extends Presenter
{
    public function url()
    {
        if ($this->entity->url) {
            return $this->entity->url;
        }
        if ($this->entity->page) {
            return $this->entity->page->uri(config('app.locale'));
        }
        return null;
    }

    public function title()
    {
        return trans('slides::global.Edit');
    }

    public function title_attribute()
    {
        if ($this->entity->url) {
            return $this->entity->url;
        }
        if ($this->entity->page) {
            return $this->entity->page->title;
        }
        return null;
    }
}
