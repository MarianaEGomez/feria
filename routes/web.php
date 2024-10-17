<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReservaController;

Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/reservas', [ReservaController::class, 'getPlaces'])->name('reservas');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');
Route::get('/preguntas-frecuentes', [PageController::class, 'faq'])->name('faq');
Route::get('/contactos', [PageController::class, 'contactos'])->name('contactos');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/calendar', function () {
        return view('components-dashboard.calendar');
    });    
});

