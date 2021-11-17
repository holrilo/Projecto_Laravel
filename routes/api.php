<?php

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

//Rutas Categorias 
/* Route::get('categoria/consultar', 'App\Http\Controllers\CategoriaController@index');
Route::post('categoria/crear', 'App\Http\Controllers\CategoriaController@store' );
Route::put('categoria/edit/{id}', 'App\Http\Controllers\CategoriaController@update'); */

//Ruto Producto
Route::get('producto/consultar','App\Http\Controllers\ProductoController@index');
Route::post('producto/crear', 'App\Http\Controllers\ProductoController@store');