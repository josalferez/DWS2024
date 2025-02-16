<?php

//resources/routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/libros', [ApiController::class, 'index']);
Route::post('/libros', [ApiController::class, 'store']);
Route::delete('/libros/{id}', [ApiController::class, 'destroy']);


//Rutas de autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
