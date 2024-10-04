<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/productos', [ProductosController::class, 'getProductos']);
Route::get('/productos/{id}', [ProductosController::class, 'getProductoById']);
Route::post('/productos/add', [ProductosController::class, 'addProducto']);
Route::put('/productos/edit/{id}', [ProductosController::class, 'editProducto']);
Route::delete('/productos/delete/{id}', [ProductosController::class, 'deleteProducto']);
