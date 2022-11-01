<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\FlightController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [NewController::class, 'home']);

Route::view('/home', 'homepage');
Route::view('/signup', 'signup');
Route::view('/availableflights', 'availableflights');
Route::view('/form','form');
Route::view('/availableparttwo', 'availableparttwo');
Route::post('/auth', [SignUpController::class, 'insert']);
Route::post('/flights', [FlightController::class, 'search_flight']);

Route::view('/new','new');
