<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMetadata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\Helpers;



class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
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

    public function login(Request $request)
    {   
        
        $reglas = array(
            'correo' => 'required|email:rfc,dns',
            'contraseña' => 'required|min:8'
        );
        

        $validador = Validator::make($request->all(), $reglas);

        if($validador->fails()){
            return Redirect::back()
            ->withErrors($validador)
            ->withInput($request->except('contraseña'))
            ->with('message', 'error-login');
        }

        if(Auth::attempt(['email' => $request->correo, 'password' => $request->contraseña]))
        {   
            $usuario = UserMetadata::where(['user_id' => Auth::id()])->first();
            session(['apellido_paterno' => $usuario->apellido_paterno]);
            session(['apellido_materno' => $usuario->apellido_materno]);
            session(['id' => $usuario->user_id]);
            session(['rol' => $usuario->rol_id]);
            return Redirect::back();

        }else{
            Alert::error('Credenciales Invalidas', 'Revise su correo y contraseña');
            return Redirect::back()->with('message', 'error-login');
        }

        
    }

    public function logout(){
        Auth::logout();
        session()->forget('apellido_paterno');
        session()->forget('apellido_materno');
        session()->forget('id');
        session()->forget('rol');
        return redirect('/');;
    }
}
