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
        $view->sidebar->group(__('global.menus.content'), function (SidebarGroup $group) {
            $group->addItem(__('slides::global.name'), function (SidebarItem $item) {
                $item->id = 'slides';
                $item->icon = config('typicms.slides.sidebar.icon', 'icon fa fa-fw fa-picture-o');
                $item->weight = config('typicms.slides.sidebar.weight');
                $item->route('admin::index-slides');
                $item->append('admin::create-slide');
                $item->authorize(
                    Gate::allows('index-slides')
                );
            });
        });
    }
}
