<?php

namespace TypiCMS\Modules\Slides\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('global.menus.content'), function (SidebarGroup $group) {
            $group->addItem(trans('slides::global.name'), function (SidebarItem $item) {
                $item->icon = config('typicms.slides.sidebar.icon', 'icon fa fa-fw fa-picture-o');
                $item->weight = config('typicms.slides.sidebar.weight');
                $item->route('admin::index-slides');
                $item->append('admin::create-slides');
                $item->authorize(
                    auth()->user()->can('index-slides')
                );
            });
        });
    }
}
