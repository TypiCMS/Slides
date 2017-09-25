<?php

namespace TypiCMS\Modules\Slides\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Slides\Composers\SidebarViewComposer;
use TypiCMS\Modules\Slides\Facades\Slides;
use TypiCMS\Modules\Slides\Models\Slide;
use TypiCMS\Modules\Slides\Repositories\EloquentSlide;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.slides'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['slides' => []], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'slides');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/slides'),
        ], 'typicms-views');
        $this->publishes([
            __DIR__.'/../resources/assets' => base_path('resources/assets'),
        ], 'typicms-assets');

        AliasLoader::getInstance()->alias('Slides', Slides::class);

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('slides::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('slides');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Slides', EloquentSlide::class);
    }
}
