@extends('layaouts.master')

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection
@section('modales')
    <div>
        <div id="modal-oferta" class="hidden">
            <div id="overlay-modal-oferta" class="z-40 bg-black h-screen w-screen opacity-40 fixed"></div>
            <div class="flex justify-center">
                <div class="top-1/5 rounded-md md:w-7/10 xl:w-1/4 lg:w-1/3 w-9/10  z-50 bg-white fixed outline-none">
                    <div class="flex justify-end pt-3 pr-5">
                        <button id="cerrar-modal-oferta" class="hover:text-lime-500">
                            <i class="fa fa-x"></i>
                        </button>
                    </div>
                    <div class="flex justify-center mb-2 text-lg font-bold crear">
                        Crear Oferta para Producto:
                    </div>
                    <div class="flex justify-center mb-2 text-lg font-bold editar hidden">
                        Editar Oferta para Producto:
                    </div>
                    <div class="px-3 flex justify-center md:text-lg lg:text-xl font-bold mb-5" id="nombre-modal">

                    </div>
                    @csrf
                    <div id="method"></div>

                    <input type="hidden" name="id_producto" id="id-producto" value="">
                    <div class="grid grid-cols-2 mb-5">
                        <div class="col-span-1">
                            <div class="md:px-10 px-3">
                                <input type="hidden" name="precio_antiguo_hidden" id="precio-antiguo-hidden">
                                <label class="relative">
                                    <input disabled id="precio-antiguo" name="precio_antiguo" type="text"
                                        class=" border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                        placeholder=" ">
                                    <span
                                        class="text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text borde">
                                        Precio Producto
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="md:px-10 px-3">
                                <label class="relative">
                                    <input required id="precio-oferta" name="oferta" value="{{ old('oferta') }}"
                                        type="text"
                                        class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                        placeholder=" ">
                                    <span
                                        class="borde text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                        Precio Oferta
                                    </span>
                                </label>
                            </div>
                            <div class="md:px-10 px-3">
                                <span class="text-sm errores" style="color:red"><small>
                                        @error('oferta')
                                            {{ $message }}
                                        @enderror
                                    </small></span>
                                <span class="text-sm errores" style="color:red"><small>
                                        @error('precio_oferta_oculto')
                                            {{ $message }}
                                        @enderror
                                    </small></span>
                                @if (session()->has('error_oferta'))
                                    <span class="text-sm errores"
                                        style="color:red"><small>{{ session()->get('error_oferta') }}</small></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-10">
                        <div class="col-span-1">
                            <div class="md:px-10 px-3">
                                <label class="relative">
                                    <input autocomplete="off" required id="fecha_ini" name="fecha_ini"
                                        value="{{ old('fecha_ini') }}" type="text"
                                        class="datepicker border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                        placeholder=" ">
                                    <span
                                        class="text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text borde">
                                        Fecha Inicio
                                    </span>
                                </label>
                            </div>
                            <div class="md:px-10 px-3">
                                <span class="text-sm errores" style="color:red"><small>
                                        @error('fecha_ini')
                                            {{ $message }}
                                        @enderror
                                    </small></span>
                                <span class="text-sm errores" style="color:red"><small>
                                        @error('fecha_ini_oculto')
                                            {{ $message }}
                                        @enderror
                                    </small></span>
                                @if (session()->has('error_fi'))
                                    <span class="text-sm errores"
                                        style="color:red"><small>{{ session()->get('error_fi') }}</small></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="md:px-10 px-3">
                                <label class="relative">
                                    <input autocomplete="off" required id="fecha_ter" name="fecha_ter"
                                        value="{{ old('fecha_ter') }}" type="text"
                                        class="datepicker border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                        placeholder=" ">
                                    <span
                                        class="text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text borde">
                                        Fecha Fin
                                    </span>
                                </label>
                            </div>
                            <div class="md:px-10 px-3">
                                <span class="text-sm errores" style="color:red"><small>
                                        @error('fecha_ter')
                                            {{ $message }}
                                        @enderror
                                    </small></span>
                                <span class="text-sm errores" style="color:red"><small>
                                        @error('fecha_ter_oculto')
                                            {{ $message }}
                                        @enderror
                                    </small></span>
                                @if (session()->has('error_ft'))
                                    <span class="text-sm errores"
                                        style="color:red"><small>{{ session()->get('error_ft') }}</small></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center m-10">
                        <div>
                            <form action="{{ route('editarOferta') }}" id="form-editar" method="POST">
                                @csrf
                                <input type="hidden" name="id_oferta" id="id-oferta">
                                <input type="hidden" name="precio_oferta_oculto" id="precio-oferta-oculto">
                                <input type="hidden" name="fecha_ini_oculto" id="fecha-ini-oculto">
                                <input type="hidden" name="fecha_ter_oculto" id="fecha-ter-oculto">
                                <button id="editar-oferta" type="button" class="btn-tienda">
                                    Editar Oferta
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="container w-full md:w-4/5 xl-3/5 mx-auto px-2 mt-10">
        <div class="">
            <a class="text-lime-500" href="{{ route('backoffice') }}">Back Office</a> /
            <a class="text-lime-500" href="{{ route('mostrarOfertas') }}">Lista de Ofertas</a>
        </div>
        <div class="flex justify-center">
            <p class="text-3xl font-bold my-3">
                Listado de Ofertas
            </p>
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
                        <th hidden scope="col" class="py-3 px-6">
                            Oferta Id
                        </th>

                        <th scope="col" class="py-3 px-6">
                            Precio Oferta
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Fecha Inicio
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Fecha Termino
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Oferta
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
                                <a class="font-semibold text-lime-500" href="{{ route('detalles', $producto->id) }}">
                                    @if (strlen($producto->nombre_producto) > 20)
                                        {{ substr($producto->nombre_producto, 0, 20) }}...
                                    @else
                                        {{ $producto->nombre_producto }}
                                    @endif
                                </a>
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

                            <td id="oferta-id-{{ $producto->id }}" class="py-4 px-6 hidden">
                                @if ($producto->oferta_id != 0)
                                    {{ $producto->oferta->id }}
                                @endif
                            <td class="py-4 px-6" id="oferta-hidden-{{ $producto->id }}">
                                @if ($producto->oferta_id != 0)
                                    ${{ $producto->oferta->precio_oferta }}
                                @endif
                            </td>
                            <td class="py-4 px-6 " id="fecha-inicio-hidden-{{ $producto->id }}">
                                @if ($producto->oferta_id != 0)
                                    {{ $producto->oferta->fecha_inicio }}
                                @endif
                            </td>
                            <td class="py-4 px-6" id="fecha-termino-hidden-{{ $producto->id }}">
                                @if ($producto->oferta_id != 0)
                                    {{ $producto->oferta->fecha_fin }}
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
                            <td class="py-4 px-6">
                                <div class="flex justify-center">
                                    <form id="form-borrar-{{ $producto->id }}"
                                        action="{{ route('borrarOferta', $producto->oferta->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button id="boton-borrar-oferta-{{ $producto->id }}" type="button"
                                            class="borrar btn-tienda bg-red-500">
                                            Eliminar
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
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
        @if (isset($productos->mensaje))
            <div class="bg-white border-b flex justify-center">
                <div class=" text-gray-900 text-xl font-bold md:text-2xl">
                    No hay Ofertas disponibles
                </div>
            </div>
        @elseif (count($productos) == 0)
            <div class="bg-white border-b flex justify-center">
                <div class=" text-gray-900 text-xl font-bold md:text-2xl">
                    No hay ofertas disponibles </div>
            </div>
        @endif
    </div>


@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.borrar').on('click', function() {
                id = $(this).attr('id');
                id = id.replace('boton-borrar-oferta-', '');
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar oferta!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-borrar-' + id).submit();
                    }
                });
            });
        });

        @if (session()->get('message') == 'error-oferta-editar')
            $('#modal-oferta').removeClass('hidden');
            $('.editar').removeClass('hidden');
            $('.crear').addClass('hidden');
            $('#nombre-modal').text('{{ session('nombre') }}');
            $('#precio-antiguo').val('$' + '{{ session('precio_antiguo') }}');
            $('#id-producto').val('{{ session('id_producto') }}');
            $('#precio-antiguo-hidden').val('{{ session('precio_antiguo') }}');
            $('#precio-oferta').val('{{ session('precio_oferta') }}');
            $('#fecha_ini').val('{{ session('fecha_ini') }}');
            $('#fecha_ter').val('{{ session('fecha_ter') }}');
            $('#id-oferta').val('{{ session('producto_id') }}');
            var oferta_id = {{ Session::get('id_oferta') }};
            oferta_id = $.trim(oferta_id);
            oferta_id = $.trim(oferta_id);
            $('#editar-oferta').on('click', function() {
                $('#precio-oferta').attr('disabled', false);
                $('#fecha_ini').attr('disabled', false);
                $('#fecha_ter').attr('disabled', false);
                $(this).text('Guardar');
                $(this).removeClass('hover:bg-white');
                $(this).removeClass('hover:text-lime-500');
                $(this).removeClass('text-lime-500');
                $(this).removeClass('bg-lime-500');
                $(this).addClass('bg-lime-500');
                $(this).addClass('text-white');
                $(this).addClass('hover:bg-white');
                $(this).addClass('hover:text-lime-500');
                //swal fire
                $('#editar-oferta').on('click', function() {
                    Swal.fire({
                        title: '¿Estas seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, editar oferta!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#form-editar').submit();
                        }
                    });
                });

            });
        @endif

        $(document).ready(function() {
            $("#fecha_ini").datepicker({
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
                    'Nov', 'Dic'
                ],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: '',

            });
            $('#fecha_ter').datepicker({
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
                    'Nov', 'Dic'
                ],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'y-m-d  ',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: '',
            });

        });

        $(document).ready(function() {
            $('#overlay-modal-oferta').on('click', function() {
                $('#modal-oferta').addClass('hidden');
                $('.errores').addClass('hidden');
                $('.crear').removeClass('hidden');
                $('.editar').addClass('hidden');
                $('#editar-oferta').text('editar oferta');
                //empty inputs
                $('#precio-oferta').val('');
                $('#fecha_ini').val('');
                $('#fecha_ter').val('');


            });
            $('#cerrar-modal-oferta').on('click', function() {
                $('#modal-oferta').addClass('hidden');
                $('.errores').addClass('hidden');
                $('.crear').removeClass('hidden');
                $('.editar').addClass('hidden');
                $('#editar-oferta').text('editar oferta');
            });
        });

        $(document).ready(function() {
            var date = new Date();
            $('#fecha_ini').datepicker('option', 'minDate', date);
        });

        $('#fecha_ini').on('change', function() {
            $('#fecha_ter').removeAttr("disabled");
            var fecha_ini_min = $('#fecha_ini').datepicker('getDate');
            var fecha_ter_min = new Date();
            fecha_ter_min.setDate(fecha_ini_min.getDate() + 1);
            $('#fecha_ter').datepicker('option', 'minDate', fecha_ter_min);
        });
        let id;

        $(document).ready(function() {
            $('#fecha_ini').on('change', function() {
                var fecha_ini = $('#fecha_ini').val();
                $('#fecha-ini-oculto').val(fecha_ini);
            });
        });

        $(document).ready(function() {
            $('#fecha_ter').on('change', function() {
                var fecha_ter = $('#fecha_ter').val();
                $('#fecha-ter-oculto').val(fecha_ter);
            });
        });

        $('#precio-oferta').on('keyup', function(e) {
            let precio = $(this).val();
            //remove dollar
            precio = precio.replace('$', '');
            let precio2 = precio.replace(/[^0-9]/g, '');

            if (precio2 == NaN) {
                precio2 = 1;
            }
            if (precio2 < 0) {
                precio2 = 0;
            }
            if (precio2 > 100000) {
                precio2 = 100000;
            }
            let precio3 = precio2.toString();
            precio3 = precio3.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            //if first char is 0 remove it
            if (precio3.charAt(0) == '0') {
                precio3 = precio3.substring(1);
            }
            //add dollar
            precio3 = '$' + precio3;
            $(this).val(precio3);
            $('#precio-oferta-oculto').val(precio3);
        });


        @if (session()->get('message') == 'error-oferta')
            $('#modal-oferta').removeClass('hidden');
            $('#nombre-modal').text('{{ session('nombre') }}');
            $('#precio-antiguo').val('$' + '{{ session('precio_antiguo') }}');
            $('#id-producto').val('{{ session('id_producto') }}');
            $('#precio-antiguo-hidden').val('{{ session('precio_antiguo') }}');
            $('#oferta-id').val('{{ session('producto_id') }}');
        @endif

        $('.boton-detalle').on('click', function() {
            var id = $(this).attr('id');
            $('#id-oferta').val(id);
            $('#modal-oferta').removeClass('hidden');
            var precio = $('#precio-producto-' + id).text();
            var nombre = $('#nombre-producto-' + id).text();
            $('#form-oferta').removeAttr('action');
            precio = $.trim(precio);
            nombre = $.trim(nombre);
            $('#nombre-modal').text(nombre);
            $('#precio-antiguo').val(precio);
            var precio_antiguo = precio.replace(/[$'.']/g, '');
            $('#precio-antiguo-hidden').val(precio_antiguo);
            $('#id-producto').val(id);
            var oferta = $('#oferta-hidden-' + id).text();
            oferta = $.trim(oferta);
            $('#precio-oferta').val(oferta);
            $('.acciones-1').addClass('hidden');
            $('.acciones-2').removeClass('hidden');
            $('.crear').addClass('hidden');
            $('.editar').removeClass('hidden');
            var fecha_ini = $('#fecha-inicio-hidden-' + id).text();
            fecha_ini = $.trim(fecha_ini);
            var fecha_ter = $('#fecha-termino-hidden-' + id).text();
            fecha_ter = $.trim(fecha_ter);
            $('#fecha_ini').val(fecha_ini);
            $('#fecha_ter').val(fecha_ter);
            $('#precio-oferta').attr('disabled', true);
            $('#fecha_ini').attr('disabled', true);
            $('#fecha_ter').attr('disabled', true);
            var oferta_id = $('#oferta-id-' + id).text();
            oferta_id = $.trim(oferta_id);
            oferta_id = $.trim(oferta_id);
            $('#editar-oferta').on('click', function() {
                $('#precio-oferta').attr('disabled', false);
                $('#fecha_ini').attr('disabled', false);
                $('#fecha_ter').attr('disabled', false);
                $(this).text('Guardar');
                //swal fire
                $('#editar-oferta').on('click', function() {
                    Swal.fire({
                        title: '¿Estas seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, editar oferta!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#form-editar').submit();
                        }
                    });
                });

            });


        });
    </script>
@endsection
@endsection
