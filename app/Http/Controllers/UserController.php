<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMetadata;
//auth
use Illuminate\Support\Facades\Auth;
//comuna
use App\Models\Comuna;
use App\Models\Region;
use App\Models\OrdenCompra;
//validator
use Illuminate\Support\Facades\Validator;
//sweetalert
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decrypt($id);
        $user = User::findOrFail($id);
        $user_meta = UserMetadata::findOrFail($id);
        $autenticado = Auth::user();
        $autenticado_meta = UserMetadata::findOrFail($autenticado->id);
        $comuna = Comuna::findOrFail($user_meta->comuna_id);
        $region_user = Region::findOrFail($comuna->region_id);
        $ordenes = OrdenCompra::where('user_id', $user->id)->where('estado', 1)->paginate(5);

        
        if($autenticado_meta->rol_id == 2){
            if($autenticado->id == $user->id){
                return view('usuario.show', compact('user', 'user_meta', 'region_user', 'ordenes'));
            }
        }else{
            return view('usuario.show', compact('user', 'user_meta', 'region_user', 'ordenes'));
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

        $usuario = User::findOrFail($id);
        $usuario_meta = UserMetadata::where('user_id', $id)->first();

        $reglas = array(
            'nombre' => 'required|alpha|min:3|max:15|',
            'direccion' => 'required|min:7|max:100',
            'apellido_paterno'=>'required|alpha|min:3|max:15',
            'apellido_materno'=>'required|alpha|min:3|max:15',
            'email' => 'required|email|unique:users,email,'.$id,
            'telefono' => 'required|digits:9|unique:users_metadata,telefono,'.$usuario_meta->id,
        );

        $mensaje = array(
            'required' => 'El campo :attribute es obligatorio',
            'alpha' => 'El campo :attribute debe contener solo letras',
            'min' => 'El campo :attribute debe contener al menos :min caracteres',
            'max' => 'El campo :attribute debe contener como maximo :max caracteres',
            'email' => 'El correo electronico ingresado no es un email valido',
            'unique' => 'El campo :attribute ya esta en uso',            
            'digits' => 'El campo :attribute debe contener :digits digitos',
        );

        $validador = Validator::make($request->all(), $reglas, $mensaje);
        //if validator fails
        if($validador->fails()){
            return redirect()->back()->withErrors($validador)->withInput();
        }

        //check if telefono first digit is not 9
        if($request->telefono[0] != 9){
            Alert::error('Error', 'El numero de telefono debe comenzar con 9');
            return redirect()->back()->withInput();
        }

         //make rquest nombre, apellido_paterno, apellido_materno uppercase and the rest lowercase
         $request->nombre = ucwords(strtolower($request->nombre));
         $request->apellido_paterno = ucwords(strtolower($request->apellido_paterno));
         $request->apellido_materno = ucwords(strtolower($request->apellido_materno));
         $request->direccion = ucwords(strtolower($request->direccion));
 
         //update $user with request nombre, email $user meta with direccion, apellido paterno , apellido materno, direccion, comuna
         $usuario->update([
             'name' => $request->nombre,
             'email' => $request->email,
         ]);
 
         $usuario_meta->update([
             'apellido_paterno' => $request->apellido_paterno,
             'apellido_materno' => $request->apellido_materno,
             'direccion' => $request->direccion,
             'comuna_id' => $request->comuna,
         ]);
 
         Alert::success('Perfil actualizado', 'Perfil actualizado con éxito');
         return redirect()->route('perfil', encrypt($id));
 

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
