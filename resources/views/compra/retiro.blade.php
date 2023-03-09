@extends('layaouts.master')

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection
@section('modales')
@endsection
@section('content')

    <div class="container w-full md:w-4/5 xl-3/5 mx-auto px-2 mt-10">
        <div class="">
            <a class="text-lime-500" href="{{ route('backoffice') }}">Back Office</a> /
            <a class="text-lime-500" href="{{ route('verComprasRetiro') }}">Lista de Compras con Retiro en Tienda</a>
        </div>
        <div class="flex justify-center">
            <p class="text-3xl font-bold my-3">
                Listado de Compras con Retiro en Tienda
            </p>
        </div>
        <div class="mb-3 flex">
            <div class="w-1/2 pl-0">
                <form method="POST" id="formulario_ordenar" action="{{ route('filtrarComprasRetiro') }}">
                    @csrf
                    <div class="flex space-x-1">
                        <select name="categoria"
                            class="border-2 rounded-md px-5 border-black border-opacity-20 outline-none focus:border-lime-500 py-2 transition duration-200"
                            name="orden" id="">
                            @if (isset($categoria))
                                <option @if ($categoria == 1) selected @endif value="1">
                                    Fecha
                                </option>
                                <option @if ($categoria == 2) selected @endif value="2">
                                    Total
                                </option>
                                <option @if ($categoria == 3) selected @endif value="3">
                                    Nombre
                                </option>
                                <option @if ($categoria == 4) selected @endif value="4">
                                    Teléfono
                                </option>
                                <option @if ($categoria == 5) selected @endif value="5">
                                    Correo
                                </option>
                                <option @if ($categoria == 6) selected @endif value="6">
                                    Estado Envío
                                </option>
                            @else
                                <option value="1">
                                    Fecha
                                </option>
                                <option value="2">
                                    Total
                                </option>
                                <option value="3">
                                    Nombre
                                </option>
                                <option value="4">
                                    Teléfono
                                </option>
                                <option value="5">
                                    Correo
                                </option>
                                <option value="6">
                                    Estado Envío
                                </option>
                            @endif
                        </select>
                        <select
                            class="border-2 rounded-md px-5 border-black border-opacity-20 outline-none focus:border-lime-500 py-2 transition duration-200"
                            name="orden" id="">
                            @if (isset($ordenar))
                                <option @if ($ordenar == 1) selected @endif value="1">
                                    Descendiente
                                </option>
                                <option @if ($ordenar == 2) selected @endif value="2">
                                    Ascendente
                                </option>
                            @else
                                <option value="1">
                                    Descendiente
                                </option>
                                <option value="2">
                                    Ascendente
                                </option>
                            @endif
                        </select>
                        <div>
                            <button class="btn-tienda">
                                Ordenar
                            </button>
                        </div>
                    </div>
                    @if (isset($search))
                        <div class="mt-1 flex items-center">
                            <p class="text-gray-500 p-1 border-2 rounded-md border-opacity-60 border-lime-500">
                                Resultados para la busqueda: {{ $search }} <a href="{{ route('verComprasRetiro') }}"
                                    class="fa fa-x fa-xs ml-3 mr-2 hover:text-lime-500 active:text-lime-500"></a>
                            </p>
                        </div>
                    @endif
                    <input type="hidden" name="busqueda"
                        @if (isset($search)) value="{{ $search }}" @endif>
                </form>
            </div>
            <div class="w-1/2 pr-0">
                <div class="flex justify-end">
                    <form action="{{ route('buscarComprasRetiro') }}" method="POST">
                        <div class="flex justify-end">
                            @csrf
                            <label class="relative">
                                <input name="buscar" type="text"
                                    class=" border-2 rounded-l-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                    placeholder=" ">
                                <span
                                    class="text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-3 mx-3 px-2 transition duration-200 input-text">
                                    Buscar
                                </span>
                            </label>
                            <button class="btn-tienda rounded-r-md">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table id="tabla" class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                    <tr>
                        <th id="1" scope="col"
                            class="py-4 px-6 hover:cursor-pointer hover:font-black hover:text-lime-500">
                            <div class="flex space-x-2 items-center">
                                <p>Nombre Comprador</p>
                            </div>
                        </th>
                        <th id="2" scope="col"
                            class="py-4 px-6 hover:cursor-pointer hover:font-black hover:text-lime-500">
                            <div class="flex space-x-2 items-center">
                                <p>Total Compra</p>
                            </div>
                        </th>
                        <th id="3" scope="col"
                            class="py-4 px-6 hover:cursor-pointer hover:font-black hover:text-lime-500">
                            <div class="flex space-x-2 items-center">
                                <p>Fecha</p>
                            </div>
                        </th>
                        <th id="4" scope="col"
                            class="py-4 px-6 hover:cursor-pointer hover:font-black hover:text-lime-500">
                            <div class="flex space-x-2 items-center">
                                <p>Teléfono</p>
                            </div>
                        </th>
                        <th id="5" scope="col"
                            class="py-4 px-6 hover:cursor-pointer hover:font-black hover:text-lime-500">

                            <div class="flex space-x-2 items-center">
                                <p>Correo Electrónico</p>
                        </th>
                        <th id="7" scope="col"
                            class="py-4 px-6 hover:cursor-pointer hover:font-black hover:text-lime-500">
                            <div class="flex space-x-2 items-center">
                                <p>Estado envío</p>
                            </div>
                        </th>

                    </tr>
                </thead>
                {{-- <div class="hidden">
                    <input name="ordenar" type="radio" value="1">
                    <input name="ordenar" type="radio" value="2">
                    <input name="ordenar" type="radio" value="3">
                    <input name="ordenar" type="radio" value="4">
                    <input name="ordenar" type="radio" value="5">
                    <input name="ordenar" type="radio" value="6">
                    <input name="ordenar" type="radio" value="7">
                </div> --}}
                <tbody>

                    @foreach ($ordenCompra as $compra)
                    <tr class="bg-white border-b  hover:bg-gray-100">

                        <td scope="col" class="py-4 px-6">
                            <a class="text-lime-500 font-semibold" href="{{ route('compra', $compra->id) }}">
                                {{ $compra->user->name }} {{ $compra->user->metauser->apellido_paterno }}
                                {{ $compra->user->metauser->apellido_materno }}
                            </a>
                        </td>
                            <td scope="col" class="py-4 px-6">
                                ${{ number_format($compra->total, 0, ',', '.') }}
                            </td>
                            <td scope="col" class="py-4 px-6">
                                {{ date('d-m-Y', strtotime($compra->created_at)) }}
                            </td>
                            <td scope="col" class="py-4 px-6">
                                {{ $compra->telefono }}
                            </td>
                            <td scope="col" class="py-4 px-6">
                                {{ $compra->correo }}
                            </td>
                            <td scope="col" class="py-4 px-6">
                                @if ($compra->envio == 2)
                                    @if ($compra->estado_retiro == 0)
                                        No Enviado
                                    @else
                                        Enviado
                                    @endif
                                @elseif ($compra->envio == 1)
                                    @if ($compra->estado_retiro == 0)
                                        No Retirado
                                    @else
                                        Retirado
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="my-5">
            {{ $ordenCompra->links() }}
        </div>
    </div>
    <div class="container w-full md:w-4/5 xl-3/5 mx-auto px-2 mt-10 overflow-auto">
        @if (count($ordenCompra) == 0)
            <div class="bg-white border-b flex justify-center">
                <div class=" text-gray-900 text-xl font-bold md:text-2xl">
                    No hay ofertas disponibles
                </div>
            </div>
        @endif
    </div>


@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>


    <script>
        //     $(document).ready(function() {
        //         $('.fa-chevron-up').addClass('hidden');
        //     });

        //     $(document).ready(function() {
        //   $('select[name="orden"]').change(function() {
        //     console.log('asdsad');
        //     $('#formulario_ordenar').submit();
        //   });
        // });

        $(document).ready(function() {
            $('.fa-arrow-up').on('click', function() {
                $(this).addClass('text-lime-500');
                $('.fa-arrow-down').addClass('text-gray-100');
                $('.fa-arrow-up').removeClass('text-gray-100');

            });
            $('.fa-arrow-down').on('click', function() {
                $(this).addClass('text-lime-500');
                $('.fa-arrow-up').addClass('text-gray-100');
                $('.fa-arrow-down').removeClass('text-gray-100');

            });
        });
    </script>
@endsection
@endsection
