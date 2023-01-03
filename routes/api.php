<?php

use App\Http\Controllers\API\ArticuloController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::get('articulos',[ArticuloController::class,'index']);
Route::post('articulos',[ArticuloController::class,'store']);
Route::put('articulos/{id}',[ArticuloController::class,'update']);
Route::delete('articulos/{id}',[ArticuloController::class,'destroy']); */
Route::get('/articulos', [ArticuloController::class,'index']); //muestra todos los registros
Route::post('/articulos', [ArticuloController::class,'store']); // crea un registro
Route::get('/articulos/{articulo}', [ArticuloController::class,'show']); // actualiza un registro
Route::put('/articulos/{articulo}', [ArticuloController::class,'update']);
Route::delete('/articulos/{articulo}', [ArticuloController::class,'destroy']); //elimina un registro

