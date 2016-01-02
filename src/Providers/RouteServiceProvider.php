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
            $router->get('admin/slides', ['as' => 'admin.slides.index', 'uses' => 'AdminController@index']);
            $router->get('admin/slides/create', ['as' => 'admin.slides.create', 'uses' => 'AdminController@create']);
            $router->get('admin/slides/{slide}/edit', ['as' => 'admin.slides.edit', 'uses' => 'AdminController@edit']);
            $router->post('admin/slides', ['as' => 'admin.slides.store', 'uses' => 'AdminController@store']);
            $router->put('admin/slides/{slide}', ['as' => 'admin.slides.update', 'uses' => 'AdminController@update']);

            /*
             * API routes
             */
            $router->get('api/slides', ['as' => 'api.slides.index', 'uses' => 'ApiController@index']);
            $router->put('api/slides/{slide}', ['as' => 'api.slides.update', 'uses' => 'ApiController@update']);
            $router->delete('api/slides/{slide}', ['as' => 'api.slides.destroy', 'uses' => 'ApiController@destroy']);
        });
    }
}
