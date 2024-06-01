<?php

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

Route::apiResource('brand', BrandController::class);
Route::apiResource('client', ClientController::class);
Route::apiResource('car', CarController::class);
Route::apiResource('rent', RentController::class);
Route::apiResource('modelo', ModeloController::class);
