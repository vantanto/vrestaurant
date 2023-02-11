<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::group(['prefix' => 'abouts'], function() {
        Route::get('/', [AboutController::class, 'index'])
            ->name('abouts.index');
        Route::get('/create', [AboutController::class, 'create'])
            ->name('abouts.create');
        Route::post('/store', [AboutController::class, 'store'])
            ->name('abouts.store');
        Route::get('/edit/{id}', [AboutController::class, 'edit'])
            ->name('abouts.edit');
        Route::post('/update/{id}', [AboutController::class, 'update'])
            ->name('abouts.update');
        Route::post('/destroy/{id}', [AboutController::class, 'destroy'])
            ->name('abouts.destroy');
    });

    Route::group(['prefix' => 'banners'], function() {
        Route::get('/', [BannerController::class, 'index'])
            ->name('banners.index');
        Route::get('/create', [BannerController::class, 'create'])
            ->name('banners.create');
        Route::post('/store', [BannerController::class, 'store'])
            ->name('banners.store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])
            ->name('banners.edit');
        Route::post('/update/{id}', [BannerController::class, 'update'])
            ->name('banners.update');
        Route::post('/destroy/{id}', [BannerController::class, 'destroy'])
            ->name('banners.destroy');
    });

    Route::group(['prefix' => 'profiles'], function() {
        Route::get('/', [ProfileController::class, 'edit'])
            ->name('profiles.edit');
        Route::patch('/', [ProfileController::class, 'update'])
            ->name('profiles.update');
        // Route::delete('/', [ProfileController::class, 'destroy'])
        //     ->name('profiles.destroy');
    });
});
