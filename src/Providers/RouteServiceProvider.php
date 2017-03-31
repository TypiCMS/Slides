<?php

namespace TypiCMS\Modules\Slides\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
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
     * @return null
     */
    public function map()
    {
        Route::group(['namespace' => $this->namespace], function (Router $router) {

            /*
             * Admin routes
             */
            $router->group(['middleware' => 'admin', 'prefix' => 'admin'], function (Router $router) {
                $router->get('slides', 'AdminController@index')->name('admin::index-slides');
                $router->get('slides/create', 'AdminController@create')->name('admin::create-slide');
                $router->get('slides/{slide}/edit', 'AdminController@edit')->name('admin::edit-slide');
                $router->post('slides', 'AdminController@store')->name('admin::store-slide');
                $router->put('slides/{slide}', 'AdminController@update')->name('admin::update-slide');
                $router->patch('slides/{ids}', 'AdminController@ajaxUpdate')->name('admin::update-slide-ajax');
                $router->delete('slides/{ids}', 'AdminController@destroyMultiple')->name('admin::destroy-slide');
            });
        });
    }
}
