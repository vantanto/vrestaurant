<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryBlogController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReservationController;

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
        Route::get('/show/{id}', [AboutController::class, 'show'])
            ->name('abouts.show');
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

    Route::group(['prefix' => 'category_blogs'], function() {
        Route::get('/', [CategoryBlogController::class, 'index'])
            ->name('category_blogs.index');
        Route::get('/create', [CategoryBlogController::class, 'create'])
            ->name('category_blogs.create');
        Route::post('/store', [CategoryBlogController::class, 'store'])
            ->name('category_blogs.store');
        Route::get('/detail', [CategoryBlogController::class, 'detail'])
            ->name('category_blogs.detail');
        Route::get('/edit/{id}', [CategoryBlogController::class, 'edit'])
            ->name('category_blogs.edit');
        Route::post('/update/{id}', [CategoryBlogController::class, 'update'])
            ->name('category_blogs.update');
        Route::post('/destroy/{id}', [CategoryBlogController::class, 'destroy'])
            ->name('category_blogs.destroy');
    });

    Route::group(['prefix' => 'chefs'], function() {
        Route::get('/', [ChefController::class, 'index'])
            ->name('chefs.index');
        Route::get('/create', [ChefController::class, 'create'])
            ->name('chefs.create');
        Route::post('/store', [ChefController::class, 'store'])
            ->name('chefs.store');
        Route::get('/detail', [ChefController::class, 'detail'])
            ->name('chefs.detail');
        Route::get('/edit/{id}', [ChefController::class, 'edit'])
            ->name('chefs.edit');
        Route::post('/update/{id}', [ChefController::class, 'update'])
            ->name('chefs.update');
        Route::post('/destroy/{id}', [ChefController::class, 'destroy'])
            ->name('chefs.destroy');
    });

    Route::group(['prefix' => 'events'], function() {
        Route::get('/', [EventController::class, 'index'])
            ->name('events.index');
        Route::get('/create', [EventController::class, 'create'])
            ->name('events.create');
        Route::post('/store', [EventController::class, 'store'])
            ->name('events.store');
        Route::get('/detail', [EventController::class, 'detail'])
            ->name('events.detail');
        Route::get('/edit/{id}', [EventController::class, 'edit'])
            ->name('events.edit');
        Route::post('/update/{id}', [EventController::class, 'update'])
            ->name('events.update');
        Route::post('/destroy/{id}', [EventController::class, 'destroy'])
            ->name('events.destroy');
    });

    Route::group(['prefix' => 'foods'], function() {
        Route::get('/', [FoodController::class, 'index'])
            ->name('foods.index');
        Route::get('/create', [FoodController::class, 'create'])
            ->name('foods.create');
        Route::post('/store', [FoodController::class, 'store'])
            ->name('foods.store');
        Route::get('/detail', [FoodController::class, 'detail'])
            ->name('foods.detail');
        Route::get('/edit/{id}', [FoodController::class, 'edit'])
            ->name('foods.edit');
        Route::post('/update/{id}', [FoodController::class, 'update'])
            ->name('foods.update');
        Route::post('/destroy/{id}', [FoodController::class, 'destroy'])
            ->name('foods.destroy');
    });

    Route::group(['prefix' => 'galleries'], function() {
        Route::get('/', [GalleryController::class, 'index'])
            ->name('galleries.index');
        Route::get('/create', [GalleryController::class, 'create'])
            ->name('galleries.create');
        Route::post('/store', [GalleryController::class, 'store'])
            ->name('galleries.store');
        Route::get('/edit/{id}', [GalleryController::class, 'edit'])
            ->name('galleries.edit');
        Route::post('/update/{id}', [GalleryController::class, 'update'])
            ->name('galleries.update');
        Route::post('/destroy/{id}', [GalleryController::class, 'destroy'])
            ->name('galleries.destroy');
    });

    Route::group(['prefix' => 'menus'], function() {
        Route::get('/', [MenuController::class, 'index'])
            ->name('menus.index');
        Route::get('/create', [MenuController::class, 'create'])
            ->name('menus.create');
        Route::post('/store', [MenuController::class, 'store'])
            ->name('menus.store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])
            ->name('menus.edit');
        Route::post('/update/{id}', [MenuController::class, 'update'])
            ->name('menus.update');
        Route::post('/destroy/{id}', [MenuController::class, 'destroy'])
            ->name('menus.destroy');
    });

    Route::group(['prefix' => 'reservations'], function() {
        Route::get('/', [ReservationController::class, 'index'])
            ->name('reservations.index');
        Route::get('/create', [ReservationController::class, 'create'])
            ->name('reservations.create');
        Route::post('/store', [ReservationController::class, 'store'])
            ->name('reservations.store');
        Route::get('/show/{code}', [ReservationController::class, 'show'])
            ->name('reservations.show');
        Route::get('/edit/{code}', [ReservationController::class, 'edit'])
            ->name('reservations.edit');
        Route::post('/update/{code}', [ReservationController::class, 'update'])
            ->name('reservations.update');
        Route::post('/uodate_status/{code}', [ReservationController::class, 'updateStatus'])
            ->name('reservations.update.status');
        Route::post('/destroy/{code}', [ReservationController::class, 'destroy'])
            ->name('reservations.destroy');
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
