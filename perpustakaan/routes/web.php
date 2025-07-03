<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/my_routes.php';

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
