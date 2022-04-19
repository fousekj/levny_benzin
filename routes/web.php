<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GasStationController;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
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

/**
 * Routy nepřihlášených uživatelů
 **/
Route::middleware('redirectIfNotAuth')->group(function () {
    Route::get('/', [WelcomeController::class, 'home'])->name('home');
    Route::get('/seznam', [WelcomeController::class, 'list'])->name('list');
    Route::get('/show/{id}', [WelcomeController::class, 'show'])->name('welcome.show');
});

/**
 * Routy pro kontakt
 */
Route::get('contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

/**
 * Routy pro Admin
 */
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function (){
    Route::get('/', [AdminController::class, 'home'])->name('admin.home');
});

Route::middleware(['auth', 'admin'])->prefix('admin/cerpaci-stanice')->group(function (){
    Route::get('/list', [AdminController::class, 'list'])->name('admin.list');
    Route::get('/show/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [GasStationController::class, 'update'])->name('gasStation.edit');
    Route::get('/create', [GasStationController::class, 'create'])->name('gasStation.create');
    Route::put('/create', [GasStationController::class, 'store'])->name('gasStation.store');
    Route::delete('/list/{id}', [GasStationController::class, 'destroy'])->name('gasStation.delete');
    Route::delete('/show/{id}', [GasStationController::class, 'destroy'])->name('gasStation.delete');
});

/**
 * Routy pro User
 */
Route::middleware(['auth', 'user'])->prefix('user')->group(function (){
    Route::get('/', [UserControler::class, 'home'])->name('user.home');
});

Route::middleware(['auth', 'user'])->prefix('user/cerpaci-stanice')->group(function () {
    Route::get('/list', [UserControler::class, 'list'])->name('user.list');
    Route::get('/show/{id}', [UserControler::class, 'show'])->name('user.show');
    Route::get('/edit/{id}', [UserControler::class, 'edit'])->name('user.editPrices');
    Route::put('/update/{id}', [GasStationController::class, 'update'])->name('gasStation.updatePrices');

});


Auth::routes(['verify' => true]);
