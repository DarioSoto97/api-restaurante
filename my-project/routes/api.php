<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api.key')->controller(RestauranteController::class)->group(function (){
    Route::get('/restaurantes', 'index');              // Mostrar lista
    Route::get('/restaurantes/{id}', 'show');          // Mostrar uno
    Route::post('/restaurantes', 'store');              // Crear nuevo
    Route::put('/restaurantes/{id}', 'update');        // Actualizar existente
    Route::patch('/restaurantes/{id}', 'partialUpdate'); // Actualizar parical
    Route::delete('/restaurantes/{id}', 'destroy');    // Eliminar
});


