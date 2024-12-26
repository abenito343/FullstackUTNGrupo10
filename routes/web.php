<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\QuienesomosController;
use App\Http\Controllers\ContactoController;

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

Route::get('/', [LoginController::class, 'index'])->name("login");
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::resource("usuario", UsuarioController::class)->middleware("auth")->names([
    'index' => 'usuarios.index',
]);

Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::resource('productos', ProductoController::class);

Route::get('/quienes-somos', [QuienesomosController::class, 'quieneSomos'])->name('quieneSomos');
Route::get('/contacto', [ContactoController::class, 'contacto'])->name('contacto');

Route::resource('proveedores', ProveedorController::class);

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::resource("categorias", CategoriaController::class)->middleware("auth")->names([
    'index' => 'categorias.index',
    'create' => 'categorias.create',
    'store' => 'categorias.store',
    'show' => 'categorias.show',
    'edit' => 'categorias.edit',
    'update' => 'categorias.update',
    'destroy' => 'categorias.destroy',
]);

Route::resource("usuario", UsuarioController::class)->middleware("auth")->names([
    'index' => 'usuarios.index',
    'create' => 'usuarios.create',
    'store' => 'usuarios.store',
    'show' => 'usuarios.show',
    'edit' => 'usuarios.edit',
    'update' => 'usuarios.update',
    'destroy' => 'usuarios.destroy',
]);

Route::get('/usuario/{usuario}/password_edit', [UsuarioController::class, 'password_edit']);
Route::post('/usuario/{usuario}/password_edit', [UsuarioController::class, 'password_update']);

Route::get('/plantilla', function () {
    return view('plantilla');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource("proveedor", ProveedorController::class)->middleware("auth");

Route::resource('producto', ProductoController::class)->middleware('auth');