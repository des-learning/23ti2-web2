<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomepageController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index']);
Route::get('/books/{id}', [HomepageController::class, 'book']);

Route::middleware('auth')->group(
    function() {
        Route::controller(AdminController::class)
            ->prefix('admin')
            ->name('admin.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                //Route::get('/books', '...')->name('books');
                //Route::get('/categories', '...')->name('categories');
        });
    }
);
