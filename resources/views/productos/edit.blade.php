@extends('layaouts.master')
@section('css')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection
@section('content')
    <div class="flex justify-center">
        <p class="text-3xl font-semibold mt-3 mb-10">
            Editar Producto: {{ $producto->nombre_producto }}
        </p>
    </div>
    <div>

        <form id="formulario_editar" action="{{ route('editarProducto2', $producto->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-4 lg:grid-cols-8 xl:grid-cols-6">
                <div
                    class="md:col-span-2 md:col-start-1 lg:col-start-2 xl:col-start-2 lg:col-span-3 xl:col-span-2 md:pl-5 lg:pl-0 mb-10 md:mb-0 order-1 md:order-1">
                    <div class="mt-5 px-5">
                        <label class="relative">
                            <input name="nombre" value="{{ old('nombre', $producto->nombre_producto) }}" type="text"
                                class="border-2 text-gray-700 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                placeholder=" " id="nombre">
                            <span
                                class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                Nombre del Producto
                            </span>
                        </label>
                        <div class="">
                            <span class="xl:text-sm md:text-md" style="color:red"><small>
                                    @error('nombre')
                                        {{ $message }}
                                    @enderror
                                </small></span>
                        </div>
                    </div>
                    <div class="mt-5 px-5">
                        <div class="flex space-x-5">
                            <div>
                                <label class="relative">
                                    <input name="precio"
                                        value="{{ old('precio', '$' . number_format($producto->precio, 0, ',', '.')) }}"
                                        type="text"
                                        class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                        placeholder=" " id="precio">
                                    <span
                                        class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                        Precio
                                    </span>
                                </label>
                                <div class="">
                                    <span class="xl:text-sm md:text-md" style="color:red"><small>
                                            @error('precio')
                                                {{ $message }}
                                            @enderror
                                        </small></span>
                                </div>
                            </div>

                            <div>
                                <label class="relative">
                                    <input name="cantidad" value="{{ old('cantidad', $producto->cantidad) }}" type="text"
                                        class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200"
                                        placeholder=" " id="cantidad">
                                    <span
                                        class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                        Cantidad
                                    </span>
                                </label>
                                <div class="">
                                    <span class="xl:text-sm md:text-md" style="color:red"><small>
                                            @error('cantidad')
                                                {{ $message }}
                                            @enderror
                                        </small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 mt-10 px-5">
                        <div class="mt-5">
                            <label for="">
                                <p id="titulo" class="text-lg text-gray-700 mb-2">
                                    Categorias:
                                </p>
                            </label>
                            <div class="pl-5">
                                @foreach ($categorias as $categoria)
                                    <div>
                                        <input id="{{ $categoria->id }}" name="categorias" value="{{ $categoria->id }}"
                                            class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input
              appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none
              transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                            type="radio"
                                            @if (old('categorias') === null && $producto->categoria_id == $categoria->id) checked
       @elseif(old('categorias') == $categoria->id)
           checked @endif>

                                        <label class="text-gray-700"
                                            for="">{{ $categoria->nombre_categoria }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <span class="text-sm md:text-md" style="color:red">
                                <small>
                                    @error('categorias')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </span>
                        </div>
                    </div>

                </div>
                <div
                    class="md:col-span-2 md:col-start-3 g:col-start-5 lg:col-span-3 xl:col-start-4 xl:col-span-2 md:pl-10 lg:pl-0 order-3 md:order-2">
                    <input value="{{ $imagenes }}" name="cantidad_imagenes" id="cantidad_imagenes" type="hidden"
                        data-cantidad="{{ $imagenes }}">
                    <div class="grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="flex justify-center space-x-5 px-5 mt-5">
                                <div>
                                    <div>
                                        <img id="preview-imagen-1"
                                            src="{{ asset('storage/imagenes/' . $producto->imagenes[0]) }}" alt="">
                                        <input type="hidden" id="imagen_oculta_1" name="imagen_oculta_1">
                                    </div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Imagen
                                        1</label>
                                    <input accept="image/png, image/jpeg, image/jpeg" name="imagen_1" id="imagen-1"
                                        class="pendiente pendiente block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                        type="file">
                                    <span class="text-sm" style="color:red"><small>
                                            @error('imagen_1')
                                                {{ $message }}
                                            @enderror
                                        </small></span>
                                </div>



                                <div class="flex items-end">

                                    <button id="borrar-1">
                                        <i id="borrar-boton-1"
                                            class="fa fa-trash borrar hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400 hidden pb-2"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="alerta-1" class="px-5 hidden">
                                <span class="text-sm md:text-md" style="color:red"><small>La imagen debe tener una
                                        proporcion de 3:4 (ancho:alto)</small></span>
                            </div>
                            <div id="formato-1" class="px-5 hidden">
                                <span class="text-sm md:text-md" style="color:red"><small>Formato de archivo no soportado,
                                        formatos soportados 'jpg', 'png', 'jpeg'</small></span>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex justify-center space-x-5 px-5 mt-5">

                                <div>
                                    <div>
                                        <img id="preview-imagen-2"
                                            @if (isset($producto->imagenes[1])) src="{{ asset('storage/imagenes/' . $producto->imagenes[1]) }}"
                                    @else
                                        src="" @endif
                                            alt="">
                                        <input type="hidden" id="imagen_oculta_2" name="imagen_oculta_2">
                                    </div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Imagen
                                        2</label>
                                    <input accept="image/png, image/jpeg, image/jpeg" name="imagen_2" id="imagen-2"
                                        class="pendiente block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                        type="file">
                                    <span class="text-sm" style="color:red"><small>
                                            @error('imagen_2')
                                                {{ $message }}
                                            @enderror
                                        </small></span>

                                </div>
                                <div class="flex items-end">

                                    <button id="borrar-2">
                                        <i id="borrar-boton-2"
                                            class="fa fa-trash borrar hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400 hidden pb-2"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="alerta-2" class="px-5 hidden">
                                <span class="text-sm md:text-md" style="color:red"><small>La imagen debe tener una
                                        proporcion de 3:4 (ancho:alto)</small></span>
                            </div>
                            <div id="formato-2" class="px-5 hidden">
                                <span class="text-sm md:text-md" style="color:red"><small>Formato de archivo no soportado,
                                        formatos soportados 'jpg', 'png', 'jpeg'</small></span>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex justify-center space-x-5 px-5 mt-5">

                                <div>
                                    <div>
                                        <img id="preview-imagen-3"
                                            @if (isset($producto->imagenes[2])) src="{{ asset('storage/imagenes/' . $producto->imagenes[2]) }}"
                                    @else
                                        src="" @endif
                                            alt="">
                                        <input type="hidden" id="imagen_oculta_3" name="imagen_oculta_3">
                                    </div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Imagen
                                        3</label>
                                    <input accept="image/png, image/jpeg, image/jpeg" name="imagen_3" id="imagen-3"
                                        class="pendiente block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                        type="file">
                                    <span class="text-sm" style="color:red"><small>
                                            @error('imagen_3')
                                                {{ $message }}
                                            @enderror
                                        </small></span>

                                </div>
                                <div class="flex items-end">

                                    <button id="borrar-3">
                                        <i id="borrar-boton-3"
                                            class="fa fa-trash borrar hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400 hidden pb-2"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="alerta-3" class="px-5 hidden">
                                <span class="text-sm md:text-md" style="color:red"><small>La imagen debe tener una
                                        proporcion de 3:4 (ancho:alto)</small></span>
                            </div>
                            <div id="formato-3" class="px-5 hidden">
                                <span class="text-sm md:text-md" style="color:red"><small>Formato de archivo no soportado,
                                        formatos soportados 'jpg', 'png', 'jpeg'</small></span>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex justify-center space-x-5 px-5 mt-5">

                                <div>
                                    <div>
                                        <img id="preview-imagen-4"
                                            @if (isset($producto->imagenes[3])) src="{{ asset('storage/imagenes/' . $producto->imagenes[3]) }}"
                                @else
                                    src="" @endif
                                            alt="">
                                        <input type="hidden" id="imagen_oculta_4" name="imagen_oculta_4">
                                    </div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Imagen
                                        4</label>
                                    <input accept="image/png, image/jpeg, image/jpeg" name="imagen_4" id="imagen-4"
                                        class="pendiente block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                        type="file">
                                    <span class="text-sm" style="color:red"><small>
                                            @error('imagen_4')
                                                {{ $message }}
                                            @enderror
                                        </small></span>
                                    <span class="text-sm" style="color:red"><small>
                                            @error('cantidad_imagen')
                                                {{ $message }}
                                            @enderror
                                        </small></span>

                                </div>
                                <div class="flex items-end">

                                    <button id="borrar-4">
                                        <i id="borrar-boton-4"
                                            class="fa fa-trash borrar hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400 hidden pb-2"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="alerta-4" class="px-5 hidden">
                                <span class="text-sm md:text-md" style="color:red"><small>La imagen debe tener una
                                        proporcion de 3:4 (ancho:alto)</small></span>
                            </div>
                            <div id="formato-4" class="px-5 hidden">
                                <span class="text-sm md:text-md" style="color:red"><small>Formato de archivo no soportado,
                                        formatos soportados 'jpg', 'png', 'jpeg'</small></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="md:col-start-2 lg:col-start-3 xl:col-start-3 md:col-span-2 lg:col-span-4 xl:col-span-2 order-2 md:oder-3 px-5 md:px-0">
                    <div class="flex justify-center">
                        <div class="mt-0 md:mt-5">
                            <ul
                                class="pestañas flex flex-wrap text-xs md:font-medium text-center text-gray-500 border-b border-gray-200">
                                <li id="descripcion"
                                    class="xl:mr-2 inline-block p-4 sm:p-2 text-lime-500 bg-gray-100 rounded-t-xl active">
                                    <a href="#" aria-current="page">Descripción</a>
                                </li>
                                <li id="temporada"
                                    class="xl:mr-2 inline-block p-4 sm:p-2 rounded-t-xl hover:text-gray-600 hover:bg-gray-100">
                                    <a href="#">Temporada</a>
                                </li>
                                <li id="caracteristicas"
                                    class="xl:mr-2 inline-block p-4 sm:p-2 rounded-t-xl hover:text-gray-600 hover:bg-gray-100">
                                    <a href="#">Caracteristicas</a>
                                </li>
                                <li id="cuidados"
                                    class="xl:mr-2 inline-block p-4 sm:p-2 rounded-t-xl hover:text-gray-600 hover:bg-gray-100">
                                    <a href="#">Cuidados</a>
                                </li>
                            </ul>
                            <div class="text mb-10">
                                <textarea id="descripcion-text" class="border-2 texto" name="descripcion_text" id="" cols="49"
                                    rows="7">{{ old('descripcion_text', $producto->descripcion[0]) }}</textarea>
                                <div id="temporada-text" class="texto hidden">
                                    @if ($temporadas != null)
                                        <div class="mt-5">
                                            <input name="temporada_text[]" value="1"
                                                @if ($temporadas != null && in_array(1, $temporadas)) checked @endif
                                                @if (is_array(old('temporada_text')) && in_array(1, old('temporada_text'))) checked @endif
                                                class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox">
                                            <label for="">Otoño</label>
                                        </div>
                                        <div>
                                            <input name="temporada_text[]" value="2"
                                                @if ($temporadas != null && in_array(2, $temporadas)) checked @endif
                                                @if (is_array(old('temporada_text')) && in_array(2, old('temporada_text'))) checked @endif
                                                class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox">
                                            <label for="">Invierno</label>
                                        </div>
                                        <div>
                                            <input name="temporada_text[]" value="3"
                                                @if ($temporadas != null && in_array(3, $temporadas)) checked @endif
                                                @if (is_array(old('temporada_text')) && in_array(3, old('temporada_text'))) checked @endif
                                                class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox">
                                            <label for="">Primavera</label>
                                        </div>
                                        <div>
                                            <input name="temporada_text[]" value="4"
                                                @if ($temporadas != null && in_array(4, $temporadas)) checked @endif
                                                @if (is_array(old('temporada_text')) && in_array(4, old('temporada_text'))) checked @endif
                                                class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox">
                                            <label for="">Verano</label>
                                        </div>
                                    @else
                                        <div class="mt-5">
                                            <input name="temporada_text[]" value="1"
                                                @if (is_array(old('temporada_text')) && in_array(1, old('temporada_text'))) checked @endif
                                                class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox">
                                            <label for="">Otoño</label>
                                        </div>
                                        <div>
                                            <input name="temporada_text[]" value="2"
                                                @if (is_array(old('temporada_text')) && in_array(2, old('temporada_text'))) checked @endif
                                                class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox">
                                            <label for="">Invierno</label>
                                        </div>
                                        <div>
                                            <input name="temporada_text[]" value="3"
                                                @if (is_array(old('temporada_text')) && in_array(3, old('temporada_text'))) checked @endif
                                                class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox">
                                            <label for="">Primavera</label>
                                        </div>
                                        <div>
                                            <input name="temporada_text[]" value="4"
                                                @if (is_array(old('temporada_text')) && in_array(4, old('temporada_text'))) checked @endif
                                                class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox">
                                            <label for="">Verano</label>
                                        </div>
                                    @endif
                                </div>
                                <textarea id="caracteristicas-text" class="border-2 texto hidden" name="caracteristicas_text" id=""
                                    cols="49" rows="7">{{ old('caracteristicas_text', $producto->descripcion[1]) }}</textarea>

                                <textarea id="cuidados-text" class="border-2 texto hidden" name="cuidados_text" id="" cols="49"
                                    rows="7">
@if ($temporadas != null)
{{ old('cuidados_text', $producto->descripcion[2]) }}
@else
{{ old('cuidados_text') }}
@endif
</textarea>
                                <div>
                                    <span class="text-sm" style="color:red"><small>
                                            @error('cuidados_text')
                                                {{ $message }}
                                            @enderror
                                        </small></span>
                                </div>
                                <div>
                                    <span class="text-sm" style="color:red"><small>
                                            @error('descripcion_text')
                                                {{ $message }}
                                            @enderror
                                        </small></span>
                                </div>
                                <div>
                                    <span class="text-sm" style="color:red"><small>
                                            @error('temporada_text')
                                                {{ $message }}
                                            @enderror
                                        </small></span>
                                </div>
                                <div>
                                    <span class="text-sm" style="color:red"><small>
                                            @error('caracteristicas_text')
                                                {{ $message }}
                                            @enderror
                                        </small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-4 lg:grid-cols-8 xl:grid-cols-6">

            </div>
            <div class="flex justify-center pb-10 pt-10 md:pt-0">
                <button class="btn-tienda">
                    editar producto
                </button>
            </div>
        </form>
        <form id="form-eliminar" action="{{ route('borrarImagen', $producto->id) }}" method="POST">
            @csrf
            <input id="numero" type="hidden" name="imagen">
        </form>
        <div id="regla" class="text-white select-none">
            <div id="regla-1" class="regla md:hidden">
                1
            </div>
            <div id="regla-2" class="regla marker:hidden md:block lg:hidden">
                2
            </div>
            <div id="regla-3" class="regla hidden lg:block xl:hidden">
                3
            </div>
            <div id="regla-4" class="regla hidden xl:block">
                4
            </div>
        </div>
    </div>

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            if ($('.categoria')[5].checked || $('.categoria')[6].checked || $('.categoria')[7].checked) {
                $('#temporada').addClass('hidden');
                $('#cuidados').addClass('hidden');
            }
        });

        $(document).ready(function() {
            $('.borrar').click(function(event) {
                var id = $(this).attr('id');
                var valores = id.split('-');
                var ultimoValor = parseInt(valores[valores.length - 1]);
                console.log(ultimoValor);
                $('#numero').val(ultimoValor);
                event.preventDefault();
                Swal.fire({
                    title: '¿Está seguro de que desea borrar esta imagen?',
                    text: "Este cambio será permanente y no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#38c172',
                    cancelButtonColor: '#e3342f',
                    confirmButtonText: 'Sí, borrar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-eliminar').submit();
                        console.log($('#form-eliminar').attr('action'));

                    }
                });
            });
        });

        $(document).ready(function() {
            for (let i = 1; i < 5; i++) {
                if ($('#preview-imagen-' + i).attr('src') != "") {
                    $('#borrar-boton-' + i).removeClass('hidden');
                    $('#imagen_oculta_' + i).val('original');
                } else {
                    $('#imagen_oculta_' + i).val('vacio');
                }
            }
        });

        $(document).ready(function() {
            $('input:file').on('change', function() {
                var numero = $(this).attr('id').split('-')[1];
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    //append mensaje
                    $('#formato-' + numero).removeClass('hidden');
                    $('#preview-imagen-' + numero).attr('src', '');
                    $('#borrar-boton-' + numero).addClass('hidden');
                    $(this).val('');
                    return false;
                } else {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);

                    function imageIsLoaded(e) {
                        var img = new Image();
                        img.src = e.target.result;
                        img.onload = function() {
                            var width = this.width;
                            var height = this.height;
                            if (width / height != 0.75) {
                                var alerta = '#alerta-' + numero;
                                $(alerta).removeClass('hidden');
                                $('#preview-imagen-' + numero).attr('src', '');
                                $('#imagen-' + numero).val('');
                                $('#borrar-boton-' + numero).addClass('hidden');
                                $('#imagen_oculta_' + numero).val('vacio');
                                return false;
                            } else {
                                var preview = '#preview-imagen-' + numero;
                                $(preview).attr('src', e.target.result);
                                $(preview).attr('width', '100%');
                                $(preview).attr('height', '100%');
                                var borrar = '#borrar-boton-' + numero;
                                $(borrar).removeClass('hidden');
                                var alerta = '#alerta-' + numero;
                                $(alerta).addClass('hidden');
                                $('#formato-' + numero).addClass('hidden');
                                $('#imagen_oculta_' + numero).val('nueva');
                            }
                        };
                    };
                }
            });
        });

        // $(document).ready(function() {
        //     var contador = $('#cantidad_imagenes').data('cantidad');
        //     $('.borrar').on('click', function() {
        //         var id = $(this).attr('id');
        //         //last char of id
        //         var id = id.substr(id.length - 1);
        //         contador = contador - 1;

        //         //launch sweetalert
        //         Swal.fire({
        //             title: '¿Estás seguro?',
        //             text: "Esta acción no tendra efecto real hasta que se envie el formulario",
        //             icon: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: 'rgb(132 204 22)',
        //             cancelButtonColor: 'rgb(244 63 94)',
        //             confirmButtonText: '¡Sí, bórralo!'
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 Swal.fire(
        //                     '¡Borrado!',
        //                     'La Imagen ha sido borrada',
        //                     'success'
        //                 )

        //                 $('#preview-imagen-' + id).attr('src', '');
        //                 $('#borrar-boton-' + id).addClass('hidden');
        //                 $('#imagen-' + id).val('');
        //             }
        //         })
        //         $('#cantidad_imagenes').val(contador);
        //         $('#imagen_oculta_' + id).val('borrada');
        //     });
        //     $('input:file').on('change', function() {
        //         contador = contador + 1;
        //         $('#cantidad_imagenes').val(contador);
        //         $('#imagen_oculta_' + id).val('no borrada');

        //     });
        // });


        $(document).ready(function() {

            if ($('#regla-1').is(':visible')) {
                $('#descripcion-text').attr('cols', 38);
                $('#caracteristicas-text').attr('cols', 38);
                $('#cuidados-text').attr('cols', 38);
            } else if ($('#regla-2').is(':visible')) {
                $('#descripcion-text').attr('cols', 70);
                $('#caracteristicas-text').attr('cols', 70);
                $('#cuidados-text').attr('cols', 70);
            } else if ($('#regla-3').is(':visible')) {
                $('#descripcion-text').attr('cols', 100);
                $('#caracteristicas-text').attr('cols', 100);
                $('#cuidados-text').attr('cols', 100);
            } else if ($('#regla-4').is(':visible')) {
                $('#descripcion-text').attr('cols', 100);
                $('#caracteristicas-text').attr('cols', 100);
                $('#cuidados-text').attr('cols', 100);
            }

        });

        $(document).ready(function() {

            $('.categoria').on('change', function() {
                //if is checked 
                if ($(this).is(':checked')) {
                    $('#titulo').removeClass('text-gray-700');
                    $('#titulo').addClass('text-lime-500');
                } else {
                    $('#titulo').removeClass('text-lime-500');
                    $('#titulo').addClass('text-gray-700');
                }
            });
        });

        $(document).ready(function() {
            $('.pestañas > li').on('click', function() {
                $('.pestañas > li').not(this).removeClass('text-lime-500');
                $('.pestañas > li').not(this).removeClass('bg-gray-100');
                //add active to this
                $(this).addClass('text-lime-500');
                $(this).addClass('bg-gray-100');
                //show forms
                var id = $(this).attr('id');
                $('.texto').addClass('hidden');
                $('#' + id + '-text').removeClass('hidden');

                // $('.texto').(this).removeClass('hidden');


            });
        });

        $(document).ready(function() {
            $('input:file').on('change', function() {
                var numero = $(this).attr('id').split('-')[1];
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    //append mensaje
                    $('#formato-' + numero).removeClass('hidden');
                    $('#preview-imagen-' + numero).attr('src', '');
                    $('#borrar-boton-' + numero).addClass('hidden');
                    $(this).val('');
                    return false;
                } else {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);

                    function imageIsLoaded(e) {
                        var img = new Image();
                        img.src = e.target.result;
                        img.onload = function() {
                            var width = this.width;
                            var height = this.height;
                            if (width / height != 0.75) {
                                //alert('La imagen debe tener una proporcion de 3:4 (ancho:alto)');
                                var alerta = '#alerta-' + numero;
                                $(alerta).removeClass('hidden');
                                $('#imagen-' + numero).val('');
                                return false;
                            } else {
                                var preview = '#preview-imagen-' + numero;
                                $(preview).attr('src', e.target.result);
                                $(preview).attr('width', '100%');
                                $(preview).attr('height', '100%');
                                var borrar = '#borrar-boton-' + numero;
                                $(borrar).removeClass('hidden');
                                var alerta = '#alerta-' + numero;
                                $(alerta).addClass('hidden');
                                $('#formato-' + numero).addClass('hidden');
                            }
                        };
                    };
                }
            });
        });


        $(document).ready(function() {
            $('#nombre').on('change', function() {
                //capitalize first letter
                var nombre = $('#nombre').val();
                var nombre = nombre.charAt(0).toUpperCase() + nombre.slice(1);
                var nombre = nombre.replace(/[^a-zA-Z\u00C0-\u00FF ]/g, "");
                $('#nombre').val(nombre);

            });

        });

        $(document).ready(function() {
            //if categoria is checked no other can be cheked
            $('.categoria').on('change', function() {
                if ($(this).prop('checked') == true) {
                    $('.categoria').not(this).prop('checked', false);
                }
                if ($('.categoria')[5].checked || $('.categoria')[6].checked || $('.categoria')[7]
                    .checked) {
                    $('#temporada').addClass('hidden');
                    $('#temporada').removeClass('bg-gray-100');
                    $('#temporada').removeClass('text-lime-500');
                    $('#temporada-text').addClass('hidden');
                    $('#cuidados').addClass('hidden');
                    $('#cuidados').removeClass('bg-gray-100');
                    $('#cuidados').removeClass('text-lime-500');
                    $('#cuidados-text').addClass('hidden');
                    $('#descripcion-text').removeClass('hidden');
                    $('#descripcion').addClass('bg-gray-100');
                    $('#descripcion').addClass('text-lime-500');
                    $('#caracteristicas-text').addClass('hidden');
                    $('#caracteristicas').removeClass('bg-gray-100');
                    $('#caracteristicas').removeClass('text-lime-500');

                } else {
                    $('#temporada').removeClass('hidden');
                    $('#cuidados').removeClass('hidden');
                }
            });
        });

        $(document).ready(function() {

            $('#precio').on('keyup', function(e) {
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
                //add dollar
                precio3 = '$' + precio3;
                $(this).val(precio3);
            });

        });

        $('#cantidad').on('keyup', function() {

            let cantidad = $(this).val();
            //if array[0] == 0 delete it
            if (cantidad[0] == 0) {
                cantidad = cantidad.slice(1);
            }
            let cantidad2 = cantidad.replace(/[^0-9]/g, '');
            if (cantidad2 == NaN) {
                cantidad2 = 1;
            }
            if (cantidad2 < 0) {
                cantidad2 = 0;
            }
            if (cantidad2 > 1000) {
                cantidad2 = 1000;
            }
            if (cantidad2 == '') {
                cantidad2 = 0;
            }
            $(this).val(cantidad2);
        });
    </script>
@endsection
@endsection
