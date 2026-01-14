<?php

declare(strict_types=1);

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

        $view->offsetGet('sidebar')->group(
            __(config('typicms.modules.slides.sidebar.group', 'Content')),
            function (SidebarGroup $group): void {
                $group->id = 'content';
                $group->weight = 30;
                $group->addItem(
                    __(config('typicms.modules.slides.sidebar.label', 'Slides')),
                    function (SidebarItem $item): void {
                        $item->id = 'slides';
                        $item->icon = config('typicms.modules.slides.sidebar.icon');
                        $item->weight = config('typicms.modules.slides.sidebar.weight');
                        $item->route('admin::index-slides');
                    },
                );
            },
        );
    }
}
