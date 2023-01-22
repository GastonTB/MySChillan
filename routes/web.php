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
use App\Http\Controllers\compraController;
use App\Http\Controllers\WebpayController;
use App\Http\Controllers\UserController;



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

Route::get('/', [InicioController::class, 'index'])->middleware('visita')->name('inicio');
Route::get('/tienda', [tiendaController::class, 'index'])->middleware('visita')->name('tienda');
Route::post('/registro', [registroController::class, 'store'])->middleware('visita')->name('registro');
Route::post('/login', [loginController::class, 'login'])->middleware('visita')->name('ingresar');
Route::get('/logout', [loginController::class, 'logout'])->middleware('visita')->name('salir');

Route::get('/backoffice', [adminController::class, 'index'])->middleware('isadmin', 'auth', 'visita')->name('backoffice');
Route::get('/producto-nuevo', [productoController::class, 'create'])->middleware('isadmin', 'auth' ,'visita')->name('crearproducto');
Route::post('/producto-nuevo', [productoController::class, 'store'])->middleware('isadmin', 'auth', 'visita')->name('crearproducto2');
Route::get('/producto/{id}', [productoController::class, 'show'])->middleware('visita')->name('detalles');
Route::get('/productos',[productoController::class , 'index'])->middleware('isadmin', 'auth','visita')->name('listado-productos');
Route::post('/oferta', [ofertaController::class, 'store'])->middleware('isadmin', 'auth','visita')->name('crear-oferta');

Route::get('/tienda/{id}/{minimo}/{maximo}/{orden}/{nombre}/', [tiendaController::class, 'filtrados'])->middleware('visita')->name('filtrados');
Route::post('/', [carritoController::class, 'store'])->middleware('visita')->name('carrito');
Route::get('/carrito/{id}', [carritoController::class, 'show'])->middleware('checkcarrito','visita')->name('mostrarCarrito');
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
Route::get('/carrito', [carritoController::class, 'miCarrito'])->middleware('visita')->name('miCarrito');
Route::get('/producto/{id}/editar', [productoController::class, 'edit'])->middleware( 'isadmin','visita')->name('editarProducto');
Route::put('/producto/{id}/editar', [productoController::class, 'update'])->name('editarProducto2');
Route::delete('/borrar-oferta/{id}', [ofertaController::class, 'destroy'])->middleware('isadmin', 'auth')->name('borrarOferta');
Route::put('/editar-oferta/{id}', [ofertaController::class, 'update'])->middleware('isadmin', 'auth')->name('editarOferta');
Route::get('/editar-oferta/{id}', function(){
    return redirect()->route('inicio');
});
Route::get('/borrar-oferta/{id}', function(){
    return redirect()->route('inicio');
});
Route::post('/buscar', [productoController::class, 'buscar'])->middleware('isadmin', 'auth', 'visita')->name('buscarProductoAdmin');
Route::get('/buscar/{id}', [productoController::class, 'buscados'])->middleware('isadmin', 'auth', 'visita')->name('buscadosProductosAdmin');
Route::post('/aumentar-stock/', [productoController::class, 'stock'])->middleware('isadmin', 'auth', 'visita')->name('aumentarStock');
Route::get('/productos/ordenar/{id}', [productoController::class, 'ordenar'])->middleware('isadmin', 'auth', 'visita')->name('ordenar');
Route::get('/ofertas', [ofertaController::class, 'index'])->middleware('isadmin', 'auth', 'visita')->name('mostrarOfertas');
Route::get('/sobre-nosotros', [inicioController::class, 'nosotros'])->middleware('visita')->name('nosotros');
Route::post('/tienda-filtrar', [tiendaController::class, 'filtrar'])->middleware('visita')->name('filtrar');
Route::post('/tienda', [tiendaController::class, 'buscar'])->middleware('visita')->name('buscar');
Route::get('/tienda/{nombre}', [tiendaController::class, 'buscados'])->middleware('visita')->name('buscados');
Route::post('/comprar/{id}', [compraController::class, 'show'])->middleware('visita')->name('comprar');
Route::get('/comprar/{id}', [compraController::class, 'show'])->middleware('visita')->name('comprar2');

Route::get('/webpay', [WebpayController::class, 'webpayInicio'])->name('webpayInicio');
Route::post('/webpay/pagar', [WebpayController::class, 'webpayPagar'])->name('webpayPagar');

Route::get('/webpay/respuesta', [WebpayController::class, 'webpayRespuesta'])->name('webpayRespuesta');
Route::post('/webpay/respuesta', function(){
    return redirect()->route('inicio');
});

Route::get('/perfil/{id}', [UserController::class, 'show'])->name('perfil');
Route::put('/perfil/{id}', [UserController::class, 'update'])->name('actualizarPerfil');

//route to create storage link

Route::get('/storage', function(){
    $target = storage_path('app/public');
    $link = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($target,$link);
    //if successfull return success else return error
    return 'success';
 });