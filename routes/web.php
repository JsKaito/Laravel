<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Clientes Routes */
Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [App\Http\Controllers\ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [App\Http\Controllers\ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'destroy'])->name('clientes.destroy');

/* Producto Routes */
Route::resource('producto', App\Http\Controllers\ProductoController::class);

/* Categoria Routes */
Route::resource('categoria', App\Http\Controllers\CategoriaController::class);

/* Orden Routes */
Route::resource('orden', App\Http\Controllers\OrdenController::class);

/* Proveedor Routes */
Route::resource('proveedor', App\Http\Controllers\ProveedorController::class);