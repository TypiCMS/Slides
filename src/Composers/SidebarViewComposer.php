<?php

namespace TypiCMS\Modules\Slides\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use TypiCMS\Modules\Sidebar\SidebarGroup;
use TypiCMS\Modules\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view): void
    {
        if (Gate::denies('read slides')) {
            return;
        }
        $view->offsetGet('sidebar')->group(__('Content'), function (SidebarGroup $group): void {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Slides'), function (SidebarItem $item): void {
                $item->id = 'slides';
                $item->icon = config('typicms.modules.slides.sidebar.icon');
                $item->weight = config('typicms.modules.slides.sidebar.weight');
                $item->route('admin::index-slides');
            });
        });
    }
}
