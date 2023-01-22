<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Carrito;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\UserMetadata;
use App\Models\Comuna;
use App\Models\Region;
use RealRashid\SweetAlert\Facades\Alert;


class compraController extends Controller
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
        if(Auth::check()){
            $carrito = Carrito::where('user_id', Auth::user()->id)->get();
            if($carrito->isEmpty()){
                return redirect()->route('home');
            }
            $user = User::findOrFail(Auth::user()->id);
            $user = $user;
            $meta = UserMetadata::where('user_id', $user->id)->first();
            $comuna_user = Comuna::findOrFail($meta->comuna_id);
            $region_user = Region::findOrFail($comuna_user->region_id); 

        }else{
            Alert::html('Debes iniciar sesión para continuar', '<button id="boton-login" class="btn-tienda" href="">Iniciar sesión</button>');
            return redirect()->back();
        }

        
        return view('compra.show', compact('carrito', 'user', 'meta', 'region_user', 'comuna_user'));
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
