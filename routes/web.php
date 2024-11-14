<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PolygonController;

Route::get('/map', [MapController::class, 'showMap'])->name('map');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/reservas', [ReservaController::class, 'getPlaces'])->name('reservas');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');
Route::get('/preguntas-frecuentes', [PageController::class, 'faq'])->name('faq');
Route::get('/contactos', [PageController::class, 'contactos'])->name('contactos');
Route::get('/reception', [PageController::class, 'reception'])->name('reception');
Route::post('/reservations/{id}/approve', [ReservaController::class, 'approve'])->name('reservation.approve');
Route::post('/reservations/{id}/reject', [ReservaController::class, 'reject'])->name('reservation.reject');

Route::post('/post-reservas', [ReservaController::class, 'store'])->name('reservas_post');
Route::post('/enviar-contacto', [ContactController::class, 'enviarContacto'])->name('enviar-contacto');

Route::post('reservas/crear-preferencia', [ReservaController::class, 'createPaymentPreference'])->name('reservas.createPaymentPreference');


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

