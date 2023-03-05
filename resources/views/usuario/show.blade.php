@extends('layaouts.master')
@section('modales')
    <div>
        <div id="cambiar-contraseña-modal" class="hidden">
            <div id="overlay-modal-cambiar-contraseña" class="z-40 fixed h-screen w-screen bg-black opacity-40"></div>
            <div class="flex justify-center">
                <div
                    class="top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 w-4/5 md:w-5/10 lg:w-2/10 bg-white fixed rounded-md">
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl mb-10 mt-5 text-center">Cambiar Contraseña</div>
                        <form method="POST" action="{{ route('cambiarContraseña', auth()->id()) }}">
                            @csrf
                            <div class="mb-5">
                                <label class="relative">
                                    <input name="contraseña" type="password"
                                        class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                        placeholder=" ">
                                    <span
                                        class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                        Nueva Contraseña
                                    </span>
                                </label>
                            </div>

                            <div class="mb-5">
                                <div>
                                    <label class="relative">
                                        <input name="contraseña_confirmation" type="password"
                                            class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                            placeholder=" ">
                                        <span
                                            class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                            Confirmar Contraseña
                                        </span>
                                    </label>
                                </div>
                                <span class="" style="color:red">
                                    <small>
                                        @error('contraseña')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </span>
                            </div>

                            <div class="mb-10">
                                <div>
                                    <label class="relative">
                                        <input name="contraseña_antigua" type="password"
                                            class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                            placeholder=" ">
                                        <span
                                            class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                            Contraseña Actual
                                        </span>
                                    </label>
                                </div>
                                <span class="" style="color:red">
                                    <small>
                                        @error('contraseña_antigua')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </span>
                            </div>
                            <div class="flex justify-center space-x-10 mb-5">
                                <button id="guardar-cambiar-contraseña"
                                    class="bg-lime-500 hover:bg-lime-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Guardar
                                </button>
                                <button id="cancelar-cambiar-contraseña"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="button">
                                    Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')


    <div class="md:grid xl:grid-cols-5 lg:grid-cols-7 my-10">
        <div class="lg:col-start-2 xl:col-start-2 lg:col-span-5 xl:col-span-3">
            <div class="grid lg:grid-cols-2 gap-10 pb-5">
                <div class="col-span-1  md:px-10 lg:px-5">
                    <p class="text-xl font-black mb-5">Mis Compras</p>
                    <div class="md:pl-5">
                        <div class="overflow-x-auto">
                            <table class="text-sm text-left text-gray-500 -px-5">
                                @if (count($ordenes) != 0)
                                    <thead class="text-xs border-2 text-white uppercase bg-lime-500 font-semibold">
                                        <tr>
                                            <th scope="col" class="md:px-6 md:py-3 px-2 py-2 whitespace-nowrap">
                                                <div class="flex justify-center whitespace-nowrap">
                                                    Fecha
                                                </div>
                                            </th>
                                            <th scope="col" class="md:px-6 md:py-3 px-2 py-2 whitespace-nowrap">
                                                <div class="flex justify-center whitespace-nowrap">
                                                    Total
                                                </div>
                                            </th>
                                            <th scope="col" class="md:px-6 md:py-3 px-2 py-2 whitespace-nowrap">
                                                <div class="flex justify-center whitespace-nowrap">
                                                    Tipo de envío
                                                </div>
                                            </th>
                                            <th scope="col" class="md:px-6 md:py-3 px-2 py-2 whitespace-nowrap">
                                                <div class="flex justify-center whitespace-nowrap">
                                                    Evaluación
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ordenes as $orden)
                                            <tr class="border-2">
                                                <td class="px-2 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{-- only date no time --}}
                                                                {{ date('d-m-Y', strtotime($orden->created_at)) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-2 py-4 whitespace-nowrap">
                                                    <div class="flex justify-center">
                                                        <div class="text-sm text-gray-900">
                                                            ${{ number_format($orden->total, 0, ',', '.') }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-2 py-4 whitespace-nowrap">
                                                    <div class="flex justify-center">
                                                        <div class="text-sm text-gray-900">
                                                            @if ($orden->tipo_envio == 1)
                                                                Tienda
                                                            @else
                                                                Domicilio
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-2 py-4 break-words">
                                                    <div class="flex justify-center">
                                                        <div class="text-sm text-gray-900 px-2 ">

                                                            {{-- if today is 5 days more than $orden_updated at --}}
                                                            @if (Carbon\Carbon::now()->diffInDays(Carbon\Carbon::parse($orden->updated_at)) >= 5 && $orden->estado_retiro !=0)
                                                                <a class="btn-tienda"
                                                                    href="{{ route('mostrarEvaluar', $orden->id) }}">Calificar</a>
                                                            @else
                                                                <div class="flex items-center space-x-2">
                                                                    <a href="{{ route('compra', $orden->id) }}" class="btn-tienda text-sm">
                                                                        Detalles
                                                                    </a>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                    <p class="font-semibold text-gray-700 text-lg">No hay compras registradas a su cuenta
                                    </p>
                                @endif
                            </table>
                            {{-- links --}}
                            <div class="mt-5">
                                {{ $ordenes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <form id="datos_usuario" action="{{ route('actualizarPerfil', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-span-1 px-5">
                        <p class="text-xl font-black">Mis Datos</p>
                        <div class="md:pl-5 grid grid-cols-2">
                            <div class="col-span-1 order-1 mt-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input id="nombre_usuario" disabled name="nombre"
                                                    value="{{ $user->name }}" type="text"
                                                    class="border-2 bg-white rounded-md border-red-500 border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                                    placeholder=" ">
                                                <span
                                                    class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Nombre
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>
                                                @error('nombre')
                                                    {{ $message }}
                                                @enderror
                                            </small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-2 mt-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input id="apellido_p_usuario" disabled name="apellido_paterno"
                                                    value="{{ $user_meta->apellido_paterno }}" type="text"
                                                    class="border-2 rounded-md bg-white border-red-500 border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                                    placeholder=" ">
                                                <span
                                                    class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Apellido Paterno
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>
                                                @error('apellido_paterno')
                                                    {{ $message }}
                                                @enderror
                                            </small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-3 mt-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input id="apellido_m_usuario" disabled name="apellido_materno"
                                                    value="{{ $user_meta->apellido_materno }}" type="text"
                                                    class="border-2 rounded-md bg-white border-red-500 border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                                    placeholder=" ">
                                                <span
                                                    class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Apellido Materno
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>
                                                @error('apellido_materno')
                                                    {{ $message }}
                                                @enderror
                                            </small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-4 mt-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input id="direccion_usuario" disabled name="direccion"
                                                    value="{{ $user_meta->direccion }}" type="text"
                                                    class="border-2 rounded-md bg-white border-red-500 border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                                    placeholder=" ">
                                                <span
                                                    class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Direccion
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>
                                                @error('direccion')
                                                    {{ $message }}
                                                @enderror
                                            </small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-1 col-span-2 order-5 mt-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <select id="region_usuario" disabled name="region" id="regiones"
                                                    class="border-2 rounded-md bg-white border-red-500 border-opacity-20 outline-none focus:border-lime-500 w-full py-2.5 px-5 transition duration-200">
                                                    @foreach ($regiones as $region)
                                                        <option @if ($region->id == $region_user->id) selected @endif
                                                            value="{{ $region->id }}">
                                                            {{ $region->nombre_region }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span
                                                    class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                    Región
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-2 md:col-span-1 order-6 mt-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <select id="comuna_usuario" disabled name="comuna" id="comunas"
                                                    class="border-2 rounded-md bg-white border-red-500 border-opacity-20 outline-none focus:border-lime-500 w-full py-2 px-5 transition duration-200">
                                                    @foreach ($comunas as $comuna)
                                                        <option @if ($comuna->id == $user_meta->comuna_id) selected @endif
                                                            data-region="{{ $comuna->region_id }}"
                                                            value="{{ $comuna->id }}">
                                                            {{ $comuna->nombre_comuna }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span
                                                    class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                    Comuna
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-7 mt-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input id="correo_usuario" disabled name="email"
                                                    value="{{ $user->email }}" type="text"
                                                    class="border-2 rounded-md bg-white border-red-500 border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                                    placeholder=" ">
                                                <span
                                                    class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Correo
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-8 mt-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input id="telefono_usuario" disabled name="telefono"
                                                    value="{{ $user_meta->telefono }}" type="text"
                                                    class="border-2 rounded-md bg-white border-red-500 border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                                    placeholder=" ">
                                                <span
                                                    class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Teléfono
                                                </span>
                                            </label>
                                        </div>
                                        <div>
                                            <span id="error-telefono-usuario" class="text-sm hidden"
                                                style="color:red"><small>El Numero de Teléfono debe comenzar con un
                                                    9</small></span>
                                        </div>
                                        <div>
                                            <span class="text-sm" style="color:red"><small>
                                                    @error('telefono')
                                                        {{ $message }}
                                                    @enderror
                                                </small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="botones_1" class="pl-5 grid grid-cols-2 gap-5 mt-5">
                            <div class="flex justify-center">
                                <button type="button" class="btn-tienda contraseña">
                                    Cambiar Contraseña
                                </button>
                            </div>
                            <div class="flex justify-center">
                                <button type="button" id="cambiar_datos" class="btn-tienda">
                                    Modificar Datos
                                </button>
                            </div>
                        </div>
                        <div id="botones_2" class="pl-5 grid grid-cols-2 gap-5 mt-5 hidden">
                            <div class="flex justify-center">
                                <button id="cancelar" type="button" class="btn-tienda bg-red-500">
                                    Cancelar
                                </button>
                            </div>
                            <div class="flex justify-center">
                                <button type="button" id="guardar" class="btn-tienda">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.contraseña').click(function() {
            $('#cambiar-contraseña-modal').removeClass('hidden');
        });
       
        $(document).ready(function() {


            $('#cambiar_datos').on('click', function() {
                $('#botones_1').addClass('hidden');
                $('#botones_2').removeClass('hidden');
                $('#nombre_usuario').removeAttr('disabled');
                $('#apellido_p_usuario').removeAttr('disabled');
                $('#apellido_m_usuario').removeAttr('disabled');
                $('#region_usuario').removeAttr('disabled');
                $('#comuna_usuario').removeAttr('disabled');
                $('#correo_usuario').removeAttr('disabled');
                $('#telefono_usuario').removeAttr('disabled');
                $('#direccion_usuario').removeAttr('disabled');


                $('#nombre_usuario').removeClass('border-red-500');
                $('#apellido_p_usuario').removeClass('border-red-500');
                $('#apellido_m_usuario').removeClass('border-red-500');
                $('#region_usuario').removeClass('border-red-500');
                $('#comuna_usuario').removeClass('border-red-500');
                $('#correo_usuario').removeClass('border-red-500');
                $('#telefono_usuario').removeClass('border-red-500');
                $('#direccion_usuario').removeClass('border-red-500');


                $('#nombre_usuario').addClass('border-lime-500');
                $('#apellido_p_usuario').addClass('border-lime-500');
                $('#apellido_m_usuario').addClass('border-lime-500');
                $('#region_usuario').addClass('border-lime-500');
                $('#comuna_usuario').addClass('border-lime-500');
                $('#correo_usuario').addClass('border-lime-500');
                $('#telefono_usuario').addClass('border-lime-500');
                $('#direccion_usuario').addClass('border-lime-500');

            });

            $('#cancelar').on('click', function() {

                $('#botones_1').removeClass('hidden');
                $('#botones_2').addClass('hidden');
                $('#nombre_usuario').attr('disabled', 'disabled');
                $('#apellido_p_usuario').attr('disabled', 'disabled');
                $('#apellido_m_usuario').attr('disabled', 'disabled');
                $('#region_usuario').attr('disabled', 'disabled');
                $('#comuna_usuario').attr('disabled', 'disabled');
                $('#correo_usuario').attr('disabled', 'disabled');
                $('#telefono_usuario').attr('disabled', 'disabled');
                $('#direccion_usuario').attr('disabled', 'disabled');


                $('#nombre_usuario').removeClass('border-lime-500');
                $('#apellido_p_usuario').removeClass('border-lime-500');
                $('#apellido_m_usuario').removeClass('border-lime-500');
                $('#region_usuario').removeClass('border-lime-500');
                $('#comuna_usuario').removeClass('border-lime-500');
                $('#correo_usuario').removeClass('border-lime-500');
                $('#telefono_usuario').removeClass('border-lime-500');
                $('#direccion_usuario').removeClass('border-lime-500');


                $('#nombre_usuario').addClass('border-red-500');
                $('#apellido_p_usuario').addClass('border-red-500');
                $('#apellido_m_usuario').addClass('border-red-500');
                $('#region_usuario').addClass('border-red-500');
                $('#comuna_usuario').addClass('border-red-500');
                $('#correo_usuario').addClass('border-red-500');
                $('#telefono_usuario').addClass('border-red-500');
                $('#direccion_usuario').addClass('border-red-500');

                $('.user-input').removeClass('border-black border-opacity-20 border-lime-500');

                $('.user-input').addClass('border-black border-opacity-20');
            });
        });




        $(document).ready(function() {
            $('#guardar').on('click', function() {
                //sweet alert
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Se modificaran los datos de tu cuenta",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, guardar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#datos_usuario').submit();
                    }
                })
            });
        });

        $(document).ready(function() {
            $('.pendiente').on('click', function() {
                //swalfire
                Swal.fire({
                    title: 'Lo Sentimos',
                    text: "Debe esperar unos diás más para calificar su compra",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar'
                })

            });
        });

        $('#telefono_usuario').on('input', function() {
            var telefono = $(this).val();
            telefono = telefono.replace(/[^0-9]/g, '');
            $(this).val(telefono);
            if (telefono.length > 9) {
                $(this).val(telefono.substring(0, 9));
            }
            if (telefono.length > 0) {
                if (telefono[0] != '9') {
                    $('#error-telefono-usuario').removeClass('hidden');
                    $('#guardar').attr('id', 'no_guardar');
                } else {
                    $('#error-telefono-usuario').addClass('hidden');
                    $('#no_guardar').attr('id', 'guardar');
                }
            }
        });

        $("#region_usuario").change(function() {
            var regionSeleccionada = $(this).val();
            $("#comuna_usuario option").hide();
            $("#comuna_usuario option[data-region='" + regionSeleccionada + "']").show();
            $("#comuna_usuario").val("");


        });

        $(document).ready(function() {
            $('#cancelar-cambiar-contraseña').click(function() {
                $('#cambiar-contraseña-modal').addClass('hidden');
            });

            $('#overlay-modal-cambiar-contraseña').click(function() {
                $('#cambiar-contraseña-modal').addClass('hidden');
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                text: '{{ session('success') }}'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                text: '{{ session('error') }}'
            });
        </script>
    @endif


    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#cambiar-contraseña-modal').removeClass('hidden');
            });
        </script>
    @endif
@endsection
