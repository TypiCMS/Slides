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
        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('slides', [AdminController::class, 'index'])->name('index-slides')->middleware('can:read slides');
            $router->get('slides/create', [AdminController::class, 'create'])->name('create-slide')->middleware('can:create slides');
            $router->get('slides/{slide}/edit', [AdminController::class, 'edit'])->name('edit-slide')->middleware('can:read slides');
            $router->post('slides', [AdminController::class, 'store'])->name('store-slide')->middleware('can:create slides');
            $router->put('slides/{slide}', [AdminController::class, 'update'])->name('update-slide')->middleware('can:update slides');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('slides', [ApiController::class, 'index'])->middleware('can:read slides');
            $router->patch('slides/{slide}', [ApiController::class, 'updatePartial'])->middleware('can:update slides');
            $router->delete('slides/{slide}', [ApiController::class, 'destroy'])->middleware('can:delete slides');
        });
    }
}
