<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ModeloController;
use App\Http\Controllers\RentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('client', ClientController::class);
    Route::apiResource('brand', BrandController::class);
    Route::apiResource('car', CarController::class);
    Route::apiResource('rent', RentController::class);
    Route::apiResource('modelo', ModeloController::class);

    Route::post('me', [AuthController::class, 'me']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);
});
