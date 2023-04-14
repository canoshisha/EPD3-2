<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\cestaController;
use GuzzleHttp\Middleware;

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
    return view('inicio');
})->name('inicio');
Route::get('/home', function () {
    return view('auth.dashboard');
    })->middleware('auth');

Route::get('/home', function () {
    return view('auth.dashboard');
    })->middleware('auth','verified');

Route::get('/productos', function () {
    return view('productos');
});
Route::get('/des_producto', function () {
    return view('product_des');
});


Route::post('cesta/addProductB', [cestaController::class, 'addProductB'])->name('cesta.addProductB')->Middleware('auth');

Auth::routes();

Route::get('/products', [productosController::class, 'index'])->name('products.menu');
Route::get('products/{product}/descripcion', [productosController::class, 'show'])->name('producto.descripcion');

Route::get('/cesta', [cestaController::class, 'show'])->name('cesta.show');
Route::put('cesta/{shoppingBasket}/actualizar', [cestaController::class, 'update'])->name('cesta.update');
Route::delete('cesta/eliminar', [CestaController::class, 'destroy'])->name('cesta.destroy');
