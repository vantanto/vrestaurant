<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['as' => 'members.'], function() {
    
    // Reservation
    Route::grouP(['prefix' => 'reservations'], function() {
        Route::get('/', [ReservationController::class, 'create'])
            ->name('reservations.create');
        Route::post('/', [ReservationController::class, 'store'])
            ->name('reservations.store');
        Route::get('/{code}', [ReservationController::class, 'show'])
            ->name('reservations.show');
    });

    // Gallery
    Route::group(['prefix' => 'galleries'], function() {
        Route::get('/', [GalleryController::class, 'index'])
            ->name('galleries.index');
    });

    // About
    Route::group(['prefix' => 'abouts'], function() {
        Route::get('/', [AboutController::class, 'index'])
            ->name('abouts.index');
    });

    Route::group(['prefix' => 'menus'], function() {
        Route::get('/', [MenuController::class, 'index'])
            ->name('menus.index');
    });

    Route::group(['prefix' => 'contacts'], function() {
        Route::get('/', [ContactController::class, 'index'])
            ->name('contacts.index');
        Route::post('/send_message', [ContactController::class, 'sendMessage'])
            ->name('contacts.send_message');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
