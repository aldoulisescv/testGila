<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api'])->group(function(){
    
    Route::resource('types', App\Http\Controllers\API\TypeAPIController::class);

    Route::resource('vehicles', App\Http\Controllers\API\VehicleAPIController::class);
});
Route::post('/login',  [ App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/register', [ App\Http\Controllers\API\AuthController::class, 'register']);
Route::get('/logout',  [ App\Http\Controllers\API\AuthController::class, 'logout']);


