<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GastosaController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user', UserController::class)->middleware('auth');
Route::resource('producto',ProductoController::class);
Route::resource('categoria', CategoriaController::class)->middleware('auth');
Route::resource('clientes', ClienteController::class);
Route::resource('gastos', GastosController::class);
Route::resource('ingresos', IngresosController::class);
Route::get('gastosa/{id}/pagar', 'App\Http\Controllers\GastosaController@pagar');
Route::resource('gastosa',GastosaController::class);
/* Route::view('logeo','auths/login'); */
Route::get('logeo', function () {
    return view('auths/login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
