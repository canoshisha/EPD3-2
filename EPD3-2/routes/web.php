<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\cestaController;
use App\Http\Controllers\tarjetaController;
use App\Http\Controllers\userController;
use GuzzleHttp\Middleware;



Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware('auth', 'verified');

Route::get('/des_producto', function () {
    return view('product_des');
});
Route::get('/tarjeta_create', function () {
    return view('tarjeta_create');
});

Route::get('/dashboard', [adminController::class, 'show'])->name('admin.dashboard')->middleware(['auth', 'verified']);
Route::get('/users', [adminController::class, 'show_user'])->name('admin.user')->middleware(['auth', 'verified']);
Route::get('/categories', [adminController::class, 'show_category'])->name('admin.category')->middleware(['auth', 'verified']);

Route::post('cesta/addProductB', [cestaController::class, 'addProductB'])->name('cesta.addProductB')->Middleware('auth', 'verified');

Route::post('categories/addCategory', [categoryController::class, 'create'])->name('category.create')->Middleware('auth', 'verified');


Route::get('/products', [productosController::class, 'index'])->name('products.menu');
Route::get('products/{product}/descripcion', [productosController::class, 'show'])->name('producto.descripcion');

Route::get('/misPedidos', [cestaController::class, 'misPedidos'])->name('cesta.mispedidos')->Middleware('auth', 'verified');

Route::get('/cesta', [cestaController::class, 'show'])->name('cesta.show')->Middleware('auth', 'verified');
Route::put('cesta/{shoppingBasket}/actualizar', [cestaController::class, 'update'])->name('cesta.update');

Route::put('cesta/{shoppingBasket}/actualizarCantidad', [cestaController::class, 'updateCantidad'])->name('cesta.updateCantidad');
Route::delete('cesta/eliminar', [cestaController::class, 'destroy'])->name('cesta.destroy')->Middleware('auth', 'verified');
Route::delete('/user/{user}', [userController::class, 'destroy'])->name('users.destroy');
Route::delete('/category/{category}', [categoryController::class, 'destroy'])->name('category.destroy');
Route::put('/category/update/{category}', [categoryController::class, 'update'])->name('category.update');
Route::get('/tarjeta/read', [tarjetaController::class, 'index'])->name('creditCard.read')->Middleware('auth', 'verified');
Route::get('/tarjeta/create', [tarjetaController::class, 'store'])->name('creditCard.create')->Middleware('auth', 'verified');
Route::get('/tarjeta/edit/{tarjeta}', [tarjetaController::class, 'edit'])->name('creditCard.edit')->Middleware('auth', 'verified');
Route::put('/tarjeta/update/{tarjeta}', [tarjetaController::class, 'update'])->name('creditCard.update')->Middleware('auth', 'verified');
Route::get('/tarjeta/{tarjeta}/delete', [tarjetaController::class, 'destroy'])->name('creditCard.delete')->Middleware('auth', 'verified');
