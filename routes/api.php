<?php

use App\Http\Controllers\PolygonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
Route::get('/polygons', [PolygonController::class, 'index']);
Route::post('/polygons', [PolygonController::class, 'store']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
