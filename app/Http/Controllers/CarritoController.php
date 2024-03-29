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
use App\Models\UserMetadata;
use App\Models\Region;
use App\Models\Comuna;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;


class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

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
        
        $request->merge(['cantidad' => 1]);
        $producto = Producto::find($request->producto);
        if(!$producto){
            Alert::error('Error', 'El producto no existe.');
            return redirect()->route('inicio');
        }
        if(Auth::check())
        {
            $id = Auth::user()->id;
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
                
                $carrito->save();
                return redirect()->back();
            }else{
                $carrito = new Carrito();
                $carrito->user_id = $id;
                $carrito->save();
                $carrito->productos()->attach($producto->id, ['cantidad_carrito' => $request->cantidad]);
                return redirect()->back();
            }

        }else{
            $carrito = Session::get('carrito');
            $contador = count($carrito);
            if($contador==0){
                $carrito = [
                    'producto_id' => $producto->id,
                    'cantidad_carrito' => $request->cantidad,
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
                            'producto_id' => $producto->id,
                            'cantidad_carrito' => $request->cantidad,
                        ];
                        Session::put('carrito',$carrito);
                    }
                }
            }

            // return redirect()->route('filtrados', array('id' => $categoria, 'minimo' => $minimo, 'maximo' => $maximo));
            //return to the previous pagination
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
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $carrito = Carrito::where('user_id',$id_user)->first();
            $carrito = $carrito->productos;
            $usuario = Auth::user();
            $metauser = UserMetadata::where('user_id',$usuario->id)->first();
            $comuna = Comuna::where('id',$metauser->comuna_id)->first();
            $region = Region::where('id',$comuna->region_id)->first();
            return view('carrito.show', compact('usuario', 'metauser', 'comuna', 'region'));
           
        }else{
            return view('carrito.show');
        }
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
        //validate
        // $request->validate([
        //     'cantidad' => 'required|numeric|min:1|max:20',
        // ]);
        $reglas = [
            'cantidad' => 'required|numeric|min:1|max:20',
        ];

        $mensajes = [
            'cantidad.required' => 'La cantidad es requerida',
            'cantidad.numeric' => 'La cantidad debe ser un número',
            'cantidad.min' => 'La cantidad debe ser mayor a 0',
            'cantidad.max' => 'La cantidad debe ser menor a 20',
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

            

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $producto = Producto::find($request->producto_id);
        if(!$producto){
            Alert::error('Error','El producto no existe.');
            return redirect()->route('inicio');
        }

        if(Auth::check()){
            $id_user = Auth::user()->id;
            $carrito = Carrito::where('user_id',$id_user)->first();
            $contador = count($carrito->productos);
            foreach($carrito->productos as $prod){
                if($prod->pivot->producto_id == $producto->id){
                    $carrito->productos()->updateExistingPivot($producto->id, ['cantidad_carrito' => $request->cantidad + $prod->pivot->cantidad_carrito]);
                    break;
                }
                $contador--;
            }

            if($contador == 0){
                $carrito->productos()->attach($producto->id, ['cantidad_carrito' => $request->cantidad]);
            }
            $carrito->save();

            return redirect()->back();
        }else{
            $carrito = Session::get('carrito');
            $contador = count($carrito);
            if($contador==0){
                $carrito = [
                    'producto_id' => $producto->id,
                    'cantidad_carrito' => $request->cantidad,
                ];
                Session::push('carrito',$carrito);
            }else{
                for($i = 0; $i < $contador; $i++){
                    if($carrito[$i]['producto_id'] == $producto->id){
                        $cantidad = $carrito[$i]['cantidad_carrito'];
                        $carrito[$i]['cantidad_carrito'] = $cantidad + $request->cantidad;
                        Session::put('carrito',$carrito);
                        break;
                    }elseif($i == $contador-1){
                        $carrito[] = [
                            'producto_id' => $producto->id,
                            'cantidad_carrito' => $request->cantidad,
                        ];
                        Session::put('carrito',$carrito);
                    }
                }
            }

            return redirect()->back();
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()){
            $carrito = Carrito::where('user_id', Auth::user()->id)->first();
            $carrito->productos()->detach($id);
            return redirect()->back();
        }else{
            
        $carrito = Helpers::reordenarArray($id);
            return redirect()->back();
        }
    }

    public function actualizar(Request $request, $id)
    {   

        $validator = Validator::make($request->all(), [
            'cantidad_oculta.*' => 'numeric|min:1|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Auth::check()){
            $carritos = Carrito::where('user_id',Auth::user()->id)->first();
            $carritos = Carrito::findOrFail($carritos->id);
        }else{
            if(!Session::has('carrito')){
                return redirect()->route('inicio');
            }else{
                $carritos = Session::get('carrito');
            }
        }

        $producto=$request->id_producto;
        $producto = Producto::find($producto);
        if(!$producto){
            Alert::error('Error','El producto no existe.');
            return redirect()->route('inicio');
        }

        $cantidad = $request->cantidad_oculta;
        $precio = $request->precio_oculto;




        

       if(Auth::check()){
            $contador = count($carritos->productos);
            $i = 0;
            foreach($carritos->productos as $carrito){
                if($carrito->pivot->cantidad_carrito != $cantidad[$i]){
                    $carritos->productos()->updateExistingPivot($carrito->id, ['cantidad_carrito' => $cantidad[$i]]);
                }
                $i++;
            }
            $carritos->save();
            return redirect()->back();
        }else{
            $contador = count($carritos);
            $i = 0;
            foreach($carritos as $carrito){
                if($carrito['cantidad_carrito'] != $cantidad[$i]){
                    $carritos[$i]['cantidad_carrito'] = $cantidad[$i];
                }
                $i++;
            }
            Session::put('carrito',$carritos);
            return redirect()->back();
        }
        
        
        return redirect()->back();

    }

    public function miCarrito(){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $carrito = Carrito::where('user_id',$id_user)->first();
            //if carrito is empty return route inicio
            if($carrito->productos->isEmpty()){
                return redirect()->route('inicio');
            }else{
                
                return view('carrito.show');
            }
            
           
        }else{
            if(Session::has('id_carrito')){
                $carrito = Session::get('carrito');
                if(count($carrito) == 0){
                    return redirect()->route('inicio');
                }
            }else{
                return redirect()->route('inicio');
            }
        }
    }


}
