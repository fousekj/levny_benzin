<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GasStationController;
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

// Home page
Route::get('', WelcomeController::class);

// Nepřihlášení uživatelé
Route::resource('/gasStation', GasStationController::class);

//Kontakt
Route::get('contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

//Admin
Route::resource('/admin', GasStationController::class);

Auth::routes(['verify' => true]);
