<?php

namespace TypiCMS\Modules\Slides\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-slides')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('slides::global.name'), function (SidebarItem $item) {
                $item->id = 'slides';
                $item->icon = config('typicms.slides.sidebar.icon', 'icon fa fa-fw fa-picture-o');
                $item->weight = config('typicms.slides.sidebar.weight');
                $item->route('admin::index-slides');
                $item->append('admin::create-slide');
            });
        });
    }
}
