<?php

namespace TypiCMS\Modules\Slides\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Slides\Http\Controllers\AdminController;
use TypiCMS\Modules\Slides\Http\Controllers\ApiController;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     */
    public function map()
    {
        Route::namespace($this->namespace)->group(function (Router $router) {
            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('slides', [AdminController::class, 'index'])->name('admin::index-slides')->middleware('can:read slides');
                $router->get('slides/create', [AdminController::class, 'create'])->name('admin::create-slide')->middleware('can:create slides');
                $router->get('slides/{slide}/edit', [AdminController::class, 'edit'])->name('admin::edit-slide')->middleware('can:update slides');
                $router->post('slides', [AdminController::class, 'store'])->name('admin::store-slide')->middleware('can:create slides');
                $router->put('slides/{slide}', [AdminController::class, 'update'])->name('admin::update-slide')->middleware('can:update slides');
            });

            /*
             * API routes
             */
            $router->middleware('api')->prefix('api')->group(function (Router $router) {
                $router->middleware('auth:api')->group(function (Router $router) {
                    $router->get('slides', [ApiController::class, 'index'])->middleware('can:read slides');
                    $router->patch('slides/{slide}', [ApiController::class, 'updatePartial'])->middleware('can:update slides');
                    $router->delete('slides/{slide}', [ApiController::class, 'destroy'])->middleware('can:delete slides');
                });
            });
        });
    }
}
