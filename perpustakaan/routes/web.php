<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index']);
Route::get('/books/{id}', [HomepageController::class, 'book']);

Route::controller(AuthController::class)->group(
    function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('authenticate');
        Route::post('/logout', 'logout')->name('logout');
    }
);

Route::middleware('auth')->group(
    function() {
        adminRoutes();
    }
);

function adminRoutes(): RouteRegistrar
{
    return Route::controller(AdminController::class)
            ->prefix('admin')
            ->name('admin.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                categoryAdminRoutes();
        });
}

function categoryAdminRoutes(): RouteRegistrar
{
    return Route::controller(CategoryController::class)
        ->prefix('category')
        ->name('category.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
        });
}
