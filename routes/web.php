<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;


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

Route::get('/productos', [ProductoController::class, 'index']);

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
//Route::post('/logout', [LoginController::class, 'logout']);

Route::resource("usuario", UsuarioController::class)->middleware("auth");

Route::get('/plantilla', function () {
    return view('plantilla');
});

Route::get('/navbar', function () {
    return view('navbar_admin');
});