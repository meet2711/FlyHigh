<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [NewController::class, 'home']);

Route::view('/home', 'homepage');
Route::view('/signup', 'signup');
Route::view('/signin', 'signin');
Route::view('/availableflights', 'availableflights_new');
Route::view('/form','form');
Route::view('/availableparttwo', 'availableparttwo');
Route::post('/auth', [SignUpController::class, 'insert']);
Route::post('/login', [SignUpController::class, 'login']);
Route::get('/logout', [SignUpController::class, 'logout'])->name('logout');
Route::post('/flights', [FlightController::class, 'search_flight']);
Route::post('/select_flight', [FlightController::class, 'select_flight']);

Route::view('/new','new');

Route::get('google', [GoogleController::class, 'loginWithGoogle'])->name('google');
Route::get('google/callback', [GoogleController::class, 'callbackFromGoogle']);


