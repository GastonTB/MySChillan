@extends('layaouts.master')

@section('modales')
    <div>
        <div id="cambiar-contraseña-modal" class="hidden">
            <div id="overlay-modal-cambiar-contraseña" class="z-40 fixed h-screen w-screen bg-black opacity-40"></div>
            <div class="flex justify-center">
                <div
                    class="top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 w-4/5 md:w-5/10 lg:w-2/10 bg-white fixed rounded-md">
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl mb-10 mt-5 text-center">Ingresar Codigo de Seguimiento</div>
                        <div class="mb-10">
                            <div>
                                <label class="relative">
                                    <input id="codigo" name="codigo" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                    <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                        Código de Seguimiento
                                    </span>
                                </label>
                            </div>
                            <small class="mt-1">
                                <p class="text-gray-400">Ingrese el código sin puntos</p>
                            </small>
                            
                            <span class="xl:text-sm md:text-md" style="color:red"><small>
                                @error('codigo_oculto')
                                    {{ $message }}
                                @enderror
                            </small></span>
                        </div>

                        <div class="flex justify-center space-x-10 mb-5">
                            <button id="aceptar"
                                class="bg-lime-500 hover:bg-lime-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Guardar
                            </button>
                            <button id="cancelar"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="button">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if(session()->get('rol') == 1)
    <div class="md:grid md:grid-cols-14 lg:grid-cols-4 mt-10 text-gray-700 px-1">
        <div class="lg:col-start-2 md:col-start-2 md:col-span-12 lg:col-span-2 px-5 flex space-x-1">
           <a class="text-lime-500" href="{{ route('backoffice') }}">Back Office</a> <p>/</p> <a class="text-lime-500" href="{{ route('compra', $ordenCompra->id) }}">Detalles Compra</a>
        </div>
    </div>
    @endif
    <div class="md:grid md:grid-cols-14 lg:grid-cols-4 mt-10 text-gray-700 px-1">
        <div class="lg:col-start-2 md:col-start-2 md:col-span-12 lg:col-span-2 px-5">
            <div class="md:grid grid-cols-2 bg-gray-100 mb-10 p-5 rounded-md">
                <div class="flex justify-center col-span-2 mb-10">
                    <p class="text-2xl font-bold flex justify-center">
                        Detalles de la Compra N° {{ $ordenCompra->id }}
                    </p>
                </div>
                <div>
                    <div class="flex justify-center mb-5">
                        <p class="text-lg font-semibold">
                            Datos del Cliente
                        </p>
                    </div>
                    <div class="flex justify-center pl-5">
                        <ul class="list-disc space-y-2">
                            <li class="break-all ">
                                <div class="flex space-x-1">
                                    <p class="font-semibold">
                                        Nombre:
                                    </p>
                                    <p>
                                    <p class="flex">
                                        @if (strlen($usuario->name) + strlen($meta->apellido_paterno) + strlen($meta->apellido_materno) > 30)
                                            {{ substr($usuario->name, 0, 10) }} {{ substr($meta->apellido_paterno, 0, 10) }}
                                            {{ substr($meta->apellido_materno, 0, 10) }}
                                        @else
                                            {{ $usuario->name }} {{ $meta->apellido_paterno }} {{ $meta->apellido_materno }}
                                        @endif
                                    </p>


                                </div>
                            </li>
                            <li>
                                <div class="flex space-x-1">
                                    <p class="font-semibold">
                                        Email:
                                    </p>
                                    <p>
                                    <p class="flex break-all">
                                        {{ $ordenCompra->correo }}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="flex space-x-1">
                                    <p class="font-semibold">
                                        Teléfono:
                                    </p>
                                    <p>
                                    <p class="flex break-all">
                                        {{ $ordenCompra->telefono }}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="flex space-x-1">
                                    <p class="font-semibold">
                                        Región:
                                    </p>
                                    <p>
                                    <p class="flex break-all">
                                        {{ $region->nombre_region }}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="flex space-x-1">
                                    <p class="font-semibold">
                                        Comuna:
                                    </p>
                                    <p>
                                    <p class="flex break-all">
                                        {{ $comuna->nombre_comuna }}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="flex space-x-1">
                                    <p class="font-semibold">
                                        Dirección:
                                    </p>
                                    <p>
                                    <p class="flex break-all">
                                        @if (strlen($ordenCompra->direccion) > 25)
                                            @foreach (str_split($ordenCompra->direccion, 25) as $parte)
                                                {{ $parte }}<br>
                                            @endforeach
                                        @else
                                            {{ $ordenCompra->direccion }}
                                        @endif
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div>
                    <div class="flex justify-center mb-5 mt-10 md:mt-0">
                        <p class="text-lg font-semibold">
                            Datos de la Compra
                        </p>
                    </div>
                    <div class="flex justify-center px-5">
                        <div>
                            <ul class="space-y-2 list-disc">
                                <li>
                                    <div class="flex space-x-1">
                                        <p class="font-semibold">
                                            Fecha de Compra:
                                        </p>
                                        <p>
                                        <p class="flex">
                                            {{ date('d-m-Y', strtotime($ordenCompra->created_at)) }}
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex space-x-1">
                                        <p class="font-semibold">
                                            Tipo de Envío:
                                        </p>
                                        <p>
                                            @if ($ordenCompra->envio == 1)
                                                Retiro en Tienda
                                            @else
                                                Envío a Domicilio
                                            @endif
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <p class="font-semibold">
                                        @if ($ordenCompra->envio == 1)
                                            Retirado:
                                            @if ($ordenCompra->estado_retiro == 0)
                                                No
                                            @else
                                                Si
                                            @endif
                                        @else
                                            Enviado:
                                            @if ($ordenCompra->estado_envio == 0)
                                                No
                                            @else
                                                Si
                                            @endif
                                        @endif
                                    </p>
                                </li>
                                <li>
                                    <div class="flex space-x-1">
                                        <p class="font-semibold">
                                            Total de Compra:
                                        </p>
                                        <p>
                                            {{-- numberformat --}}
                                            ${{ number_format($ordenCompra->total, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="grid grid-cols-2 mt-5">
                                <div>
                                    <p class="font-semibold">
                                        Productos
                                    </p>
                                    <div class="mt-2">
                                        @foreach ($productos as $producto)
                                            <div class="flex space-x-1 items-center">
                                                <p>

                                                    <a class="hover:text-lime-500 text-sm md:text-base"
                                                        href="{{ route('detalles', $producto->id) }}">
                                                        @if (strlen($producto->nombre_producto) > 10)
                                                            {{ Str::limit($producto->nombre_producto, $limit = 10, $end = '...') }}
                                                        @else
                                                            {{ $producto->nombre_producto }}
                                                        @endif
                                                    </a>
                                                </p>
                                                <p class="text-sm">x</p>
                                                <p class="text-sm">
                                                    {{ $producto->pivot->cantidad_orden_compra }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <div>
                                        <p class="font-semibold">
                                            Precios
                                        </p>
                                        <div class="mt-2">
                                            @foreach ($productos as $producto)
                                                <p class="text-sm md:text-base">
                                                    ${{ number_format($producto->pivot->precio_orden_compra, 0, ',', '.') }}
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="flex justify-center mt-10">
                        @if (session('rol') == 1)
                            @if($ordenCompra->estado_retiro == 0)
                            <form id="formulario" method="POST" action="{{ route('editarCompra', $ordenCompra->id) }}">
                                <input id="codigo_oculto" type="hidden" name="codigo_oculto" value="">
                                @csrf
                                @if ($ordenCompra->envio == 1)
                                    @if ($ordenCompra->estado_retiro == 0)
                                        <button type="button" class="btn-primary">

                                            Retirar
                                        </button>
                                    @else
                                        <button type="button" class="btn-primary">

                                            Retirado
                                        </button>
                                    @endif

                                    </button>
                                @else
                                    @if ($ordenCompra->estado_retiro == 0)
                                        <button id="enviar" type="button" class="btn-primary">
                                            Enviar
                                        </button>
                                    @else
                                        <button type="button" class="btn-primary">
                                            Enviado
                                        </button>
                                    @endif
                                @endif
                            </form>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-span-2 flex justify-end pt-3">
                    <a class="text-gray-400 text-sm hover:text-lime-500 active:text-lime-500"
                        href="{{ route('usuario.evaluarPdf', $ordenCompra->id) }}">¿Quiere imprimir esta Orden de
                        Compra?</a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>

        @if(session()->has('errors'))
                    $('#cambiar-contraseña-modal').removeClass('hidden');
               

                $('#overlay-modal-cambiar-contraseña').on('click', function() {
                    $('#cambiar-contraseña-modal').addClass('hidden');
                });
                $('#cancelar').on('click', function() {
                    $('#cambiar-contraseña-modal').addClass('hidden');
                });
                $('#aceptar').on('click', function() {
                    $('#formulario').submit();
                });

                $('#codigo').on('input', function() {
                    var codigo = $(this).val();
                    $('#codigo_oculto').val(codigo);
                });
        @endif

        $('.btn-primary').click(function() {
            @if ($ordenCompra->estado_retiro == 0 && $ordenCompra->envio == 1)
                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "Marcarás este pedido como Retirado",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡Estoy seguro!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $('#formulario').submit();
                    }
                })
            @elseif ($ordenCompra->estado_retiro == 0 && $ordenCompra->envio == 2)
                $(document).ready(function() {
                    $('#cambiar-contraseña-modal').removeClass('hidden');
                });

                $('#overlay-modal-cambiar-contraseña').on('click', function() {
                    $('#cambiar-contraseña-modal').addClass('hidden');
                });
                $('#cancelar').on('click', function() {
                    $('#cambiar-contraseña-modal').addClass('hidden');
                });
                $('#aceptar').on('click', function() {
                    $('#formulario').submit();
                });

                $('#codigo').on('input', function() {
                    var codigo = $(this).val();
                    $('#codigo_oculto').val(codigo);
                    console.log( $('#codigo_oculto').val(codigo));
                });
            @else
                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "Marcarás este pedido como No Enviado/Retirado",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡Estoy seguro!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $('#formulario').submit();
                    }
                })
            @endif
        })
    </script>
@endsection
