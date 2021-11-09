<?php

namespace TypiCMS\Modules\Slides\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Slides\Composers\SidebarViewComposer;
use TypiCMS\Modules\Slides\Facades\Slides;
use TypiCMS\Modules\Slides\Models\Slide;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'typicms.slides');
        $this->mergeConfigFrom(__DIR__.'/../config/permissions.php', 'typicms.permissions');

        $this->loadViewsFrom(__DIR__.'/../../resources/views/', 'slides');

        $this->publishes([
            __DIR__.'/../../database/migrations/create_slides_table.php.stub' => getMigrationFileName('create_slides_table'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/slides'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../resources/scss' => resource_path('scss'),
        ], 'resources');

        AliasLoader::getInstance()->alias('Slides', Slides::class);

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('slides::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('slides');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Slides', Slide::class);
    }
}
