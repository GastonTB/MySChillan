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


class registroController extends Controller
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
        //reglas de validacion
        $reglas = array(
            'nombre' => 'required|alpha|min:3|max:35|',
             'direccion' => 'required|min:7|max:100',
             'apellido_paterno'=>'required|alpha|min:3|max:35',
             'apellido_materno'=>'required|alpha|min:3|max:35',
             'email' => 'required|email:rfc,dns|unique:users',
             'contraseña' => 'required|min:8|confirmed',
             'telefono' => 'required|digits:9|unique:users_metadata'
        );

        $validador = Validator::make($request->all(), $reglas);

        if($validador->fails()){
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
                'comuna_id' => $request->input('comuna'),
                'rol_id' => 2
            ]
        );

        // $correo = (new EmailController)->email_enviar($user, $metauser);
         
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
