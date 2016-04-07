<?php

namespace TypiCMS\Modules\Slides\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use TypiCMS\Modules\Core\Facades\TypiCMS;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'TypiCMS\Modules\Slides\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function (Router $router) {

            /*
             * Admin routes
             */
            $router->get('admin/slides', 'AdminController@index')->name('admin::index-slides');
            $router->get('admin/slides/create', 'AdminController@create')->name('admin::create-slide');
            $router->get('admin/slides/{slide}/edit', 'AdminController@edit')->name('admin::edit-slide');
            $router->post('admin/slides', 'AdminController@store')->name('admin::store-slide');
            $router->put('admin/slides/{slide}', 'AdminController@update')->name('admin::update-slide');

            /*
             * API routes
             */
            $router->get('api/slides', 'ApiController@index')->name('api::index-slides');
            $router->put('api/slides/{slide}', 'ApiController@update')->name('api::update-slide');
            $router->delete('api/slides/{slide}', 'ApiController@destroy')->name('api::destroy-slide');
        });
    }
}
