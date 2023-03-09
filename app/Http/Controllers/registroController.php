<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMetadata;
use App\Models\Rol;
use App\Models\Comuna;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroMail;



class RegistroController extends Controller
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
        $reglas = array(
            'nombre' => 'required|alpha|min:3|max:15|',
             'direccion' => 'required|min:7|max:100',
             'apellido_paterno'=>'required|alpha|min:3|max:15',
             'apellido_materno'=>'required|alpha|min:3|max:15',
             'email' => 'required|email:rfc,dns|unique:users|max:50',
             'contraseña' => 'required|min:8|confirmed|max:20',
             'telefono' => 'required|digits:9|unique:users_metadata',
             'comuna' => 'required|integer|min:1|max:346'
        );

        $mensaje = array(
            'required' => 'El campo :attribute es obligatorio',
            'alpha' => 'El campo :attribute debe contener solo letras',
            'min' => 'El campo :attribute debe contener al menos :min caracteres',
            'comuna.min' => 'La comuna ingresada no es valida',
            'comuna.max' => 'La comuna ingresada no es valida',
            'comuna.integer' => 'La comuna ingresada no es valida',
            'max' => 'El campo :attribute debe contener como maximo :max caracteres',
            'email' => 'El correo electronico ingresado no es un email valido',
            'unique' => 'El campo :attribute ya existe',
            'confirmed' => 'Las contraseñas no coinciden',
            'digits' => 'El campo :attribute debe contener :digits digitos',
            'integer' => 'Comuna no valida'
        );

        $validador = Validator::make($request->all(), $reglas, $mensaje);

        if($validador->fails()){
            return Redirect::back()
            ->with('message', 'error-registro')
            ->withErrors($validador)
            ->withInput($request->except('contraseña'));
        }
        
        $request->merge([
            'nombre' => ucfirst($request->input('nombre')),
            'apellido_paterno' => ucfirst($request->input('apellido_paterno')),
            'apellido_materno' => ucfirst($request->input('apellido_materno')),
            'direccion' => ucfirst($request->input('direccion'))
        ]);
        
        //try catch request comuna with model comuna
        try{
            $comuna = Comuna::findOrFail($request->input('comuna'));
        }catch(\Exception $e){
            Alert::error('Error', 'Comuna no valida');
            return Redirect::back()
            ->with('message', 'error-registro')
            ->withErrors($validador)
            ->withInput($request->except('contraseña'));
        }


        $user = User::create(
            [
                'name' => $request->input('nombre'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('contraseña')),
                'created_at' => date('Y-m-d H:i:s')
            ]
        );

        $metauser = UserMetadata::create(
            [
                'user_id' => $user->id,
                'apellido_paterno' => $request->input('apellido_paterno'),
                'apellido_materno' => $request->input('apellido_materno'),
                'telefono' => $request->input('telefono'),
                'direccion' => $request->input('direccion'),
                'comuna_id' => $comuna->id,
                'rol_id' => 2
            ]
        );

        Mail::to($user->email)->send(new RegistroMail($user));
         
        Alert::success('Su cuenta ha sido creada de forma exitosa', 'Ingrese a su cuenta para comenzar a comprar');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
