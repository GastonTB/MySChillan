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
use App\Models\Producto;
use App\Models\Oferta;
use App\Models\OrdenCompra;
use App\Models\Calificacion;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompraMailUsuario;
use App\Mail\EnvioMailUsuario;
use App\Mail\RetiroMailUsuario;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenCompra = OrdenCompra::where('estado', 1)->latest()->paginate(10);
        foreach ($ordenCompra as $orden) {
            // $orden->user = User::find($orden->user_id);
            // //metauser
            // $orden->user->metauser = UserMetadata::find($orden->user->id);
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $orden->user = $user;
            }
        }
        return view('compra.index', compact('ordenCompra'));
    }

    public function filtrar(Request $request)
    {

        $busqueda = $request->busqueda;
        if ($busqueda == null) {
            $busqueda = 'todo';
        }

        $validator = Validator::make($request->all(), [
            'orden' => 'integer|max:2',
            'categoria' => 'integer|max:7|min:1',
        ]);


        if ($validator->fails()) {
            return redirect()->back();
        }


        $categoria = $request->categoria;
        $orden = $request->orden;
        return redirect()->route('filtrarCompras2', array('busqueda' => $busqueda, 'categoria' => $categoria, 'orden' => $orden));
    }

    public function filtrados($busqueda, $categoria, $orden)
    {

        $ordenar = $orden;



        switch ($categoria) {
            case 1:
                $column = 'ordenes_compra.updated_at';
                break;
            case 2:
                $column = 'ordenes_compra.total';
                break;
            case 3:
                $column = 'users.name';
                break;
            case 4:
                $column = 'ordenes_compra.telefono';
                break;
            case 5:
                $column = 'ordenes_compra.correo';
                break;
            case 6:
                $column = 'ordenes_compra.envio';
                break;
            case 7:
                $column = 'ordenes_compra.estado';
                break;
            default:
                $column = 'ordenes_compra.updated_at';
                break;
        }

        switch ($orden) {
            case 1:
                $order = 'desc';
                break;
            case 2:
                $order = 'asc';
                break;
            default:
                $order = 'desc';
                break;
        }

        if ($busqueda == 'todo') {
            $ordenCompra = OrdenCompra::where('estado', 1)
                ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                ->select('ordenes_compra.*')
                ->orderBy($column, $order)
                ->paginate(10);
            foreach ($ordenCompra as $orden) {
                // $orden->user = User::find($orden->user_id);
                // //metauser
                // $orden->user->metauser = UserMetadata::find($orden->user->id);
                $user = User::find($orden->user_id);
                $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
                if ($user && $metadata) {
                    $user->metauser = $metadata;
                    $orden->user = $user;
                }
            }

            return view('compra.index', compact('ordenCompra', 'categoria', 'ordenar'));
        } else {


            $ordenCompra = OrdenCompra::where('estado', 1)
                ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
                ->selectRaw('ordenes_compra.*, CONCAT(users.name, " ", users_metadata.apellido_paterno, " ", users_metadata.apellido_materno) as full_name')
                ->where(function ($query) use ($busqueda) {
                    $query->where('ordenes_compra.id', 'like', '%' . $busqueda . '%')
                        ->orWhere('ordenes_compra.correo', 'like', '%' . $busqueda . '%')
                        ->orWhere('ordenes_compra.total', 'like', '%' . $busqueda . '%')
                        ->orWhere('ordenes_compra.telefono', 'like', '%' . $busqueda . '%')
                        ->orWhere('users.email', 'like', '%' . $busqueda . '%')
                        ->orWhere('users.name', 'like', '%' . $busqueda . '%')
                        ->orWhere('users_metadata.apellido_paterno', 'like', '%' . $busqueda . '%')
                        ->orWhere('users_metadata.apellido_materno', 'like', '%' . $busqueda . '%')
                        ->orWhere('users_metadata.telefono', 'like', '%' . $busqueda . '%');
                })
                ->paginate(10);

            if ($ordenCompra->isEmpty()) {
                // Remover espacios de la cadena de búsqueda
                $busquedaSinEspacios = str_replace(' ', '', $busqueda);

                // Buscar ordenes de compra por nombre completo del usuario
                $ordenCompra = OrdenCompra::where('estado', 1)
                    ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                    ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
                    ->selectRaw('ordenes_compra.*, CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno) as full_name')
                    ->whereRaw('REPLACE(CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno), " ", "") like ?', ['%' . $busquedaSinEspacios . '%'])
                    ->paginate(10);
            }
        }
        foreach ($ordenCompra as $orden) {
            // $orden->user = User::find($orden->user_id);
            // //metauser
            // $orden->user->metauser = UserMetadata::find($orden->user->id);
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $orden->user = $user;
            }
        }

        $search = $busqueda;
        return view('compra.index', compact('ordenCompra', 'categoria', 'ordenar', 'search'));
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->buscar;
        if ($busqueda == null) {
            return redirect()->route('verCompras');
        }
        return redirect()->route('buscarCompras2', ['busqueda' => $busqueda]);
    }


    public function buscados($busqueda)
    {
        $ordenCompra = OrdenCompra::where('estado', 1)
            ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
            ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
            ->selectRaw('ordenes_compra.*, CONCAT(users.name, " ", users_metadata.apellido_paterno, " ", users_metadata.apellido_materno) as full_name')
            ->where(function ($query) use ($busqueda) {
                $query->where('ordenes_compra.id', 'like', '%' . $busqueda . '%')
                    ->orWhere('ordenes_compra.correo', 'like', '%' . $busqueda . '%')
                    ->orWhere('ordenes_compra.total', 'like', '%' . $busqueda . '%')
                    ->orWhere('ordenes_compra.telefono', 'like', '%' . $busqueda . '%')
                    ->orWhere('users.email', 'like', '%' . $busqueda . '%')
                    ->orWhere('users.name', 'like', '%' . $busqueda . '%')
                    ->orWhere('users_metadata.apellido_paterno', 'like', '%' . $busqueda . '%')
                    ->orWhere('users_metadata.apellido_materno', 'like', '%' . $busqueda . '%')
                    ->orWhere('users_metadata.telefono', 'like', '%' . $busqueda . '%');
            })
            ->paginate(10);

        if ($ordenCompra->isEmpty()) {
            $busquedaSinEspacios = str_replace(' ', '', $busqueda);

            $ordenCompra = OrdenCompra::where('estado', 1)
                ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
                ->selectRaw('ordenes_compra.*, CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno) as full_name')
                ->whereRaw('REPLACE(CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno), " ", "") like ?', ['%' . $busquedaSinEspacios . '%'])
                ->paginate(10);
        }

        foreach ($ordenCompra as $orden) {
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $orden->user = $user;
            }
        }

        $search = $busqueda;

        return view('compra.index', compact('ordenCompra', 'search'));
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
        if (Auth::check()) {
            $carrito = Carrito::where('user_id', Auth::user()->id)->get();
            if ($carrito->isEmpty()) {
                return redirect()->route('home');
            }
            $user = User::findOrFail(Auth::user()->id);
            $user = $user;
            $meta = UserMetadata::where('user_id', $user->id)->first();
            $comuna_user = Comuna::findOrFail($meta->comuna_id);
            $region_user = Region::findOrFail($comuna_user->region_id);
        } else {
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

    public function detalle($id)
    {
        // $ordenCompra = OrdenCompra::where('id', $id)->where('estado',1)->first();
        $ordenCompra = OrdenCompra::where('id', $id)
            ->where('estado', 1)
            ->with(['productos' => function ($query) {
                $query->withTrashed();
            }])
            ->first();


        //trycatch
        if ($ordenCompra == null) {
            Alert::error('Error', 'No se encontró la orden de compra');
            return redirect()->route('inicio');
        }

        $usuario = $ordenCompra->user;
        //trycatch
        if ($usuario == null) {
            Alert::error('Error', 'No se encontró el usuario');
            return redirect()->route('inicio');
        }
        $meta = $usuario->userMetadata;
        //trycatch
        if ($meta == null) {
            Alert::error('Error', 'No se encontró la metadata del usuario');
            return redirect()->route('inicio');
        }
        $comuna = $meta->comuna;
        //trycatch
        if ($comuna == null) {
            Alert::error('Error', 'No se encontró la comuna del usuario');
            return redirect()->route('inicio');
        }
        $region = $comuna->region;
        //trycatch
        if ($region == null) {
            Alert::error('Error', 'No se encontró la región del usuario');
            return redirect()->route('inicio');
        }
        $productos = $ordenCompra->productos;
        //trycatch
        if ($productos == null) {
            Alert::error('Error', 'No se encontró los productos de la orden de compra');
            return redirect()->route('inicio');
        }


        return view('compra.detalle', compact('ordenCompra', 'usuario', 'meta', 'comuna', 'region', 'productos'));
    }

    public function cambiarEstado(Request $request, $id)
    {
        $ordenCompra = OrdenCompra::where('id', $id)->where('estado', 1)->first();

        if ($ordenCompra->estado_retiro == 1) {
            Alert::error('Error', 'El producto ya se Retiró/Envió');
            return redirect()->route('backoffice');
        }

        //trycatch
        if ($ordenCompra == null) {
            Alert::error('Error', 'No se encontró la orden de compra');
            return redirect()->route('backoffice');
        }
        if ($ordenCompra->envio == 2 && $ordenCompra->estado_retiro == 0) {
            $validator = Validator::make($request->all(), [
                'codigo_oculto' => ['required', 'numeric', 'digits:9'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }



            $codigoOculto = $request->codigo_oculto;
            $ordenCompra->codigo_seguimiento = $codigoOculto;
            $ordenCompra->estado_retiro = 1;
            $ordenCompra->save();

            $productos = $ordenCompra->productos;
            $user = User::find($ordenCompra->user_id);
            if (!$user) {
                Alert::error('Error', 'No se encontró al usuario que realizo la compra');
                return redirect()->back();
            }
            $meta = UserMetadata::where('user_id', $user->id)->first();
            if (!$meta) {
                Alert::error('Error', 'No se encontró al usuario que realizo la compra');
                return redirect()->back();
            }
            $total = $ordenCompra->total;
            $comuna = Comuna::findOrFail($ordenCompra->comuna_id);
            $region = Region::findOrFail($comuna->region_id);
            // $codigo = $ordenCompra->codigo_seguimiento;
            $codigo = number_format($ordenCompra->codigo_seguimiento, 0, '.', '.');
            $id_compra = $ordenCompra->id;
            $correo = $ordenCompra->correo;
            $telefono = $ordenCompra->telefono;
            try {
                Mail::to($ordenCompra->correo)->send(new EnvioMailUsuario($ordenCompra, $user, $productos, $total, $meta, $comuna, $region, $id_compra, $codigo, $correo, $telefono));
            } catch (\Exception $e) {
                Alert::error('Error', 'Ponerse en contacto con este cliente, su correo no existe');
                return redirect()->route('compra', $ordenCompra->id);
            }
            Alert::success('Éxito', 'Se ha Enviado esta Compra');
            return redirect()->route('compra', $ordenCompra->id);
        } else {
            if ($ordenCompra->estado_retiro == 0) {
                $ordenCompra->estado_retiro = 1;

                $ordenCompra->save();
                $productos = $ordenCompra->productos;
                $user = User::find($ordenCompra->user_id);
                if (!$user) {
                    Alert::error('Error', 'No se encontró al usuario que realizo la compra');
                    return redirect()->back();
                }
                $meta = UserMetadata::where('user_id', $user->id)->first();
                if (!$meta) {
                    Alert::error('Error', 'No se encontró al usuario que realizo la compra');
                    return redirect()->back();
                }
                $total = $ordenCompra->total;
                $id_compra = $ordenCompra->id;

                $comuna = Comuna::findOrFail($ordenCompra->comuna_id);
                $region = Region::findOrFail($comuna->region_id);
                $correo = $ordenCompra->correo;
                $telefono = $ordenCompra->telefono;
                try {
                    Mail::to($ordenCompra->correo)->send(new RetiroMailUsuario($ordenCompra, $user, $productos, $total, $meta,  $id_compra, $correo, $telefono));
                } catch (\Exception $e) {

                    Alert::error('Error', 'Ponerse en contacto con este cliente, su correo no existe');
                    return redirect()->route('compra', $ordenCompra->id);
                }
            } else {
                $ordenCompra->estado_retiro = 0;
                $ordenCompra->save();
                Alert::success('Éxito', 'Se ha Cancelado el Envío/Retiro de esta Compra');
            }
        }
        
        return redirect()->route('compra', $ordenCompra->id);
    }

    public function retiro()
    {
        $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 1)->latest()->paginate(10);
        foreach ($ordenCompra as $orden) {
            // $orden->user = User::find($orden->user_id);
            // //metauser
            // $orden->user->metauser = UserMetadata::find($orden->user->id);
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $orden->user = $user;
            }
        }
        return view('compra.retiro', compact('ordenCompra'));
    }


    public function buscarRetiro(Request $request)
    {
        $busqueda = $request->buscar;
        return redirect()->route('buscarComprasRetiro2', ['busqueda' => $busqueda]);
    }


    public function buscadosRetiro($busqueda)
    {

        $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 1)
            ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
            ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
            ->selectRaw('ordenes_compra.*, CONCAT(users.name, " ", users_metadata.apellido_paterno, " ", users_metadata.apellido_materno) as full_name')
            ->where(function ($query) use ($busqueda) {
                $query->where('ordenes_compra.id', 'like', '%' . $busqueda . '%')
                    ->orWhere('ordenes_compra.correo', 'like', '%' . $busqueda . '%')
                    ->orWhere('ordenes_compra.total', 'like', '%' . $busqueda . '%')
                    ->orWhere('ordenes_compra.telefono', 'like', '%' . $busqueda . '%')
                    ->orWhere('users.email', 'like', '%' . $busqueda . '%')
                    ->orWhere('users.name', 'like', '%' . $busqueda . '%')
                    ->orWhere('users_metadata.apellido_paterno', 'like', '%' . $busqueda . '%')
                    ->orWhere('users_metadata.apellido_materno', 'like', '%' . $busqueda . '%')
                    ->orWhere('users_metadata.telefono', 'like', '%' . $busqueda . '%');
            })
            ->paginate(10);

        if ($ordenCompra->isEmpty()) {
            // Remover espacios de la cadena de búsqueda
            $busquedaSinEspacios = str_replace(' ', '', $busqueda);

            // Buscar ordenes de compra por nombre completo del usuario
            $ordenCompra = OrdenCompra::where('estado', 1)
                ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
                ->selectRaw('ordenes_compra.*, CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno) as full_name')
                ->whereRaw('REPLACE(CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno), " ", "") like ?', ['%' . $busquedaSinEspacios . '%'])
                ->paginate(10);
        }

        foreach ($ordenCompra as $orden) {
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $orden->user = $user;
            }
        }
        $search = $busqueda;

        return view('compra.retiro', compact('ordenCompra', 'search'));
    }


    public function filtrarRetiro(Request $request)
    {
        $busqueda = $request->busqueda;
        if ($busqueda == null) {
            $busqueda = 'todo';
        }
        $categoria = $request->categoria;
        $orden = $request->orden;
        return redirect()->route('filtrarComprasRetiro2', array('busqueda' => $busqueda, 'categoria' => $categoria, 'orden' => $orden));
    }

    public function filtradosRetiro($busqueda, $categoria, $orden)
    {
        $ordenar = $orden;



        switch ($categoria) {
            case 1:
                $column = 'ordenes_compra.updated_at';
                break;
            case 2:
                $column = 'ordenes_compra.total';
                break;
            case 3:
                $column = 'users.name';
                break;
            case 4:
                $column = 'ordenes_compra.telefono';
                break;
            case 5:
                $column = 'ordenes_compra.correo';
                break;
            case 6:
                $column = 'ordenes_compra.estado';
                break;
            default:
                $column = 'ordenes_compra.updated_at';
                break;
        }

        switch ($orden) {
            case 1:
                $order = 'desc';
                break;
            case 2:
                $order = 'asc';
                break;
            default:
                $order = 'desc';
                break;
        }

        if ($busqueda == 'todo') {
            $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 1)
                ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                ->select('ordenes_compra.*')
                ->orderBy($column, $order)
                ->paginate(10);
            foreach ($ordenCompra as $orden) {
                // $orden->user = User::find($orden->user_id);
                // //metauser
                // $orden->user->metauser = UserMetadata::find($orden->user->id);
                $user = User::find($orden->user_id);
                $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
                if ($user && $metadata) {
                    $user->metauser = $metadata;
                    $orden->user = $user;
                }
            }

            return view('compra.retiro', compact('ordenCompra', 'categoria', 'ordenar'));
        } else {


            $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 1)
                ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
                ->selectRaw('ordenes_compra.*, CONCAT(users.name, " ", users_metadata.apellido_paterno, " ", users_metadata.apellido_materno) as full_name')
                ->where(function ($query) use ($busqueda) {
                    $query->where('ordenes_compra.id', 'like', '%' . $busqueda . '%')
                        ->orWhere('ordenes_compra.correo', 'like', '%' . $busqueda . '%')
                        ->orWhere('ordenes_compra.total', 'like', '%' . $busqueda . '%')
                        ->orWhere('ordenes_compra.telefono', 'like', '%' . $busqueda . '%')
                        ->orWhere('users.email', 'like', '%' . $busqueda . '%')
                        ->orWhere('users.name', 'like', '%' . $busqueda . '%')
                        ->orWhere('users_metadata.apellido_paterno', 'like', '%' . $busqueda . '%')
                        ->orWhere('users_metadata.apellido_materno', 'like', '%' . $busqueda . '%')
                        ->orWhere('users_metadata.telefono', 'like', '%' . $busqueda . '%');
                })
                ->paginate(10);

            if ($ordenCompra->isEmpty()) {
                // Remover espacios de la cadena de búsqueda
                $busquedaSinEspacios = str_replace(' ', '', $busqueda);

                // Buscar ordenes de compra por nombre completo del usuario
                $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 1)
                    ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                    ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
                    ->selectRaw('ordenes_compra.*, CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno) as full_name')
                    ->whereRaw('REPLACE(CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno), " ", "") like ?', ['%' . $busquedaSinEspacios . '%'])
                    ->paginate(10);
            }
        }
        foreach ($ordenCompra as $orden) {
            // $orden->user = User::find($orden->user_id);
            // //metauser
            // $orden->user->metauser = UserMetadata::find($orden->user->id);
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $orden->user = $user;
            }
        }

        $search = $busqueda;
        return view('compra.retiro', compact('ordenCompra', 'categoria', 'ordenar', 'search'));
    }

    public function envio()
    {
        $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 2)->latest()->paginate(10);
        foreach ($ordenCompra as $orden) {
            // $orden->user = User::find($orden->user_id);
            // //metauser
            // $orden->user->metauser = UserMetadata::find($orden->user->id);
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $orden->user = $user;
            }
        }
        return view('compra.envio', compact('ordenCompra'));
    }


    public function buscarEnvio(Request $request)
    {
        $busqueda = $request->buscar;
        return redirect()->route('buscarComprasEnvio2', ['busqueda' => $busqueda]);
    }


    public function buscadosEnvio($busqueda)
    {

        $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 2)
            ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
            ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
            ->selectRaw('ordenes_compra.*, CONCAT(users.name, " ", users_metadata.apellido_paterno, " ", users_metadata.apellido_materno) as full_name')
            ->where(function ($query) use ($busqueda) {
                $query->where('ordenes_compra.id', 'like', '%' . $busqueda . '%')
                    ->orWhere('ordenes_compra.correo', 'like', '%' . $busqueda . '%')
                    ->orWhere('ordenes_compra.total', 'like', '%' . $busqueda . '%')
                    ->orWhere('ordenes_compra.telefono', 'like', '%' . $busqueda . '%')
                    ->orWhere('users.email', 'like', '%' . $busqueda . '%')
                    ->orWhere('users.name', 'like', '%' . $busqueda . '%')
                    ->orWhere('users_metadata.apellido_paterno', 'like', '%' . $busqueda . '%')
                    ->orWhere('users_metadata.apellido_materno', 'like', '%' . $busqueda . '%')
                    ->orWhere('users_metadata.telefono', 'like', '%' . $busqueda . '%');
            })
            ->paginate(10);

        if ($ordenCompra->isEmpty()) {
            // Remover espacios de la cadena de búsqueda
            $busquedaSinEspacios = str_replace(' ', '', $busqueda);

            // Buscar ordenes de compra por nombre completo del usuario
            $ordenCompra = OrdenCompra::where('estado', 1)
                ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
                ->selectRaw('ordenes_compra.*, CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno) as full_name')
                ->whereRaw('REPLACE(CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno), " ", "") like ?', ['%' . $busquedaSinEspacios . '%'])
                ->paginate(10);
        }

        foreach ($ordenCompra as $orden) {
            // $orden->user = User::find($orden->user_id);
            // //metauser
            // $orden->user->metauser = UserMetadata::find($orden->user->id);
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $orden->user = $user;
            }
        }
        $search = $busqueda;

        return view('compra.envio', compact('ordenCompra', 'search'));
    }


    public function filtrarEnvio(Request $request)
    {
        $busqueda = $request->busqueda;
        if ($busqueda == null) {
            $busqueda = 'todo';
        }
        $categoria = $request->categoria;
        $orden = $request->orden;
        return redirect()->route('filtrarComprasEnvio2', array('busqueda' => $busqueda, 'categoria' => $categoria, 'orden' => $orden));
    }

    public function filtradosEnvio($busqueda, $categoria, $orden)
    {
        $ordenar = $orden;



        switch ($categoria) {
            case 1:
                $column = 'ordenes_compra.updated_at';
                break;
            case 2:
                $column = 'ordenes_compra.total';
                break;
            case 3:
                $column = 'users.name';
                break;
            case 4:
                $column = 'ordenes_compra.telefono';
                break;
            case 5:
                $column = 'ordenes_compra.correo';
                break;
            case 6:
                $column = 'ordenes_compra.estado';
                break;
            default:
                $column = 'ordenes_compra.updated_at';
                break;
        }

        switch ($orden) {
            case 1:
                $order = 'desc';
                break;
            case 2:
                $order = 'asc';
                break;
            default:
                $order = 'desc';
                break;
        }

        if ($busqueda == 'todo') {
            $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 2)
                ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                ->select('ordenes_compra.*')
                ->orderBy($column, $order)
                ->paginate(10);
            foreach ($ordenCompra as $orden) {
                // $orden->user = User::find($orden->user_id);
                // //metauser
                // $orden->user->metauser = UserMetadata::find($orden->user->id);
                $user = User::find($orden->user_id);
                $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
                if ($user && $metadata) {
                    $user->metauser = $metadata;
                    $orden->user = $user;
                }
            }

            return view('compra.envio', compact('ordenCompra', 'categoria', 'ordenar'));
        } else {


            $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 2)
                ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
                ->selectRaw('ordenes_compra.*, CONCAT(users.name, " ", users_metadata.apellido_paterno, " ", users_metadata.apellido_materno) as full_name')
                ->where(function ($query) use ($busqueda) {
                    $query->where('ordenes_compra.id', 'like', '%' . $busqueda . '%')
                        ->orWhere('ordenes_compra.correo', 'like', '%' . $busqueda . '%')
                        ->orWhere('ordenes_compra.total', 'like', '%' . $busqueda . '%')
                        ->orWhere('ordenes_compra.telefono', 'like', '%' . $busqueda . '%')
                        ->orWhere('users.email', 'like', '%' . $busqueda . '%')
                        ->orWhere('users.name', 'like', '%' . $busqueda . '%')
                        ->orWhere('users_metadata.apellido_paterno', 'like', '%' . $busqueda . '%')
                        ->orWhere('users_metadata.apellido_materno', 'like', '%' . $busqueda . '%')
                        ->orWhere('users_metadata.telefono', 'like', '%' . $busqueda . '%');
                })
                ->paginate(10);

            if ($ordenCompra->isEmpty()) {
                // Remover espacios de la cadena de búsqueda
                $busquedaSinEspacios = str_replace(' ', '', $busqueda);

                // Buscar ordenes de compra por nombre completo del usuario
                $ordenCompra = OrdenCompra::where('estado', 1)->where('envio', 2)
                    ->join('users', 'users.id', '=', 'ordenes_compra.user_id')
                    ->leftJoin('users_metadata', 'users_metadata.user_id', '=', 'users.id')
                    ->selectRaw('ordenes_compra.*, CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno) as full_name')
                    ->whereRaw('REPLACE(CONCAT(users.name, users_metadata.apellido_paterno, users_metadata.apellido_materno), " ", "") like ?', ['%' . $busquedaSinEspacios . '%'])
                    ->paginate(10);
            }
        }
        foreach ($ordenCompra as $orden) {
            // $orden->user = User::find($orden->user_id);
            // //metauser
            // $orden->user->metauser = UserMetadata::find($orden->user->id);
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $orden->user = $user;
            }
        }

        $search = $busqueda;
        return view('compra.envio', compact('ordenCompra', 'categoria', 'ordenar', 'search'));
    }

    public function evaluarMostrar($id)
    {

        // $ordenCompra = OrdenCompra::where('id', $id)->where('estado',1)->first();
        // $ordenCompra = OrdenCompra::where('id', $id)
        //     ->where('estado', 1)
        //     ->with(['productos' => function ($query) {
        //         $query->withTrashed();
        //     }])
        //     ->first();


        $ordenCompra = OrdenCompra::where('id', $id)
            ->where('estado', 1)
            ->with(['productos' => function ($query) {
                $query->withTrashed()
                    ->with(['calificaciones' => function ($query) {
                        $query->select('id', 'producto_id', 'puntuacion');
                    }]);
            }])
            ->first();

        if ($ordenCompra == null) {
            Alert::error('Error', 'No se encontró la orden de compra');
            return redirect()->route('inicio');
        }
        //trycatch


        $usuario = $ordenCompra->user;
        //trycatch
        if ($usuario == null) {
            Alert::error('Error', 'No se encontró el usuario');
            return redirect()->route('inicio');
        }
        $meta = $usuario->userMetadata;
        //trycatch
        if ($meta == null) {
            Alert::error('Error', 'No se encontró la metadata del usuario');
            return redirect()->route('inicio');
        }
        $comuna = $meta->comuna;
        //trycatch
        if ($comuna == null) {
            Alert::error('Error', 'No se encontró la comuna del usuario');
            return redirect()->route('inicio');
        }
        $region = $comuna->region;
        //trycatch
        if ($region == null) {
            Alert::error('Error', 'No se encontró la región del usuario');
            return redirect()->route('inicio');
        }
        $productos = $ordenCompra->productos;

        foreach ($productos as $producto) {
            $producto->calificacion = Calificacion::where('orden_compra_id', $ordenCompra->id)->where('producto_id', $producto->id)->first();
        }


        //trycatch
        if ($productos == null) {
            Alert::error('Error', 'No se encontró los productos de la orden de compra');
            return redirect()->route('inicio');
        }


        return view('usuario.evaluar', compact('ordenCompra', 'usuario', 'meta', 'comuna', 'region', 'productos'));
    }

    // public function evaluar(Request $request, $id)
    // {

    //     $ordenCompra = OrdenCompra::find($id);
    //     if ($ordenCompra == null) {
    //         Alert::error('Error', 'No se encontró la orden de compra');
    //         return redirect()->route('inicio');
    //     }

    //     // return $ordenCompra;
    //     // Obtener todos los datos del formulario, excepto el token
    //     $datos = $request->except('_token');
    //     $productos = $ordenCompra->productos;

    //     foreach ($datos as $key => $value) {
    //         $productoEncontrado = false;
    //         foreach ($productos as $producto) {
    //             if ($producto->id == $key) {
    //                 $productoEncontrado = true;

    //                 // Crear la calificación
    //                 $calificacion = new Calificacion;
    //                 $calificacion->user_id = Auth::user()->id;
    //                 $calificacion->producto_id = $producto->id;
    //                 $calificacion->puntuacion = $value;
    //                 $calificacion->orden_compra_id = $ordenCompra->id;
    //                 $calificacion->save();

    //                 break;
    //             }
    //         }

    //         if (!$productoEncontrado) {
    //             Alert::error('Error', 'No se encontró el producto con ID ' . $key . ' en la orden de compra.');
    //             return redirect()->back();
    //         }
    //     }
    //     Alert::success('Gracias', 'Se han calificado correctamente los productos');
    //     return redirect()->back();
    // }

    public function evaluar(Request $request, $id)
    {

        $ordenCompra = OrdenCompra::find($id);
        if ($ordenCompra == null) {
            Alert::error('Error', 'No se encontró la orden de compra');
            return redirect()->route('inicio');
        }

        $calificaciones = Calificacion::where('orden_compra_id', $ordenCompra->id)->get();


        if ($calificaciones->count() == $ordenCompra->productos->count()) {
            Alert::info('Calificación completada', 'Ya has calificado todos los productos de esta orden de compra');
            return redirect()->back();
        }
        $datos = $request->except('_token');
        $productos = $ordenCompra->productos;

        foreach ($productos as $producto) {
            $nombre_campo = 'producto_' . $producto->id;
            $reglas[$nombre_campo] = ['required', 'integer', 'min:1', 'max:5'];
        }
        $errores = [];

        for ($i = 0; $i < $productos->count(); $i++) {
            if ($datos[$productos[$i]['id']] == 0) {
                $errores = $datos;
            }
        }
        if (count($errores) > 0) {
            Alert::error('Error', 'No se puede calificar con nota 0');
            return redirect()->back();
        }



        // Verificar la existencia de todos los productos
        foreach ($datos as $key => $value) {
            $productoEncontrado = false;
            foreach ($productos as $producto) {
                if ($producto->id == $key) {
                    $productoEncontrado = true;
                    break;
                }
            }

            if (!$productoEncontrado) {
                Alert::error('Error', 'No se encontró el producto con ID ' . $key . ' en la orden de compra.');
                return redirect()->back();
            }
        }

        // Guardar las calificaciones
        foreach ($datos as $key => $value) {
            foreach ($productos as $producto) {
                if ($producto->id == $key) {
                    $calificacion = new Calificacion;
                    $calificacion->user_id = Auth::user()->id;
                    $calificacion->producto_id = $producto->id;
                    $calificacion->puntuacion = $value;
                    $calificacion->orden_compra_id = $ordenCompra->id;
                    $calificacion->save();
                    break;
                }
            }
        }

        Alert::success('Gracias', 'Se han calificado correctamente los productos');
        return redirect()->back();
    }


    public function PDF($id)
    {
        $ordenCompra = OrdenCompra::where('id', $id)
            ->where('estado', 1)
            ->with(['productos' => function ($query) {
                $query->withTrashed();
            }])
            ->first();

        //trycatch
        if ($ordenCompra == null) {
            Alert::error('Error', 'No se encontró la orden de compra');
            return redirect()->route('inicio');
        }

        $usuario = $ordenCompra->user;
        //trycatch
        if ($usuario == null) {
            Alert::error('Error', 'No se encontró el usuario');
            return redirect()->route('inicio');
        }
        $meta = $usuario->userMetadata;
        //trycatch
        if ($meta == null) {
            Alert::error('Error', 'No se encontró la metadata del usuario');
            return redirect()->route('inicio');
        }
        $comuna = $meta->comuna;
        //trycatch
        if ($comuna == null) {
            Alert::error('Error', 'No se encontró la comuna del usuario');
            return redirect()->route('inicio');
        }
        $region = $comuna->region;
        //trycatch
        if ($region == null) {
            Alert::error('Error', 'No se encontró la región del usuario');
            return redirect()->route('inicio');
        }
        $productos = $ordenCompra->productos;
        //trycatch
        if ($productos == null) {
            Alert::error('Error', 'No se encontró los productos de la orden de compra');
            return redirect()->route('inicio');
        }

        // Convierte la imagen a base64
        $path_to_image = base_path('public/img/logos/logo.png');
        $image_data = file_get_contents($path_to_image);
        $base64_image = base64_encode($image_data);


        // Genera el HTML a partir de la vista de Blade
        $html = view('compra.pdf.detalle', compact('ordenCompra', 'usuario', 'meta', 'comuna', 'region', 'productos', 'base64_image'))->render();

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Carga el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Opcional: Configura las opciones de Dompdf, como tamaño de papel, orientación, etc.
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el PDF
        $dompdf->render();

        // Descarga el PDF en el navegador del usuario
        $dompdf->stream('detalle_orden_compra.pdf');
    }
}
