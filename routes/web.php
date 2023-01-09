<?php

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//Productos
Route::resource('productos', ProductoController::class)->middleware('auth');

//Compras
Route::get('/compras', [App\Http\Controllers\CompraController::class, 'index'])->name('compras.index');
Route::post('/compras', [App\Http\Controllers\CompraController::class, 'store'])->name('compras.store');

//Facturas
Route::middleware('auth')->controller(App\Http\Controllers\FacturaController::class)->group(function() {
    Route::get('facturas', 'index')->name('facturas.index');
    Route::get('facturas/generar', 'generar')->name('facturas.generar');
    Route::get('facturas/{factura}', 'show')->name('facturas.show');;
    Route::post('facturas', 'store')->name('facturas.store');;
});
