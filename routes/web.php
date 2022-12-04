<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TempController;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

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


Auth::routes();

Route::view('/home', 'homepage');

Route::post('/flights', [FlightController::class, 'search_flight']);
Route::view('/availableflights', 'availableflights_new');

Route::post('/select_flight', [FlightController::class, 'select_flight']);
Route::get('/form/{f_id}/{rf_id}/{adults}', [FlightController::class, 'selected_flight_return']);
Route::get('/form/{f_id}/{adults}', [FlightController::class, 'selected_flight']);
Route::view('/form','form');

Route::post('/confirm',[FlightController::class, 'confirm']);
Route::get('/bookings',[FlightController::class, 'show_bk']);
Route::get('/confirmation_page',[FlightController::class, 'view_confirm']);
Route::view('/confirmation', 'confirmation');
Route::get('/temp',[TempController::class, 'image']);

Route::view('/signup', 'signup');
Route::view('/signin', 'signin');
Route::post('/auth', [SignUpController::class, 'insert']);
Route::post('/login', [SignUpController::class, 'login']);
Route::get('/logout', [SignUpController::class, 'logout'])->name('logout');
Route::get('google', [GoogleController::class, 'loginWithGoogle'])->name('google');
Route::get('google/callback', [GoogleController::class, 'callbackFromGoogle']);