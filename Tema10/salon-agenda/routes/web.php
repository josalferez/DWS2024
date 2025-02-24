<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // Rutas para gestionar contactos
    Route::resource('contacts', ContactController::class);

    // Rutas para gestionar citas
    Route::resource('appointments', AppointmentController::class);

    // Listar citas de un día determinado
    Route::get('appointments/date/{date}', [AppointmentController::class, 'showByDate'])->name('appointments.byDate');
});