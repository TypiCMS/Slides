<?php

namespace TypiCMS\Modules\Slides\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\FileObserver;
use TypiCMS\Modules\Core\Services\Cache\LaravelCache;
use TypiCMS\Modules\Slides\Models\Slide;
use TypiCMS\Modules\Slides\Repositories\CacheDecorator;
use TypiCMS\Modules\Slides\Repositories\EloquentSlide;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.slides'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['slides' => []], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'slides');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'slides');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/slides'),
        ], 'views');
        $this->publishes([
            __DIR__.'/../database' => base_path('database'),
        ], 'migrations');

        AliasLoader::getInstance()->alias(
            'Slides',
            'TypiCMS\Modules\Slides\Facades\Facade'
        );

        // Observers
        Slide::observe(new FileObserver());
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register('TypiCMS\Modules\Slides\Providers\RouteServiceProvider');

        /*
         * Sidebar view composer
         */
        $app->view->composer('core::admin._sidebar', 'TypiCMS\Modules\Slides\Composers\SidebarViewComposer');

        /*
         * Add the page in the view.
         */
        $app->view->composer('slides::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('slides');
        });

        $app->bind('TypiCMS\Modules\Slides\Repositories\SlideInterface', function (Application $app) {
            $repository = new EloquentSlide(new Slide());
            if (!config('typicms.cache')) {
                return $repository;
            }
            $laravelCache = new LaravelCache($app['cache'], 'slides', 10);

            return new CacheDecorator($repository, $laravelCache);
        });
    }
}
