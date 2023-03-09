@extends('layaouts.master')
@section('content')

<div class="md:grid md:grid-cols-14 lg:grid-cols-4 mt-10 text-gray-700 px-1">
    <div class="lg:col-start-2 md:col-start-2 md:col-span-12 lg:col-span-2 px-5">
        <div class="md:grid grid-cols-2 bg-gray-100 mb-10 p-5 rounded-md">
            <div class="flex justify-center col-span-2 mb-10">
                <p class="text-2xl font-bold flex justify-center">
                        Detalles de la Compra N° {{ $ordenCompra->id }}
                    </p>
                </div>
                {{-- izq --}}
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
                                            {{ $usuario->name }} {{ $meta->apellido_paterno }}
                                            {{ $meta->apellido_materno }}
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
                                    <p class="flex">
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
                                    <p class="flex">
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
                                    <p class="flex">
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
                                    <p class="flex">
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
                                    <p class="flex">
                                        {{ $ordenCompra->direccion }}
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                {{-- der --}}
                <div>
                    <div class="flex justify-center mb-5 mt-5 md:mt-0">
                        <p class="text-lg font-semibold">
                            Datos de la Compra
                        </p>
                    </div>
                    <div class="flex justify-center">
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
                        </div>
                    </div>
                </div>
                <div class="flex justify-center col-span-2 mb-10 mt-10">
                
                    @if(count($ordenCompra->calificaciones) != count($ordenCompra->productos) &&  count($ordenCompra->calificaciones) == 0)
                    <form action="{{ route('evaluar', $ordenCompra->id) }}" method="POST">
                    @endif
                        @csrf
                        <div class="grid grid-cols-3 mt-3">
                            <div>
                                <p class="font-semibold">
                                    Productos
                                </p>
                                <div class="mt-2 space-y-0.5 md:space-y-0">
                                    @foreach ($productos as $producto)
                                        <div class="flex space-x-1 items-center md:hidden">
                                            <a href="{{ route('detalles', $producto->id) }}">
                                                <p class="md:font-medium text-sm">
                                                    @if(strlen($producto->nombre_producto)<10)
                                                    {{ $producto->nombre_producto }}
                                                    @else
                                                    {{ substr($producto->nombre_producto, 0, 10) }}...
                                                    @endif
                                                </p>
                                            </a>
                                            <p class="text-sm">x</p>
                                            <p class="text-sm">
                                                {{ $producto->pivot->cantidad_orden_compra }}
                                            </p>
                                        </div>
                                        <div class="flex space-x-1 items-center hidden md:flex">
                                            <p class="md:font-medium ">
                                               
                                                @if(strlen($producto->nombre_producto)<20)
                                                {{ $producto->nombre_producto }}
                                                @else
                                                {{ substr($producto->nombre_producto, 0, 20) }}...
                                                @endif
                                               
                                            </p>
                                            <p class="">x</p>
                                            <p class="">
                                                {{ $producto->pivot->cantidad_orden_compra }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div>
                                    <p class="font-semibold">
                                        Precios
                                    </p>
                                    <div class="mt-2 space-y-0.5 md:space-y-0">
                                        @foreach ($productos as $producto)
                                            <p class="flex justify-center hidden md:block">
                                                ${{ number_format($producto->pivot->precio_orden_compra, 0, ',', '.') }}
                                            </p>
                                            <p class="flex justify-center text-sm md:hidden">
                                                ${{ number_format($producto->pivot->precio_orden_compra, 0, ',', '.') }}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <div>
                                    <p class="font-semibold">
                                        Calificación
                                    </p>
                                    <div class="mt-2">
                                       <div>
                                        @foreach ($productos as $producto)
                                        <div class="flex mt-2 text-sm md:text-base">
                                            @if ($producto->calificacion)
                                                <div class="flex"
                                                    @for ($i = 0; $i <= 5; $i++) 
                                                        @if ($i <= $producto->calificacion->puntuacion)
                                                        <i class="fa fa-star text-yellow-500 hover:cursor-pointer estrella"
                                                        ></i>
                                                        @else
                                                        <i class="fa fa-star text-gray-500 hover:cursor-pointer estrella"
                                                        ></i>
                                                        @endif 
                                                    @endfor
                                                </div>
                                                @else
                                                    <input hidden checked type="radio" name="{{ $producto->id }}"
                                                        value="0">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <input hidden type="radio" name="{{ $producto->id }}"
                                                            value="{{ $i }}">
                                                        <i class="fa fa-star text-gray-500 hover:cursor-pointer estrella"
                                                        id="{{ str_replace(' ', '_', $producto->nombre_producto) }}-{{ $i }}"
                                                            data-codigo="{{ $producto->id }}"></i>
                                                    @endfor
                                            @endif
                                        </div>
                                    @endforeach
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($ordenCompra->calificaciones) != count($ordenCompra->productos) &&  count($ordenCompra->calificaciones) == 0)
                        <div class="flex justify-center mt-10">
                            <button class="btn-tienda">
                                Calificar
                            </button>
                        </div>
                    </form>
                    @endif
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
    <script>
        $(document).ready(function() {
            $('.estrella').click(function() {
                var id = $(this).attr('id');
                var splitId = id.split('-');
                var nombre = splitId.slice(0, -1).join('-');
                var numero = splitId.slice(-1)[0];
                console.log('id '+id);
                console.log('nombre '+ nombre);
                console.log('numero '+ numero);
                for (var i = 1; i <= 5; i++) {
                    $('#' + nombre + '-' + i).removeClass('text-yellow-500').addClass('text-gray-500');
                }
                for (var i = 1; i <= numero; i++) {
                    $('#' + nombre + '-' + i).removeClass('text-gray-500').addClass('text-yellow-500');
                }
                var codigo = $(this).data('codigo');
                $('input[name="' + codigo + '"][value="' + numero + '"]').prop('checked', true);
            });
        });
    </script>
@endsection
