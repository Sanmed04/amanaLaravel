<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',  [
    ProductoController::class,
    'indexDestacados'
])->name('index.amana');


Route::get('/contacto', [
    ContactoController::class,
    'index'
])->name('contacto.index');

Route::post('/contacto', [
    ContactoController::class,
    'submit'
])->name('contacto.submit');

Route::get('/info', function () {
    return view('info.index');
})->name('info.index');


Route::get('/productos', [
    ProductoController::class,
    'index'
])->name('productos.index');

Route::get('/productos/{id}', [
    ProductoController::class,
    'show'
])->name('productos.show');


Route::middleware('IsAdmin')->group(function () {
    Route::resource('/productos', ProductoController::class)->except(['index', 'show']);

    Route::get('/admin', function () {
        return view('admin.admin-menu');
    })->name('admin.admin-menu');

    Route::get('/admin/productos',  [
        ProductoController::class,
        'indexAdmin'
    ])->name('admin.admin-productos');

    Route::get('/admin/productos/create',  [
        ProductoController::class,
        'crear'
    ])->name('admin.admin-crear-producto-form');

    Route::post('/admin/productos',  [
        ProductoController::class,
        'almacenarProducto'
    ])->name('admin.admin-crear-producto');

    Route::get('/admin/{producto}/editar', [
        ProductoController::class,
        'editar'
    ])->name('admin.admin-editar-producto');

    Route::delete('/admin/{producto}', [
        ProductoController::class,
        'eliminar'
    ])->name('admin.admin-eliminar-producto');

    Route::put('/admin/{producto}', [
        ProductoController::class,
        'actualizar'
    ])->name('admin.admin-actualizar-producto');
});

Route::get('/pago', function () {
    return view('pago.index');
})->middleware(['auth', 'verified'])->name('pago');


Route::resource('/cart', CartController::class)->except(['create', 'store', 'edit', 'show']);
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/pago/finalizar', [
    PagoController::class,
    'finalizar'
])->name('pago.finalizar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
