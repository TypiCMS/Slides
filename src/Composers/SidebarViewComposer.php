<?php

namespace TypiCMS\Modules\Slides\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view): void
    {
        if (Gate::denies('read slides')) {
            return;
        }
        $view->offsetGet('sidebar')->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Slides'), function (SidebarItem $item) {
                $item->id = 'slides';
                $item->icon = config('typicms.modules.slides.sidebar.icon');
                $item->weight = config('typicms.modules.slides.sidebar.weight');
                $item->route('admin::index-slides');
            });
        });
    }
}
