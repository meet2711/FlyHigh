<?php

use Illuminate\Http\Request;
use App\Http\Controllers\NewController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/home', [NewController::class, 'home']);
Route::post('/add', [NewController::class, 'add']);
Route::delete('/delete/{id}', [NewController::class, 'delete']);
Route::put('/update', [NewController::class, 'update']);

Passport::routes();