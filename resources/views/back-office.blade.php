@extends('layaouts.master')

@section('content')

    <div class="lg:grid lg:grid-cols-7 mt-10 mb-10">
        <div class="lg:col-start-2 md:col-span-7 lg:col-span-5 md:px-5 lg:px-0">
            <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-4 justify-center mb-10">
                <div class="lg:col-span-2 md:col-span-1">
                    <div class="">
                        <div class="bg-lime-500 text-white text-lg font-semibold p-1 pl-3 uppercase">
                            Productos
                        </div>
                        <div class="p-1 pl-3 border-2">
                            <ul class="list-disc pl-4 space-y-3 mt-3">
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="{{ route('crearproducto') }}">Crear Nuevo Producto</a>
                                </li>
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="{{ route('listado-productos') }}">Ver Listado de Productos</a>
                                </li>
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="{{ route('sin-stock') }}">Ver Productos Sin Stock</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 md:col-span-1">
                    <div class="">
                        <div class="bg-lime-500 text-white text-lg font-semibold p-1 pl-3 uppercase">
                            Ofertas
                        </div>
                        <div class="p-1 pl-3 border-2">
                            <ul class="list-disc pl-4 space-y-3 mt-3">
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="{{ route('mostrarOfertas') }}">
                                        Ver Todas las Ofertas
                                    </a>
                                </li>
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="{{ route('mostrarOfertasActivas') }}">
                                        Ver Ofertas Activas
                                    </a>
                                </li>
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="{{ route('mostrarOfertasFuturas') }}">
                                        Ver Ofertas Futuras
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 md:col-span-1">
                    <div class="">
                        <div class="bg-lime-500 text-white text-lg font-semibold p-1 pl-3 uppercase">
                            Compras
                        </div>
                        <div class="p-1 pl-3 border-2">
                            <ul class="list-disc pl-4 space-y-3 mt-3">
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="{{ route('verCompras') }}">Ver Compras Realizadas</a>
                                </li>
                                <li class="pendiente hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="{{ route('verComprasRetiro') }}">Compras con Retiro en Tienda</a>
                                </li>
                                <li class="pendiente hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="{{ route('verComprasEnvio') }}">Compras con Envío a Domicilio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-6 gap-4 mt-15 mb-10">
                <div class="lg:col-span-3 md:col-span-1">
                    <div class="flex justify-center">
                        <p class="text-lg font-black">
                            Últimos Pedidos Por Enviar
                        </p>
                    </div>
                    <div class="flex justify-center mt-5 px-5 md:px-0">
                        <table class="overflow-x-auto">
                            <thead>
                                <tr class="bg-lime-500 text-white uppercase font-semibold">
                                    <th class="hidden">ID</th>
                                    <th class="px-4 py-1">Nombre</th>
                                    <th class="px-4 py-1">Fecha</th>
                                    <th class="px-4 py-1">Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($porEnviar as $enviar)
                                    <tr id="{{ $enviar->id }}" class="hover:font-semibold hover:text-lime-500 enviar">

                                        <td class="border px-4 py-1">
                                            <a href="{{ route('compra', $enviar->id) }}">
                                                <p>
                                                    {{ $enviar->user->name }}
                                                </p>
                                                <p>
                                                    {{ $enviar->user->metauser->apellido_paterno }}
                                                </p>
                                            </a>

                                        </td>

                                        <td class="border px-4 py-1">
                                            {{ date('d-m-Y', strtotime($enviar->created_at)) }}
                                        </td>
                                        <td class="border px-4 py-1">{{ $enviar->telefono }}</td>

                                    </tr>
                                @endforeach
                                @if (count($porEnviar) == 0)
                                    <tr class="pt-5">
                                        <td colspan="7" class="text-center font-semibold">No hay productos por enviar
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-span-3 flex justify-center">
                        {{ $porEnviar->links() }}
                    </div>
                </div>
                <div class="md:col-span-1 lg:col-span-3 mt-10 md:mt-0">
                    <div class="flex justify-center mb-5">
                        <p class="text-lg font-black">
                            Últimos Pedidos Para Retirar
                        </p>
                    </div>
                    <div class="flex justify-center overflow-x-auto">
                        <table class="overflow-x-auto">
                            <thead class="border">
                                <tr class="bg-lime-500 text-white uppercase font-semibold">
                                    <th class="px-4 py-1">Nombre</th>
                                    <th class="px-4 py-1">Fecha</th>
                                    <th class="px-4 py-1">Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($porRetirar as $retirar)
                                    <tr class="hover:font-semibold hover:text-lime-500 enviar">
                                        <td class="border px-4 py-1">
                                            <a href="{{ route('compra', $retirar->id) }}">
                                                <p class="px-5">
                                                    {{ $retirar->user->name }}
                                                </p>
                                                <p class="px-5">
                                                    {{ $retirar->user->metauser->apellido_paterno }}
                                                </p>
                                            </a>
                                        </td>
                                        <td class="border px-4 py-1">
                                            {{ date('d-m-Y', strtotime($retirar->created_at)) }}
                                        </td>
                                        <td class="border px-4 py-1">{{ $retirar->telefono }}</td>
                                    </tr>
                                @endforeach
                                @if (count($porRetirar) == 0)
                                    <tr class="pt-5">
                                        <td colspan="7" class="text-center font-semibold">No hay productos para retirar
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-span-3 flex justify-center">
                        {{ $porRetirar->links() }}
                    </div>
                </div>
            </div>
            <div class="md:grid grid-cols-6 gap-4 mt-10">
                <div class="lg:col-span-2 md:col-span-3 mt-5 md:mt-0">
                    <p class="uppercase text-lg font-black flex justify-center">
                        Productos Por Categoría
                    </p>
                    {{-- pie chart to show product by categoria --}}
                    <div class="flex justify-center px-5">
                        <canvas id="myChart2" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="lg:col-span-2 md:col-span-3 mt-10 md:mt-0">
                    <div class="flex justify-center space-x-2">
                        <p class="uppercase text-lg font-black flex justify-center">
                            Ventas Por Mes
                        </p>
                        <form id="formularioventas" action="{{ route('ventasMensuales') }}" method="POST">
                            @csrf
                            <select id="ventas" name="año"
                                class="border-2 rounded-md p-1 border-black border-opacity-20 outline-none focus:border-lime-500 w-full transition duration-200">>
                                @foreach ($añosVenta as $año)
                                    <option
                                        @if (isset($id)) @if ($id == $año)
                                selected @endif
                                        @endif
                                        value="{{ $año }}">{{ $año }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="flex justify-center px-5">
                        <canvas id="myChart3" width="400" height="400"></canvas>
                    </div>
                    <div class="flex justify-center">
                        <p class="font-semibold">
                            Ventas Totales:
                        </p>
                        <p>{{ count($ordenesCompra) }}</p>
                    </div>
                    @if (isset($totalcomprasanual))
                        <div class="flex justify-center">
                            <p class="font-semibold">
                                Ventas durante al
                                @if (isset($id))
                                    {{ $id }}
                                @elseif (isset($anio_actual))
                                    {{ $anio_actual }}
                                @endif
                                :
                            </p>
                            <p>{{ $totalcomprasanual }}</p>
                        </div>
                    @endif
                </div>
                <div class="lg:col-span-2 md:col-span-3 mt-10 md:mt-0">
                    <div class="flex justify-center space-x-2">
                        <p class="uppercase text-lg font-black flex justify-center">
                            Visitas Por Mes
                        </p>
                        <form id="formulariovisitas" action="{{ route('visitasMensuales') }}" method="POST">
                            @csrf
                            <select id="visitas" name="año"
                                class="border-2 rounded-md p-1 border-black border-opacity-20 outline-none focus:border-lime-500 w-full transition duration-200">>
                                @foreach ($añosVisita as $año)
                                    <option
                                        @if (isset($añoselect)) @if ($añoselect == $año)
                                selected @endif
                                        @endif
                                        value="{{ $año }}">{{ $año }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="flex justify-center px-5">
                        <canvas id="myChart4" width="400" height="400"></canvas>
                    </div>
                    <div class="flex justify-center">
                        <p class="font-semibold">
                            Visitas Totales:
                        </p>
                        <p>{{ count($visita) }}</p>
                    </div>
                    @if (isset($totalvisitasanual))
                        <div class="flex justify-center">
                            <p class="font-semibold">
                                Visitas durante al
                                @if (isset($id))
                                    {{ $id }}
                                @elseif (isset($anio_actual))
                                    {{ $anio_actual }}
                                @endif
                                :
                            </p>
                            <p>{{ $totalvisitasanual }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
        {{-- import sweet alert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                $('#ventas').on('change', function() {
                    $('#formularioventas').submit();
                });
            });
            $(document).ready(function() {
                $('#visitas').on('change', function() {
                    $('#formulariovisitas').submit();
                });
            });
        </script>
        <script>
            const ctx2 = document.getElementById('myChart2');
            var categorias = [];
            var cantidad2 = [];
            @foreach ($array as $categoria)
                categorias.push("{{ $categoria->nombre_categoria }}");
                cantidad2.push("{{ $categoria->productos }}");
            @endforeach
            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: categorias,
                    datasets: [{
                        label: 'Productos',
                        data: cantidad2,
                        borderWidth: 0
                    }]
                },
                options: {

                }
            });
        </script>
        <script>
            var ctx = document.getElementById('myChart3');
            var meses = [];
            var cantidad3 = [];
            @foreach ($array6 as $item)
                meses.push("{{ $item['mes'] }}");
            @endforeach
            @foreach ($array6 as $item)
                cantidad3.push("{{ $item['cantidad'] }}");
            @endforeach
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Cantidad de Ventas',
                        data: cantidad3,
                        borderWidth: 0
                    }]
                },
                options: {
                    scales: {
                        y: {
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        </script>
        <script>
            var ctx = document.getElementById('myChart4');
            var meses2 = [];
            var cantidad4 = [];
            @foreach ($array7 as $item)
                meses2.push("{{ $item['mes'] }}");
            @endforeach
            @foreach ($array7 as $item)
                cantidad4.push("{{ $item['cantidad'] }}");
            @endforeach
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: meses2,
                    datasets: [{
                        label: 'Cantidad de Visitas',
                        data: cantidad4,
                        borderWidth: 0
                    }]
                },
                options: {
                    scales: {
                        y: {
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        </script>
    @endsection
@endsection
