<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\BarraSuperiorController;

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

/*Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::resource('productos', ProductoController::class);*/

Route::get('/quienes-somos', [BarraSuperiorController::class, 'quieneSomos'])->name('quieneSomos');
Route::get('/contacto', [BarraSuperiorController::class, 'contacto'])->name('contacto');
Route::get('/dashboard', [BarraSuperiorController::class, 'dashboard'])->name('dashboard');

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

Route::resource("proveedor", ProveedorController::class)->middleware("auth");

Route::resource('producto', ProductoController::class)->middleware('auth');


Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');
Route::get('/detalleVentas', [VentasController::class, 'show'])->name('ventas.detalle');
Route::get('/vender', [VentasController::class, 'create'])->name('ventas.vender');
Route::post('/ventas', [VentasController::class, 'store'])->name('ventas.store');
Route::get('/ventas_admin', [VentasController::class, 'ventas_admin'])->name('ventas_admin');