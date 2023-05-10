<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\cestaController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\tarjetaController;
use App\Http\Controllers\userController;

use GuzzleHttp\Middleware;



Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware('auth', 'verified')->name('perfil.user');

Route::get('/des_producto', function () {
    return view('product_des');
});
Route::get('/tarjeta_create', function () {
    return view('tarjeta_create');
});

Route::get('/dashboard', [adminController::class, 'show'])->name('admin.dashboard')->middleware(['auth', 'verified']);
Route::get('/users', [adminController::class, 'show_user'])->name('admin.user')->middleware(['auth', 'verified']);
Route::get('/categories', [adminController::class, 'show_category'])->name('admin.category')->middleware(['auth', 'verified']);
Route::get('/productos', [adminController::class, 'show_products'])->name('admin.products')->middleware(['auth', 'verified']);
Route::get('/orders', [adminController::class, 'show_order'])->name('admin.order')->middleware(['auth', 'verified']);

Route::get('/menu/user/edit', [userController::class, 'show_menu_user'])->name('edit-menu.user')->middleware(['auth', 'verified']);
Route::put('user/update', [userController::class, 'update'])->name('perfil.update')->middleware(['auth', 'verified']);
Route::post('cesta/addProductB', [cestaController::class, 'addProductB'])->name('cesta.addProductB')->Middleware('auth', 'verified');
Route::post('categories/addCategory', [categoryController::class, 'create'])->name('category.create')->Middleware('auth', 'verified');
Route::get('/products', [productosController::class, 'index'])->name('products.menu');
Route::get('/descuentos', [productosController::class, 'viewDisconunt'])->name('products.descuento');


Route::get('products/{product}/descripcion', [productosController::class, 'show'])->name('producto.descripcion');
Route::get('products/form/create', [productosController::class, 'create'])->name('product.create');
Route::post('products/create', [productosController::class, 'store'])->name('product.store');
Route::get('products/form/edit/{product}', [productosController::class, 'edit'])->name('product.edit');
Route::put('products/update/{product}', [productosController::class, 'update'])->name('product.update');
Route::delete('products/form/delete/{product}', [productosController::class, 'destroy'])->name('product.destroy');

Route::get('/favs', [productosController::class, 'showFavorites'])->name('products.favs');
Route::get('/misPedidos', [cestaController::class, 'misPedidos'])->name('cesta.mispedidos')->Middleware('auth', 'verified');
Route::get('/cesta', [cestaController::class, 'show'])->name('cesta.show')->Middleware('auth', 'verified');
Route::put('cesta/{shoppingBasket}/actualizar', [cestaController::class, 'update'])->name('cesta.update');

Route::post('/favorites/{product}', [productosController::class, 'toggleFavorite'])->name('favorites.toggle')->Middleware('auth', 'verified');
Route::put('cesta/{shoppingBasket}/actualizarCantidad', [cestaController::class, 'updateCantidad'])->name('cesta.updateCantidad');
Route::delete('cesta/eliminar', [cestaController::class, 'destroy'])->name('cesta.destroy')->Middleware('auth', 'verified');

Route::delete('/user/{user}', [userController::class, 'destroy'])->name('users.destroy');
Route::delete('/order/{order}', [orderController::class, 'destroy'])->name('orders.destroy');
Route::delete('/category/{category}', [categoryController::class, 'destroy'])->name('category.destroy');
Route::put('/category/update/{category}', [categoryController::class, 'update'])->name('category.update');

Route::get('/tarjeta/read', [tarjetaController::class, 'index'])->name('creditCard.read')->Middleware('auth', 'verified');
Route::get('/tarjeta/create', [tarjetaController::class, 'store'])->name('creditCard.create')->Middleware('auth', 'verified');
Route::get('/tarjeta/edit/{tarjeta}', [tarjetaController::class, 'edit'])->name('creditCard.edit')->Middleware('auth', 'verified');

Route::put('/tarjeta/update/{tarjeta}', [tarjetaController::class, 'update'])->name('creditCard.update')->Middleware('auth', 'verified');
Route::get('/tarjeta/{tarjeta}/delete', [tarjetaController::class, 'destroy'])->name('creditCard.delete')->Middleware('auth', 'verified');

Route::get('categories/showupdate', [categoryController::class, 'showUpdate'])->name('category.supdate')->Middleware('auth', 'verified');
Route::put('/cambiarIdioma', [userController::class, 'updateLanguage'])->name('language.update')->Middleware('auth', 'verified');