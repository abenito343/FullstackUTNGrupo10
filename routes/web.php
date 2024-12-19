<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [LoginController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);

Route::get('/mostrar_usuarios', [UsuarioController::class, 'index']);

Route::get('/registrar_usuario', [UsuarioController::class, 'create']);

Route::get('/plantilla', function () {
    return view('plantilla');
});