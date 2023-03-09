@extends('layaouts.master')

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection
@section('modales')
    <div id="modal-cantidad" class="hidden">
        <div id="overlay-modal-cantidad" class="z-40 bg-black h-screen w-screen opacity-40 fixed"></div>
        <div class="flex justify-center">
            <div class="top-1/5 rounded-md w-9/10 md:w-4/10 lg:w-3/10 xl:w-2/10  z-50 bg-white fixed outline-none">
                <div class="flex justify-end pt-3 pr-5">
                    <button id="cerrar-modal-cantidad" class="hover:text-lime-500">
                        <i class="fa fa-x"></i>
                    </button>
                </div>
                <div class="flex justify-center mb-2 text-lg font-bold crear">
                    Modificar stock para Producto:
                </div>
                <div class="flex justify-center mb-5 text-lg md:text-lg lg:text-xl font-bold " id="nombre-modal-cantidad">

                </div>
                <form id="form-stock" method="POST" action="{{ route('aumentarStock') }}">
                    @csrf
                    <input type="hidden" name="id_producto" id="producto-id">
                    <div class="flex justify-center my-5 space-x-3">
                        <div id="menos"
                            class="flex items-center py-2 px-3 border-2 bg-lime-500 text-white rounded-md active:bg-white active:text-lime-500">
                            <i class="fa fa-minus"></i>
                        </div>
                        <input name="cantidad_stock" id="cantidad-producto-modal"
                            class="py-2 px-3 border-2 w-20 text-center" type="text">
                        <div id="mas"
                            class="flex items-center py-2 px-3 border-2 bg-lime-500 text-white rounded-md active:bg-white active:text-lime-500">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <span class="text-sm errores mb-5" style="color:red"><small>
                                @error('cantidad_stock')
                                    {{ $message }}
                                @enderror
                            </small></span>
                    </div>
                    <div class="flex justify-center mb-10">
                        <button class="btn-tienda">
                            Modificar Stock
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container w-full md:w-4/5 xl-3/5 mx-auto px-2 mt-10">
        <div class="">
            <a class="text-lime-500" href="{{ route('backoffice') }}">Back Office</a> /
            <a class="text-lime-500" href="{{ route('sin-stock') }}">Listado de Productos Sin Stock</a>
        </div>
        <div class="flex justify-center">
            <p class="text-3xl font-bold my-3">
                Listado de Productos Sin Stock
            </p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 mb-3">
            <div class="order-2 lg:order-1 mt-5 lg:mt-0">
                <form method="POST" id="formulario_ordenar" action="{{ route('filtrarProductosAdminSinStock') }}">
                    @csrf
                    <div class="flex space-x-1">
                        <select name="categoria" id="select_categoria"
                            class="border-2 rounded-md px-5 border-black border-opacity-20 outline-none focus:border-lime-500 py-2 transition duration-200">
                            @if (isset($categoria))
                                <option @if ($categoria == 1) selected @endif value="1">
                                    Nombre
                                </option>
                                <option @if ($categoria == 2) selected @endif value="2">
                                    Precio
                                </option>
                                <option @if ($categoria == 3) selected @endif value="3">
                                    Cantidad
                                </option>
                                <option @if ($categoria == 4) selected @endif value="4">
                                    Categoria
                                </option>
                                <option @if ($categoria == 5) selected @endif value="5">
                                    Calificación
                                </option>
                                <option @if ($categoria == 6) selected @endif value="6" class="tipo_envio">
                                    Tipo Envío
                                </option>
                                <option @if ($categoria == 7) selected @endif value="7"
                                    class="estado_envio">
                                    Estado Envío
                                </option>
                            @else
                                <option value="1">
                                    Nombre
                                </option>
                                <option value="2">
                                    Precio
                                </option>
                                <option value="3">
                                    Cantidad
                                </option>
                                <option value="4">
                                    Categoria
                                </option>
                                <option value="5">
                                    Calificación
                                </option>
                                <option value="6" class="tipo_envio">
                                    Tipo Envío
                                </option>
                                <option value="7" class="estado_envio">
                                    Estado Envío
                                </option>
                            @endif
                        </select>
                        <select id="select_orden"
                            class="border-2 rounded-md px-5 border-black border-opacity-20 outline-none focus:border-lime-500 py-2 transition duration-200"
                            name="orden">
                            @if (isset($ordenar))
                                <option class="desc" @if ($ordenar == 1) selected @endif value="1">
                                    Descendiente
                                </option>
                                <option class="asc" @if ($ordenar == 2) selected @endif value="2">
                                    Ascendente
                                </option>
                            @else
                                <option value="1" class="desc">
                                    Descendiente
                                </option>
                                <option class="asc" value="2">
                                    Ascendente
                                </option>
                            @endif
                        </select>
                        <div class="hidden md:block">
                            <button class="btn-tienda">
                                Ordenar
                            </button>
                        </div>
                    </div>
                    <div class="md:hidden mt-1 md:mt-0">
                        <button class="btn-tienda">
                            Ordenar
                        </button>
                    </div>
                    @if (isset($search))
                        @if ($search != 'todo')
                            <div class="mt-1 flex items-center">
                                <p class="text-gray-500 p-1 border-2 rounded-md border-opacity-60 border-lime-500">
                                    Resultados para la busqueda: {{ $search }} <a
                                        href="{{ route('listado-productos') }}"
                                        class="fa fa-x fa-xs ml-3 mr-2 hover:text-lime-500 active:text-lime-500"></a>
                                </p>
                            </div>
                        @endif
                    @endif
                    <input type="hidden" name="busqueda"
                        @if (isset($search)) value="{{ $search }}" @endif>
                </form>
            </div>
            <div class="flex lg:justify-end order-1 lg:order-2">
                <form action="{{ route('buscarProductoAdminSinStock') }}" method="POST">
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
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nombre Producto
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Precio
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Cantidad
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Categoria
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Calificación
                        </th>
                        <th hidden scope="col" class="py-3 px-6">
                            Oferta Id
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Oferta
                        </th>
                        <th hidden scope="col" class="py-3 px-6">
                            Precio Oferta
                        </th>
                        <th hidden scope="col" class="py-3 px-6">
                            Fecha Inicio
                        </th>
                        <th hidden scope="col" class="py-3 px-6">
                            Fecha Termino
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Modificar Stock
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Editar
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Eliminar
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($productos as $producto)
                        <tr class="bg-white border-b  hover:bg-gray-100">
                            <td id="nombre-producto-{{ $producto->id }}" scope="row"
                                class="line py-4 px-6 font-medium text-gray-700 whitespace-nowrap ">
                                <div class="flex items-center">
                                    <a class="text-lime-500 font-semibold" href="{{ route('detalles', $producto->id) }}">
                                        @if (strlen($producto->nombre_producto) > 20)
                                            {{ substr($producto->nombre_producto, 0, 20) }}...
                                        @else
                                            {{ $producto->nombre_producto }}
                                        @endif
                                    </a>
                                    @if ($producto->trashed())
                                        <p class="ml-2 text-xs text-gray-400">
                                            (eliminado)
                                        </p>
                                    @endif
                                </div>
                            </td>
                            <td id="precio-producto-{{ $producto->id }}" class="py-4 px-6">
                                ${{ $producto->precio }}
                            </td>
                            <td id="cantidad-producto-{{ $producto->id }}" class="py-4 px-6">
                                {{ $producto->cantidad }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $producto->categoria->nombre_categoria }}
                            </td>
                            <td class="py-4 px-6 flex">
                                @if ($producto->calificaciones_avg_puntuacion)
                                    @php
                                        $promedio = number_format($producto->calificaciones_avg_puntuacion, 1);
                                        if (is_int($producto->calificaciones_avg_puntuacion)) {
                                            $promedio = (int) $producto->calificaciones_avg_puntuacion;
                                        }
                                        $promedio = str_replace('.', ',', $promedio);
                                    @endphp
                                    <p class="flex justify-start items-center">{{ $promedio }} <i
                                            class="fa fa-star text-yellow-500"></i></p>
                                @else
                                    Producto sin calificaciones
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if ($producto->oferta == null)
                                    <div class="flex justify-center">
                                        <a href="{{ route('crear-oferta-mostrar', $producto->id) }}"
                                            id="{{ $producto->id }}" class="boton-oferta btn-tienda">
                                            Agregar
                                            <i class="fa fa-tag"></i>
                                        </a>

                                    </div>
                                @else
                                    <div class="flex justify-center">
                                        <a href="{{ route('modificar-oferta-mostrar', $producto->id) }}"
                                            id="{{ $producto->id }}" class="boton-oferta btn-tienda">
                                            Ver Oferta
                                            <i class="fa fa-tag"></i>
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td id="oferta-id-{{ $producto->id }}" class="py-4 px-6 hidden">
                                @if ($producto->oferta_id != 0)
                                    {{ $producto->oferta->id }}
                                @endif
                            <td class="py-4 px-6 hidden" id="oferta-hidden-{{ $producto->id }}">
                                @if ($producto->oferta_id != 0)
                                    ${{ $producto->oferta->precio_oferta }}
                                @endif
                            </td>
                            <td class="py-4 px-6 hidden" id="fecha-inicio-hidden-{{ $producto->id }}">
                                @if ($producto->oferta_id != 0)
                                    {{ $producto->oferta->fecha_inicio }}
                                @endif
                            </td>
                            <td class="py-4 px-6 hidden" id="fecha-termino-hidden-{{ $producto->id }}">
                                @if ($producto->oferta_id != 0)
                                    {{ $producto->oferta->fecha_fin }}
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <button id="boton-stock-{{ $producto->id }}" class="btn-tienda bg-yellow-500 stock">
                                    <div class="flex items-end">
                                        <p class="mr-2">Modificar</p>
                                        <div class="flex">
                                            <i class="fa fa-plus mr-1"></i>
                                            <p>/</p><i class="fa fa-minus ml-1"></i>
                                        </div>
                                    </div>
                                </button>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex justify-center">
                                    <a href="{{ route('editarProducto', $producto->id) }}"
                                        class="btn-tienda bg-yellow-500 flex space-x-2">
                                        <p>Editar</p><i class="fa fa-pencil"></i>
                                    </a>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                @if ($producto->trashed())
                                    <div class="flex justify-center">
                                        <form id="recuperar-{{ $producto->id }}"
                                            action="{{ route('recuperarProducto', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" id="{{ $producto->id }}"
                                                class="recuperar btn-tienda">
                                                Recuperar
                                                <i class="fa fa-trash-restore-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="flex justify-center">
                                        <form id="eliminar-{{ $producto->id }}"
                                            action="{{ route('borrarProducto', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" id="{{ $producto->id }}"
                                                class="borrar btn-tienda bg-red-500">
                                                Eliminar
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="my-5">
            {{ $productos->links() }}
        </div>
    </div>
    <div class="container w-full md:w-4/5 xl-3/5 mx-auto px-2 mt-10 overflow-auto">
        @if (count($productos) == 0)
            <div class="bg-white border-b flex justify-center">
                <div class=" text-gray-900 text-xl font-bold md:text-2xl">
                    No se han encontrado productos
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).on('click', '.recuperar', function(event) {
            event.preventDefault();

            let id = $(this).attr('id');

            Swal.fire({
                title: '¿Estás seguro de que quieres recuperar este producto?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, recuperar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#recuperar-' + id).submit();
                }
            });
        });

        $(document).on('click', '.borrar', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            console.log(id);
            Swal.fire({
                title: '¿Estás seguro de que quieres eliminar este elemento?',
                text: 'Este producto no se eliminará permanentemente, podrás recuperarlo en el futuro si es necesario.',
                icon: 'warning',
                showCancelButton: true,
                
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#eliminar-' + id).submit();
                }
            });
        });

        $(document).ready(function() {
            $('#mas').on('click', function() {
                var cantidad = $('#cantidad-producto-modal').val();
                cantidad = parseInt(cantidad);
                if (cantidad < 1000) {
                    cantidad = cantidad + 1;
                }
                $('#cantidad-producto-modal').val(cantidad);
            });
            $('#menos').on('click', function() {
                var cantidad = $('#cantidad-producto-modal').val();
                cantidad = parseInt(cantidad);
                if (cantidad > 0) {
                    cantidad = cantidad - 1;
                }
                $('#cantidad-producto-modal').val(cantidad);
            });
        });

        $(document).ready(function() {
            $('.stock').on('click', function() {
                id = $(this).attr('id');
                id = id.replace('boton-stock-', '');
                $('#producto-id').val(id);
                $('#modal-cantidad').removeClass('hidden');
                var nombre = $('#nombre-producto-' + id).text();
                $('#nombre-modal-cantidad').text(nombre);
                var cantidad = $('#cantidad-producto-' + id).text();
                cantidad = $.trim(cantidad);
                $('#cantidad-producto-modal').val(cantidad);
                $('#cantidad-producto-modal').on('keyup', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                    if (this.value > 1000) {
                        this.value = 1000;
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.orden').on('click', function() {
                $('.ordenar').removeClass('hidden');
            });
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.orden').length) {
                    $('.ordenar').addClass('hidden');
                }
            });
        });

        $(document).ready(function() {
            $('#cerrar-modal-cantidad').on('click', function() {
                $('#modal-cantidad').addClass('hidden');
                $('.errores').addClass('hidden');
            });
            $('#overlay-modal-cantidad').on('click', function() {
                $('#modal-cantidad').addClass('hidden');
                $('.errores').addClass('hidden');
            });
        });



    </script>
@endsection
