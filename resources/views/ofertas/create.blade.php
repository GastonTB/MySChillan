@extends('layaouts.master')


@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection
@section('content')

    <div class="">
        <div id="modal-oferta">
            <div class="flex justify-center">
                <div class="md:w-7/10 xl:w-1/4 lg:w-1/3 w-9/10 mt-10">
                    <div class="flex justify-center mb-2 text-lg font-bold crear">
                        Crear Oferta para Producto: {{ $producto->nombre_producto }}
                    </div>
                    <div class="px-3 flex justify-center md:text-lg lg:text-xl font-bold mb-5" id="nombre-modal">

                    </div>
                    <form id="form-oferta" action="{{ route('crear-oferta') }}" method="POST">
                        @csrf
                        <div id="method"></div>

                        <input type="hidden" name="id_producto" id="id-producto" value="{{ $producto->id }}">
                        <div class="grid grid-cols-2 mb-5">
                            <div class="col-span-1">
                                <div class="md:px-10 px-3">
                                    <label class="relative">
                                        <input disabled id="precio-antiguo" name="precio_antiguo" type="text"
                                            class=" border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                            placeholder=" " value="${{ number_format($producto->precio, 0, ',', '.') }}">
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
                            <button class="btn-tienda" id="crear-oferta">
                                Crear Oferta
                            </button>
                        </div>
                    </form>
                    {{-- <div class="flex justify-center m-10">
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
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            $('#crear-oferta').on('click', function() {
                if ($('#precio-oferta').val() == '' || $('#fecha_ini').val() == '' || $('#fecha_ter')
                    .val() == '') {
                    $('#crear-oferta').attr('type', 'submit');
                } else {

                    $('#crear-oferta').attr('type', 'button');
                    Swal.fire({
                        title: '¿Crear oferta?',
                        text: "Esto podrá ser modificado más tarde",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, crear oferta!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#form-oferta').submit();
                        }
                    })
                }
            });
        });

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
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: '',
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

        $('.datepicker').on('blur', function() {
            if ($(this).val() !== '') {
                $(this).val('');
            }
        });

        $('.datepicker').on('paste', function(e) {
            e.preventDefault();
        });
    </script>
@endsection
