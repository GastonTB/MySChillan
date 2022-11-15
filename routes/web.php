<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tiendaController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registroController;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\productoController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::get('/tienda', [tiendaController::class, 'index'])->name('tienda');

Route::post('/registro', [registroController::class, 'store'])->name('registro');
Route::post('/login', [loginController::class, 'login'])->name('ingresar');
Route::get('/logout', [loginController::class, 'logout'])->name('salir');

Route::get('/backoffice', [adminController::class, 'index'])->middleware('isadmin', 'auth')->name('backoffice');
Route::get('/producto-nuevo', [productoController::class, 'create'])->middleware('isadmin', 'auth')->name('crearproducto');
Route::post('/producto-nuevo', [productoController::class, 'store'])->middleware('isadmin', 'auth')->name('crearproducto2');
Route::get('producto/{id}', [productoController::class, 'show'])->name('detalles');

