<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tiendaController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registroController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\ofertaController;
use App\Http\Controllers\carritoController;



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
Route::get('/producto/{id}', [productoController::class, 'show'])->name('detalles');
Route::get('/productos',[productoController::class , 'index'])->middleware('isadmin', 'auth')->name('listado-productos');
Route::post('/oferta', [ofertaController::class, 'store'])->middleware('isadmin', 'auth')->name('crear-oferta');

Route::get('/tienda/{id}/{minimo}/{maximo}/{orden}/{nombre}/', [tiendaController::class, 'filtrados'])->name('filtrados');
Route::post('/', [carritoController::class, 'store'])->name('carrito');
Route::get('/carrito/{id}', [carritoController::class, 'show'])->middleware('checkcarrito')->name('mostrarCarrito');
Route::delete('/borrar-carro/{id}',[carritoController::class, 'destroy'])->name('borrarProductoCarro');
Route::get('/borrar-carro/{id}', function(){
    return redirect()->route('inicio');
});
Route::put('/carrito-agregar/{id}', [carritoController::class , 'update'])->name('actualizarCarrito');
Route::delete('/borrar-producto/{id}', [productoController::class, 'destroy'])->middleware('isadmin', 'auth')->name('borrarProducto');
Route::get('/borrar-producto/{id}', function(){
    return redirect()->route('inicio');
});
Route::put('/carrito-actualizar/{id}', [carritoController::class, 'actualizar'])->name('actualizarCarrito2');
Route::get('/carrito', [carritoController::class, 'miCarrito'])->name('miCarrito');
Route::get('/producto/{id}/editar', [productoController::class, 'edit'])->name('editarProducto');
Route::put('/producto/{id}/editar', [productoController::class, 'update'])->name('editarProducto2');
Route::delete('/borrar-oferta/{id}', [ofertaController::class, 'destroy'])->middleware('isadmin', 'auth')->name('borrarOferta');
Route::put('/editar-oferta/{id}', [ofertaController::class, 'update'])->middleware('isadmin', 'auth')->name('editarOferta');
Route::get('/editar-oferta/{id}', function(){
    return redirect()->route('inicio');
});
Route::get('/borrar-oferta/{id}', function(){
    return redirect()->route('inicio');
});
Route::post('/buscar', [productoController::class, 'buscar'])->middleware('isadmin', 'auth')->name('buscarProductoAdmin');
Route::get('/buscar/{id}', [productoController::class, 'buscados'])->middleware('isadmin', 'auth')->name('buscadosProductosAdmin');
Route::put('/aumentar-stock/{id}', [productoController::class, 'stock'])->middleware('isadmin', 'auth')->name('aumentarStock');
Route::get('/productos/ordenar/{id}', [productoController::class, 'ordenar'])->middleware('isadmin', 'auth')->name('ordenar');
Route::get('/ofertas', [ofertaController::class, 'index'])->middleware('isadmin', 'auth')->name('mostrarOfertas');
Route::get('/sobre-nosotros', [inicioController::class, 'nosotros'])->name('nosotros');
Route::post('/tienda', [tiendaController::class, 'filtrar'])->name('filtrar');
Route::post('/tienda2', [tiendaController::class, 'buscar'])->name('buscar');
Route::get('/tienda/{nombre}', [tiendaController::class, 'buscados'])->name('buscados');