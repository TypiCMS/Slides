<?php

namespace TypiCMS\Modules\Slides\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use TypiCMS\Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('global.menus.content'), function (SidebarGroup $group) {
            $group->addItem(trans('slides::global.name'), function (SidebarItem $item) {
                $item->icon = config('typicms.slides.sidebar.icon', 'icon fa fa-fw fa-picture-o');
                $item->weight = config('typicms.slides.sidebar.weight');
                $item->route('admin.slides.index');
                $item->append('admin.slides.create');
                $item->authorize(
                    $this->auth->hasAccess('slides.index')
                );
            });
        });
    }
}
