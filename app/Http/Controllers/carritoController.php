<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\Oferta;


class carritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $producto = Producto::findOrFail($request->producto);
        $oferta = Oferta::find($producto->oferta_id);

        if(Auth::check())
        {
            $id = Session::get('id');
            $carrito = Carrito::where('user_id',$id)->get();
            $contador = $carrito->count();
            if($contador!=0){

                $carrito = Carrito::where('user_id',$id)->first();
                $contador = count($carrito->productos);
                foreach($carrito->productos as $prod){
                    if($prod->pivot->producto_id == $producto->id){
                        $carrito->productos()->updateExistingPivot($producto->id, ['cantidad_carrito' => $prod->pivot->cantidad_carrito + $request->cantidad]);
                        break;
                    }
                    $contador--;
                }
                if($contador == 0){

                    $carrito->productos()->attach($producto->id, ['cantidad_carrito' => $request->cantidad]);
                }               
                if($oferta!=null){
                    if($producto->oferta->estado_oferta == 1){
                        $precio = $producto->oferta->precio_oferta;
                    }else{
                        $precio = $producto->precio;
                    }
                }else{
                    $precio = $producto->precio;
                }
                $carrito->total = $carrito->total + $precio;
                $carrito->save();
                return redirect()->back();
            }else{
                $carrito = new Carrito();
                $carrito->user_id = $id;
                if($oferta!=null){
                    if($producto->oferta->estado_oferta == 1){
                        $carrito->total = $producto->oferta->precio_oferta;
                    }else{
                        $carrito->total = $producto->precio;
                    }
                }else{
                    $carrito->total = $producto->precio;
                }
                $carrito->save();
                //atach producto id y cantidad
                $carrito->productos()->attach($producto->id, ['cantidad_carrito' => $request->cantidad]);
                return redirect()->back();
            }

        }else{
            $carrito = Session::get('carrito');
            $contador = count($carrito);
            $imagenes = $producto->imagenes = explode('|', $producto->imagenes);
            $imagenes = $producto->imagenes[0];
            $nombre = $producto->nombre_producto;
            if($oferta!=null){
                if($producto->oferta->estado_oferta == 1){
                    $precio = $producto->oferta->precio_oferta;
                }else{
                    $precio = $producto->precio;
                }
            }else{
                $precio = $producto->precio;
            }

            if($contador==0){
                $carrito = [
                    'nombre_producto'  => $nombre,
                    'precio' => $precio,
                    'imagenes' => $imagenes,
                    'producto_id' => $producto->id,
                    'cantidad_carrito' => $request->cantidad
                ];
                Session::push('carrito',$carrito);
            }else{
                $contador = count($carrito);
                for($i = 0; $i < $contador; $i++){
                    if($carrito[$i]['producto_id'] == $request->producto){
                        $cantidad = $carrito[$i]['cantidad_carrito'];
                        $carrito[$i]['cantidad_carrito'] = $cantidad + $request->cantidad;
                        Session::put('carrito',$carrito);
                        break;
                    }elseif($i == $contador-1){
                        $carrito[] = [
                            'nombre_producto'  => $nombre,
                            'precio' => $precio,
                            'imagenes' => $imagenes,
                            'producto_id' => $producto->id,
                            'cantidad_carrito' => $request->cantidad
                        ];
                        Session::put('carrito',$carrito);
                    }
                }
            }

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'hola';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
