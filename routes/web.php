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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [InicioController::class, 'index'])->middleware('visita')->name('inicio');
Route::get('/tienda', [tiendaController::class, 'index'])->middleware('visita')->name('tienda');
Route::post('/registro', [registroController::class, 'store'])->middleware('visita')->name('registro');
Route::post('/login', [loginController::class, 'login'])->middleware('visita')->name('ingresar');
Route::get('/logout', [loginController::class, 'logout'])->middleware('visita')->name('salir');

Route::get('/backoffice', [adminController::class, 'index'])->middleware('isadmin', 'auth', 'visita')->name('backoffice');
Route::post('/backoffice/ventas', [adminController::class, 'ventasMensuales'])->middleware('isadmin', 'auth', 'visita')->name('ventasMensuales');
Route::get('/backoffice/ventas/{id}', [adminController::class, 'ventasMensualesMostrar'])->middleware('isadmin', 'auth', 'visita')->name('ventasMensuales2');
Route::post('/backoffice/visitas', [adminController::class, 'visitasMensuales'])->middleware('isadmin', 'auth', 'visita')->name('visitasMensuales');
Route::get('/backoffice/visitas/{id}', [adminController::class, 'visitasMensualesMostrar'])->middleware('isadmin', 'auth', 'visita')->name('visitasMensuales2');
Route::get('/producto-nuevo', [productoController::class, 'create'])->middleware('isadmin', 'auth' ,'visita')->name('crearproducto');
Route::post('/producto-nuevo', [productoController::class, 'store'])->middleware('isadmin', 'auth', 'visita')->name('crearproducto2');
Route::get('/producto/{id}', [productoController::class, 'show'])->middleware('visita')->name('detalles');
Route::get('/productos',[productoController::class , 'index'])->middleware('isadmin', 'auth','visita')->name('listado-productos');
Route::get('/sinstock', [productoController::class, 'sinStock'])->middleware('isadmin', 'auth','visita')->name('sin-stock');
Route::get('/oferta/{id}', [ofertaController::class, 'create'])->middleware('isadmin', 'auth','visita')->name('crear-oferta-mostrar');
Route::post('/oferta', [ofertaController::class, 'store'])->middleware('isadmin', 'auth','visita')->name('crear-oferta');
Route::get('/oferta/{id}/editar', [ofertaController::class, 'edit'])->middleware('isadmin', 'auth','visita')->name('modificar-oferta-mostrar');


Route::get('/tienda/{id}/{minimo}/{maximo}/{orden}/{nombre}/', [tiendaController::class, 'filtrados'])->middleware('visita')->name('filtrados');
Route::post('/', [carritoController::class, 'store'])->middleware('visita')->name('carrito');
Route::get('/carrito/{id}', [carritoController::class, 'show'])->middleware('checkcarrito','visita')->name('mostrarCarrito');
Route::delete('/borrar-carro/{id}',[carritoController::class, 'destroy'])->name('borrarProductoCarro');
Route::get('/borrar-carro/{id}', function(){
    return redirect()->route('inicio');
});
Route::put('/carrito-agregar/{id}', [carritoController::class , 'update'])->name('actualizarCarrito');
Route::delete('/borrar-producto/{id}', [productoController::class, 'destroy'])->middleware('isadmin', 'auth')->name('borrarProducto');
Route::delete('/recuperar-producto/{id}', [productoController::class, 'recover'])->middleware('isadmin', 'auth')->name('recuperarProducto');
Route::get('/recuperar-producto/{id}', function(){
    return redirect()->route('inicio');
});
Route::get('/borrar-producto/{id}', function(){
    return redirect()->route('inicio');
});
Route::put('/carrito-actualizar/{id}', [carritoController::class, 'actualizar'])->name('actualizarCarrito2');
Route::get('/carrito', [carritoController::class, 'miCarrito'])->middleware('visita')->name('miCarrito');
Route::get('/producto/{id}/editar', [productoController::class, 'edit'])->middleware( 'isadmin','visita')->name('editarProducto');
Route::put('/producto/{id}/editar', [productoController::class, 'update'])->name('editarProducto2');
Route::delete('/borrar-oferta/{id}', [ofertaController::class, 'destroy'])->middleware('isadmin', 'auth')->name('borrarOferta');
// Route::put('/editar-oferta/{id}', [ofertaController::class, 'update'])->middleware('isadmin', 'auth')->name('editarOferta');
Route::get('/editar-oferta/{id}', function(){
    return redirect()->route('inicio');
});
Route::post('/editar-oferta', [ofertaController::class, 'update'])->middleware('isadmin', 'auth')->name('editarOferta');
Route::get('/borrar-oferta/{id}', function(){
    return redirect()->route('inicio');
});

Route::post('/borrar/{id}', [productoController::class, 'borrarImagen'])->middleware('isadmin', 'auth')->name('borrarImagen');
Route::post('/buscar', [productoController::class, 'buscar'])->middleware('isadmin', 'auth', 'visita')->name('buscarProductoAdmin');
Route::post('/buscar/sinstock', [productoController::class, 'buscarSinStock'])->middleware('isadmin', 'auth', 'visita')->name('buscarProductoAdminSinStock');
Route::get('/buscar/{busqueda}', [productoController::class, 'buscados'])->middleware('isadmin', 'auth', 'visita')->name('buscadosProductosAdmin');
Route::get('/buscar/{id}/sinstock', [productoController::class, 'buscadosSinStock'])->middleware('isadmin', 'auth', 'visita')->name('buscadosProductosAdminSinStock');
Route::post('/buscar/ordenar/',[productoController::class, 'filtrarAdmin'])->middleware('isadmin', 'auth', 'visita')->name('filtrarProductosAdmin');
Route::get('/buscar/ordenar/{busqueda}/{categoria}/{orden}',[productoController::class, 'filtradosAdmin'])->middleware('isadmin', 'auth', 'visita')->name('filtrarProductosAdmin2');


Route::get('/compras', [CompraController::class, 'index'])->middleware('isadmin')->name('verCompras');
Route::post('/compras', [CompraController::class, 'buscar'])->middleware('isadmin')->name('buscarCompras');
Route::get('/compras/{busqueda}', [CompraController::class, 'buscados'])->middleware('isadmin')->name('buscarCompras2');
Route::post('/compras/ordenar', [CompraController::class, 'filtrar'])->middleware('isadmin')->name('filtrarCompras');
Route::get('/compras/ordenar/{busqueda}/{categoria}/{orden}', [CompraController::class, 'filtrados'])->middleware('isadmin')->name('filtrarCompras2');


Route::post('/aumentar-stock/', [productoController::class, 'stock'])->middleware('isadmin', 'auth', 'visita')->name('aumentarStock');
Route::get('/productos/ordenar/{id}', [productoController::class, 'ordenar'])->middleware('isadmin', 'auth', 'visita')->name('ordenar');
Route::get('/ofertas', [ofertaController::class, 'index'])->middleware('isadmin', 'auth', 'visita')->name('mostrarOfertas');
Route::get('/ofertas/activas', [ofertaController::class, 'ofertasActivas'])->middleware('isadmin', 'auth', 'visita')->name('mostrarOfertasActivas');
Route::get('/ofertas/futuras', [ofertaController::class, 'ofertasFuturas'])->middleware('isadmin', 'auth', 'visita')->name('mostrarOfertasFuturas');


Route::get('/sobre-nosotros', [inicioController::class, 'nosotros'])->middleware('visita')->name('nosotros');
Route::post('/tienda-filtrar', [tiendaController::class, 'filtrar'])->middleware('visita')->name('filtrar');
Route::post('/tienda', [tiendaController::class, 'buscar'])->middleware('visita')->name('buscar');
Route::get('/tienda/{nombre}', [tiendaController::class, 'buscados'])->middleware('visita')->name('buscados');
Route::post('/comprar/{id}', [compraController::class, 'show'])->middleware('visita')->name('comprar');
Route::get('/comprar/{id}', [compraController::class, 'show'])->middleware('visita', 'checkcarrito')->name('comprar2');

Route::get('/webpay', [WebpayController::class, 'webpayInicio'])->middleware('auth')->name('webpayInicio');
Route::post('/webpay/pagar', [WebpayController::class, 'webpayPagar'])->middleware('auth')->name('webpayPagar');

Route::get('/webpay/respuesta', [WebpayController::class, 'webpayRespuesta'])->middleware('auth')->name('webpayRespuesta');
Route::post('/webpay/respuesta', function(){
    return redirect()->route('inicio');
});

Route::get('/perfil/{id}', [UserController::class, 'show'])->name('perfil');
Route::put('/perfil/{id}', [UserController::class, 'update'])->name('actualizarPerfil');
Route::get('/compra/{id}', [CompraController::class, 'detalle'])->middleware('checkOrderOwnership')->name('compra');
Route::post('/compra/{id}/editar', [CompraController::class, 'cambiarEstado'])->middleware('isadmin')->name('editarCompra');



Route::get('/retiro/compras/', [CompraController::class, 'retiro'])->middleware('isadmin')->name('verComprasRetiro');
Route::post('/retiro/compras/', [CompraController::class, 'buscarRetiro'])->middleware('isadmin')->name('buscarComprasRetiro');
Route::get('/retiro/compras/{busqueda}', [CompraController::class, 'buscadosRetiro'])->middleware('isadmin')->name('buscarComprasRetiro2');
Route::post('/retiro/compras/ordenar', [CompraController::class, 'filtrarRetiro'])->middleware('isadmin')->name('filtrarComprasRetiro');
Route::get('/retiro/compras/ordenar/{busqueda}/{categoria}/{orden}', [CompraController::class, 'filtradosRetiro'])->middleware('isadmin')->name('filtrarComprasRetiro2');

Route::get('/envio/compras', [CompraController::class, 'envio'])->middleware('isadmin')->name('verComprasEnvio');
Route::post('/envio/compras', [CompraController::class, 'buscarEnvio'])->middleware('isadmin')->name('buscarComprasEnvio');
Route::get('/envio/compras{busqueda}', [CompraController::class, 'buscadosEnvio'])->middleware('isadmin')->name('buscarComprasEnvio2');
Route::post('/envio/comprasordenar', [CompraController::class, 'filtrarEnvio'])->middleware('isadmin')->name('filtrarComprasEnvio');
Route::get('/envio/comprasordenar/{busqueda}/{categoria}/{orden}', [CompraController::class, 'filtradosEnvio'])->middleware('isadmin')->name('filtrarComprasEnvio2');

Route::get('/evaluar/{id}', [CompraController::class, 'evaluarMostrar'])->middleware('auth', 'cinco')->name('mostrarEvaluar');
Route::post('/evaluar/{id}', [CompraController::class, 'evaluar'])->name('evaluar');
Route::get('/pdf/{id}', [CompraController::class, 'PDF'])->name('usuario.evaluarPdf');



//route to create storage link

Route::get('/storage', function(){
    $target = storage_path('app/public');
    $link = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($target,$link);
    return 'success';
 });

 //ruta para ejecutar los cron
    Route::get('/cron', function(){
        $exitCode = Artisan::call('schedule:run');
        //give me a prove that it works
        return 'success';
    });



Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->middleware('guest')->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->middleware('guest')->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class , 'showResetForm'])->middleware('guest')->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class , 'reset'])->middleware('guest')->name('password.update');
Route::post('cambiarcontraseña/{id}', [UserController::class, 'cambiarContraseña'])->middleware('checkUserId')->name('cambiarContraseña');