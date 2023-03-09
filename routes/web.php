<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\WebpayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;




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


Route::get('/', [InicioController::class, 'index'])->middleware('visita')->name('inicio');
Route::get('/tienda', [TiendaController::class, 'index'])->middleware('visita')->name('tienda');
Route::post('/registro', [RegistroController::class, 'store'])->middleware('visita')->name('registro');
Route::post('/login', [LoginController::class, 'login'])->middleware('visita')->name('ingresar');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('visita')->name('salir');

Route::get('/backoffice', [AdminController::class, 'index'])->middleware('isadmin', 'auth', 'visita')->name('backoffice');
Route::post('/backoffice/ventas', [AdminController::class, 'ventasMensuales'])->middleware('isadmin', 'auth', 'visita')->name('ventasMensuales');
Route::get('/backoffice/ventas/{id}', [AdminController::class, 'ventasMensualesMostrar'])->middleware('isadmin', 'auth', 'visita')->name('ventasMensuales2');
Route::post('/backoffice/visitas', [AdminController::class, 'visitasMensuales'])->middleware('isadmin', 'auth', 'visita')->name('visitasMensuales');
Route::get('/backoffice/visitas/{id}', [AdminController::class, 'visitasMensualesMostrar'])->middleware('isadmin', 'auth', 'visita')->name('visitasMensuales2');
Route::get('/producto-nuevo', [ProductoController::class, 'create'])->middleware('isadmin', 'auth', 'visita')->name('crearproducto');
Route::post('/producto-nuevo', [ProductoController::class, 'store'])->middleware('isadmin', 'auth', 'visita')->name('crearproducto2');
Route::get('/producto/{id}', [ProductoController::class, 'show'])->middleware('visita')->name('detalles');
Route::get('/productos', [ProductoController::class, 'index'])->middleware('isadmin', 'auth', 'visita')->name('listado-productos');
Route::get('/oferta/{id}', [OfertaController::class, 'create'])->middleware('isadmin', 'auth', 'visita')->name('crear-oferta-mostrar');
Route::post('/oferta', [OfertaController::class, 'store'])->middleware('isadmin', 'auth', 'visita')->name('crear-oferta');
Route::get('/oferta/{id}/editar', [OfertaController::class, 'edit'])->middleware('isadmin', 'auth', 'visita')->name('modificar-oferta-mostrar');


Route::get('/tienda/{id}/{minimo}/{maximo}/{orden}/{nombre}/', [TiendaController::class, 'filtrados'])->middleware('visita')->name('filtrados');
Route::post('/', [CarritoController::class, 'store'])->middleware('visita')->name('carrito');
Route::get('/carrito/{id}', [CarritoController::class, 'show'])->middleware('checkcarrito', 'visita')->name('mostrarCarrito');
Route::delete('/borrar-carro/{id}', [CarritoController::class, 'destroy'])->name('borrarProductoCarro');
Route::get('/borrar-carro/{id}', function () {
    return redirect()->route('inicio');
});
Route::put('/carrito-agregar/{id}', [CarritoController::class, 'update'])->middleware('visita')->name('actualizarCarrito');
Route::delete('/borrar-producto/{id}', [ProductoController::class, 'destroy'])->middleware('visita','isadmin', 'auth')->name('borrarProducto');
Route::delete('/recuperar-producto/{id}', [ProductoController::class, 'recover'])->middleware('visita','isadmin', 'auth')->name('recuperarProducto');
Route::get('/recuperar-producto/{id}', function () {
    return redirect()->route('inicio');
});
Route::get('/borrar-producto/{id}', function () {
    return redirect()->route('inicio');
});
Route::put('/carrito-actualizar/{id}', [CarritoController::class, 'actualizar'])->middleware('visita')->name('actualizarCarrito2');
Route::get('/carrito', [CarritoController::class, 'miCarrito'])->middleware('visita')->name('miCarrito');
Route::get('/producto/{id}/editar', [ProductoController::class, 'edit'])->middleware('isadmin', 'visita','auth')->name('editarProducto');
Route::put('/producto/{id}/editar', [ProductoController::class, 'update'])->middleware('isadmin', 'visita','auth')->name('editarProducto2');
Route::delete('/borrar-oferta/{id}', [OfertaController::class, 'destroy'])->middleware('isadmin', 'auth','visita')->name('borrarOferta');
Route::get('/editar-oferta/{id}', function () {
    return redirect()->route('inicio');
});
Route::post('/editar-oferta', [OfertaController::class, 'update'])->middleware('isadmin', 'auth', 'visita')->name('editarOferta');
Route::get('/borrar-oferta/{id}', function () {
    return redirect()->route('inicio');
});

Route::post('/borrar/{id}', [ProductoController::class, 'borrarImagen'])->middleware('isadmin', 'auth', 'visita')->name('borrarImagen');
Route::post('/buscar', [ProductoController::class, 'buscar'])->middleware('isadmin', 'auth', 'visita')->name('buscarProductoAdmin');
Route::get('/buscar/{busqueda}', [ProductoController::class, 'buscados'])->middleware('isadmin', 'auth', 'visita')->name('buscadosProductosAdmin');

Route::post('/buscar/ordenar/', [ProductoController::class, 'filtrarAdmin'])->middleware('isadmin', 'auth', 'visita')->name('filtrarProductosAdmin');
Route::get('/buscar/ordenar/{busqueda}/{categoria}/{orden}', [ProductoController::class, 'filtradosAdmin'])->middleware('isadmin', 'auth', 'visita')->name('filtrarProductosAdmin2');

Route::get('/sinstock', [ProductoController::class, 'sinStock'])->middleware('isadmin', 'auth', 'visita')->name('sin-stock');
Route::post('/buscar/sinstock', [ProductoController::class, 'buscarSinStock'])->middleware('isadmin', 'auth', 'visita')->name('buscarProductoAdminSinStock');
Route::get('/buscar/{busqueda}/sinstock', [ProductoController::class, 'buscadosSinStock'])->middleware('isadmin', 'auth', 'visita')->name('buscadosProductosAdminSinStock');
Route::post('/buscar/ordenar/sintock', [ProductoController::class, 'filtrarAdminSinStock'])->middleware('isadmin', 'auth', 'visita')->name('filtrarProductosAdminSinStock');
Route::get('/buscar/ordenar/{busqueda}/{categoria}/{orden}/sinstock', [ProductoController::class, 'filtradosAdminSinStock'])->middleware('isadmin', 'auth', 'visita')->name('filtrarProductosAdminSinStock2');

Route::get('/compras', [CompraController::class, 'index'])->middleware('isadmin', 'auth', 'visita')->name('verCompras');
Route::post('/compras', [CompraController::class, 'buscar'])->middleware('isadmin', 'auth', 'visita')->name('buscarCompras');
Route::get('/compras/{busqueda}', [CompraController::class, 'buscados'])->middleware('isadmin', 'auth', 'visita')->name('buscarCompras2');
Route::post('/compras/ordenar', [CompraController::class, 'filtrar'])->middleware('isadmin', 'auth', 'visita')->name('filtrarCompras');
Route::get('/compras/ordenar/{busqueda}/{categoria}/{orden}', [CompraController::class, 'filtrados'])->middleware('isadmin', 'auth', 'visita')->name('filtrarCompras2');



Route::post('/aumentar-stock/', [ProductoController::class, 'stock'])->middleware('isadmin', 'auth', 'visita')->name('aumentarStock');
Route::get('/productos/ordenar/{id}', [ProductoController::class, 'ordenar'])->middleware('isadmin', 'auth', 'visita')->name('ordenar');
Route::get('/ofertas', [OfertaController::class, 'index'])->middleware('isadmin', 'auth', 'visita')->name('mostrarOfertas');
Route::get('/ofertas/activas', [OfertaController::class, 'ofertasActivas'])->middleware('isadmin', 'auth', 'visita')->name('mostrarOfertasActivas');
Route::get('/ofertas/futuras', [OfertaController::class, 'ofertasFuturas'])->middleware('isadmin', 'auth', 'visita')->name('mostrarOfertasFuturas');


Route::get('/sobre-nosotros', [inicioController::class, 'nosotros'])->middleware('visita')->name('nosotros');
Route::post('/tienda-filtrar', [TiendaController::class, 'filtrar'])->middleware('visita')->name('filtrar');
Route::post('/tienda', [TiendaController::class, 'buscar'])->middleware('visita')->name('buscar');
Route::get('/tienda/{nombre}', [TiendaController::class, 'buscados'])->middleware('visita')->name('buscados');
Route::post('/comprar/{id}', [CompraController::class, 'show'])->middleware('visita')->name('comprar');
Route::get('/comprar/{id}', [CompraController::class, 'show'])->middleware('visita', 'checkcarrito')->name('comprar2');

Route::post('/webpay/pagar', [WebpayController::class, 'webpayPagar'])->middleware('auth', 'visita')->name('webpayPagar');
Route::get('/webpay/pagar', function () {
    return redirect()->route('inicio');
});
Route::get('/webpay/respuesta', [WebpayController::class, 'webpayRespuesta'])->middleware('visita')->name('webpayRespuesta');
Route::post('/webpay/respuesta', function () {
    return redirect()->route('inicio');
});

Route::get('/perfil/{id}', [UserController::class, 'show'])->middleware('visita')->name('perfil');
Route::put('/perfil/{id}', [UserController::class, 'update'])->middleware('visita')->name('actualizarPerfil');
Route::get('/compra/{id}', [CompraController::class, 'detalle'])->middleware('checkOrderOwnership', 'auth','visita')->name('compra');
Route::post('/compra/{id}/editar', [CompraController::class, 'cambiarEstado'])->middleware('isadmin', 'auth', 'visita')->name('editarCompra');



Route::get('/retiro/compras/', [CompraController::class, 'retiro'])->middleware('isadmin','visita')->name('verComprasRetiro');
Route::post('/retiro/compras/', [CompraController::class, 'buscarRetiro'])->middleware('isadmin', 'visita')->name('buscarComprasRetiro');
Route::get('/retiro/compras/{busqueda}', [CompraController::class, 'buscadosRetiro'])->middleware('isadmin', 'visita')->name('buscarComprasRetiro2');
Route::post('/retiro/compras/ordenar', [CompraController::class, 'filtrarRetiro'])->middleware('isadmin', 'visita')->name('filtrarComprasRetiro');
Route::get('/retiro/compras/ordenar/{busqueda}/{categoria}/{orden}', [CompraController::class, 'filtradosRetiro'])->middleware('isadmin', 'visita')->name('filtrarComprasRetiro2');

Route::get('/envio/compras', [CompraController::class, 'envio'])->middleware('isadmin')->name('verComprasEnvio');
Route::post('/envio/compras', [CompraController::class, 'buscarEnvio'])->middleware('isadmin')->name('buscarComprasEnvio');
Route::get('/envio/compras{busqueda}', [CompraController::class, 'buscadosEnvio'])->middleware('isadmin')->name('buscarComprasEnvio2');
Route::post('/envio/comprasordenar', [CompraController::class, 'filtrarEnvio'])->middleware('isadmin')->name('filtrarComprasEnvio');
Route::get('/envio/comprasordenar/{busqueda}/{categoria}/{orden}', [CompraController::class, 'filtradosEnvio'])->middleware('isadmin')->name('filtrarComprasEnvio2');

Route::get('/evaluar/{id}', [CompraController::class, 'evaluarMostrar'])->middleware('checkOrderOwnership','auth', 'cinco')->name('mostrarEvaluar');
Route::post('/evaluar/{id}', [CompraController::class, 'evaluar'])->middleware('visita', 'checkOrderOwnership','auth')->name('evaluar');
Route::get('/pdf/{id}', [CompraController::class, 'PDF'])->middleware('visita', 'auth')->name('usuario.evaluarPdf');



// //route to create storage link

// Route::get('/storage', function(){
//     $target = storage_path('app/public');
//     $link = $_SERVER['DOCUMENT_ROOT'] . '/storage';
//     symlink($target,$link);
//     return 'success';
//  });

//  //ruta para ejecutar los cron
//     Route::get('/cron', function(){
//         $exitCode = Artisan::call('schedule:run');
//         //give me a prove that it works
//         return 'success';
//     });



Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->middleware('guest')->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->middleware('guest')->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->middleware('guest')->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->middleware('guest')->name('password.update');
Route::post('cambiarcontraseña/{id}', [UserController::class, 'cambiarContraseña'])->middleware('checkUserId')->name('cambiarContraseña');
