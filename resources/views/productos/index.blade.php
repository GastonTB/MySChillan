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
                <form id="form-oferta" action="{{route('crear-oferta')}}" method="POST">
                    @csrf
                    <div id="method"></div>
                    
                    <input type="hidden" name="id_producto" id="id-producto" value="">
                    <div class="grid grid-cols-2 mb-5">
                        <div class="col-span-1">
                            <div class="md:px-10 px-3">
                                <input type="hidden" name="precio_antiguo_hidden" id="precio-antiguo-hidden">
                                <label class="relative">
                                    <input disabled id="precio-antiguo" name="precio_antiguo" type="text" class=" border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                    <span class="text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text borde">
                                        Precio Producto
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="md:px-10 px-3">
                                <label class="relative">
                                    <input required id="precio-oferta" name="oferta" value="{{old('oferta')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                    <span class="borde text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                        Precio Oferta
                                    </span>
                                </label>
                            </div>
                            <div class="md:px-10 px-3">
                                <span class="text-sm errores" style="color:red"><small>@error('oferta'){{$message}}@enderror</small></span>
                                <span class="text-sm errores" style="color:red"><small>@error('precio_oferta_oculto'){{$message}}@enderror</small></span>
                                @if(session()->has('error_oferta'))
                                <span class="text-sm errores" style="color:red"><small>{{session()->get('error_oferta')}}</small></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-10">
                        <div class="col-span-1">
                            <div class="md:px-10 px-3">
                                <label class="relative">
                                    <input autocomplete="off" required id="fecha_ini" name="fecha_ini" value="{{old('fecha_ini')}}" type="text" class="datepicker border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                    <span class="text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text borde">
                                        Fecha Inicio
                                    </span>
                                </label>
                            </div>
                            <div class="md:px-10 px-3">
                                <span class="text-sm errores" style="color:red"><small>@error('fecha_ini'){{$message}}@enderror</small></span>
                                <span class="text-sm errores" style="color:red"><small>@error('fecha_ini_oculto'){{$message}}@enderror</small></span>
                                @if(session()->has('error_fi'))
                                <span class="text-sm errores" style="color:red"><small>{{session()->get('error_fi')}}</small></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="md:px-10 px-3">
                                <label class="relative">
                                    <input autocomplete="off" required id="fecha_ter" name="fecha_ter" value="{{old('fecha_ter')}}" type="text" class="datepicker border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                    <span class="text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text borde">
                                        Fecha Fin
                                    </span>
                                </label>
                            </div>
                            <div class="md:px-10 px-3">
                                <span class="text-sm errores" style="color:red"><small>@error('fecha_ter'){{$message}}@enderror</small></span>
                                <span class="text-sm errores" style="color:red"><small>@error('fecha_ter_oculto'){{$message}}@enderror</small></span>
                                @if(session()->has('error_ft'))
                                <span class="text-sm errores" style="color:red"><small>{{session()->get('error_ft')}}</small></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center m-10 crear acciones-1">
                        <button id="crear-oferta" type="button" class="btn-tienda">
                            Crear Oferta
                        </button>
                    </div>
                </form>
                    <div class="flex justify-evenly m-10 hidden editar acciones-2">
                        <div>
                            <form id="form-editar" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="precio_oferta_oculto" id="precio-oferta-oculto">
                                <input type="hidden" name="fecha_ini_oculto" id="fecha-ini-oculto">
                                <input type="hidden" name="fecha_ter_oculto" id="fecha-ter-oculto">
                                <button id="editar-oferta" type="button" class="btn-tienda">
                                    Editar Oferta
                                </button>
                            </form>
                        </div>
                 
                        <form id="form-eliminar" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button id="eliminar-oferta" type="button" class="btn-tienda">
                                Eliminar Oferta
                            </button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

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
                Aumentar stock para Producto:
            </div>
            <div class="flex justify-center mb-5 text-lg md:text-lg lg:text-xl font-bold " id="nombre-modal-cantidad">

            </div>
            <form id="form-stock" method="POST">
                @csrf
                @method('PUT')
                <div class="flex justify-center my-5 space-x-3">
                    <div id="menos" class="flex items-center py-2 px-3 border-2 bg-lime-500 text-white rounded-md active:bg-white active:text-lime-500">
                        <i class="fa fa-minus"></i>
                    </div>
                    <input name="cantidad_stock" id="cantidad-producto-modal" class="py-2 px-3 border-2 w-20 text-center" type="text">
                    <div id="mas" class="flex items-center py-2 px-3 border-2 bg-lime-500 text-white rounded-md active:bg-white active:text-lime-500">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="flex justify-center">
                    <span class="text-sm errores mb-5" style="color:red"><small>@error('cantidad_stock'){{$message}}@enderror</small></span>
                </div>
                <div class="flex justify-center mb-10">
                    <button class="btn-tienda">
                        Aumentar Stock
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
            <a class="text-lime-500" href="{{route('backoffice')}}">Back Office</a> / 
                <a class="text-lime-500" href="{{route('listado-productos')}}">Lista de Productos</a>
        </div>
            <div class="flex justify-center">
                <p class="text-3xl font-bold my-3">
                    Listado de Productos
                </p>
            </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 mb-3">
            <div class="col-span-1 col-start-1 lg:col-start-1">
                <div class="flex justify-start relative">
                    <button class="btn-tienda orden">
                        Ordenar
                    </button>
                    <div class="absolute left-0 top-10 w-full md:w-7/10 lg:w-7/10 xl:w-1/2 ordenar hidden">
                        <div class=" bg-white border-2 border-lime-500 rounded-md">
                            <a href="{{route('ordenar',1)}}"  class="block py-2 px-3 text-gray-700 hover:text-white active:text-white hover:bg-lime-500 active:bg-lime-500 ">Ordenar por Nombre</a>
                            <a href="{{route('ordenar',2)}}"  class="block py-2 px-3 text-gray-700 hover:text-white active:text-white hover:bg-lime-500 active:bg-lime-500 ">Ordenar por Precio</a>
                            <a href="{{route('ordenar',3)}}"  class="block py-2 px-3 text-gray-700 hover:text-white active:text-white hover:bg-lime-500 active:bg-lime-500 ">Ordenar por Categoria</a>
                            <a  href="{{route('ordenar',4)}}" class="block py-2 px-3 text-gray-700 hover:text-white active:text-white hover:bg-lime-500 active:bg-lime-500 ">Ordenar por Stock</a>
                            <a href="{{route('ordenar',5)}}"  class="block py-2 px-3 text-gray-700 hover:text-white active:text-white hover:bg-lime-500 active:bg-lime-500 ">Ordenar por Más Recientes</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1 col-start-2 lg:col-start-4">
                
                <form action="{{route('buscarProductoAdmin')}}" method="POST">
                    <div class="flex justify-end">
                        @csrf
                        <label class="relative">
                            <input name="buscar" type="text" class=" border-2 rounded-l-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                            <span class="text-opacity-30 text-gray-700 absolute text-xs md:text-sm left-0 top-3 mx-3 px-2 transition duration-200 input-text">
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
                            Agregar Stock
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
                        <td id="nombre-producto-{{$producto->id}}" scope="row" class="line py-4 px-6 font-medium text-gray-700 whitespace-nowrap ">
                          <a href="{{route('detalles', $producto->id)}}">
                            @if(strlen($producto->nombre_producto) > 20)
                                {{substr($producto->nombre_producto, 0, 20)}}...
                            @else
                                {{$producto->nombre_producto}}
                            @endif       
                          </a>                                                                                                                              
                        </td>
                        <td id="precio-producto-{{$producto->id}}" class="py-4 px-6">
                            ${{$producto->precio}}
                        </td>
                        <td id="cantidad-producto-{{$producto->id}}" class="py-4 px-6">
                            {{$producto->cantidad}}
                        </td>
                        <td class="py-4 px-6">
                            {{$producto->categoria->nombre_categoria}}
                        </td>
                        <td class="py-4 px-6">
                           @if ($producto->oferta_id == 0)
                           <button id ="{{$producto->id}}" class="boton-oferta btn-tienda">
                            Agregar
                            </button>
                            @else
                                <button id ="{{$producto->id}}" class="boton-detalle btn-tienda">
                                    Ver Oferta
                                </button>
                           @endif
                        </td>
                        <td id="oferta-id-{{$producto->id}}" class="py-4 px-6 hidden">
                            @if($producto->oferta_id != 0)
                                {{$producto->oferta->id}}
                            @endif
                        <td class="py-4 px-6 hidden" id="oferta-hidden-{{$producto->id}}">
                            @if($producto->oferta_id != 0)
                                ${{$producto->oferta->precio_oferta}}
                            @endif
                        </td>
                        <td class="py-4 px-6 hidden" id="fecha-inicio-hidden-{{$producto->id}}">
                            @if($producto->oferta_id != 0)
                                {{$producto->oferta->fecha_inicio}}
                            @endif
                        </td>
                        <td class="py-4 px-6 hidden" id="fecha-termino-hidden-{{$producto->id}}">
                            @if($producto->oferta_id != 0)
                                {{$producto->oferta->fecha_fin}}
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <button id="boton-stock-{{$producto->id}}" class="btn-tienda stock">
                                Agregar
                            </button>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-center">
                                <a href="{{route('editarProducto', $producto->id)}}" class="btn-tienda flex space-x-2">
                                   <p>Editar</p><i class="fa fa-pencil"></i>
                                </a>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-center">
                                <form id="form-borrar-{{$producto->id}}" action="{{route('borrarProducto', $producto->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button id="boton-borrar-producto-{{$producto->id}}" type="button" class="borrar btn-tienda bg-red-500 px-10">
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
            {{$productos->links()}}
        </div>
    </div>
    <div class="container w-full md:w-4/5 xl-3/5 mx-auto px-2 mt-10 overflow-auto">
        @if(count($productos) == 0)
        <div class="bg-white border-b flex justify-center">
            <div  class=" text-gray-900 text-xl font-bold md:text-2xl">
                No hay productos con ese nombre
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

    $(document).ready(function(){
        $('#mas').on('click', function(){
            var cantidad = $('#cantidad-producto-modal').val();
            cantidad = parseInt(cantidad);
            if(cantidad<1000){
                cantidad = cantidad + 1;
            }
            $('#cantidad-producto-modal').val(cantidad);
        });
        $('#menos').on('click', function(){
            var cantidad = $('#cantidad-producto-modal').val();
            cantidad = parseInt(cantidad);
            if(cantidad > 0){
                cantidad = cantidad - 1;
            }
            $('#cantidad-producto-modal').val(cantidad);
        });
    });

    $(document).ready(function(){
        $('.stock').on('click', function(){
            id = $(this).attr('id');
            id = id.replace('boton-stock-', '');
            $('#form-stock').attr('action', 'http://18.220.82.247/aumentar-stock/'+id);
            $('#producto-id').val(id);
            $('#modal-cantidad').removeClass('hidden');
            var nombre = $('#nombre-producto-'+id).text();
            $('#nombre-modal-cantidad').text(nombre);
            var cantidad = $('#cantidad-producto-'+id).text();
            cantidad = $.trim(cantidad);
            $('#cantidad-producto-modal').val(cantidad);
            $('#cantidad-producto-modal').on('keyup',function(){
                this.value = this.value.replace(/[^0-9]/g,'');
                if(this.value>1000){
                    this.value = 1000;
                }
            });
        });
    });

    $(document).ready(function(){
        $('.orden').on('click', function(){
            $('.ordenar').removeClass('hidden');
        });
        //click on anything else
        $(document).on('click', function(e){
            if(!$(e.target).closest('.orden').length){
                $('.ordenar').addClass('hidden');
            }
        });
    });

    $(document).ready(function(){
        $('#cerrar-modal-cantidad').on('click', function(){
            $('#modal-cantidad').addClass('hidden');
            $('.errores').addClass('hidden');
        });
        $('#overlay-modal-cantidad').on('click', function(){
            $('#modal-cantidad').addClass('hidden');
            $('.errores').addClass('hidden');
        });
    });

    $(document).ready(function(){
        $('.borrar').on('click', function(){
            id = $(this).attr('id');
            id = id.replace('boton-borrar-producto-', '');
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar producto!'
            }).then((result) => {
                if (result.isConfirmed) {
                   $('#form-borrar-'+id).submit();
                }
            });
        });
    });

    $(document).ready(function(){
        $('#crear-oferta').on('click', function(){
            if($('#precio-oferta').val() == '' || $('#fecha_ini').val() == '' || $('#fecha_ter').val() == ''){
                $('#crear-oferta').attr('type', 'submit');
            }else{
           
                $('#crear-oferta').attr('type', 'button');
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
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

    

    $('.boton-detalle').on('click', function(){
        var id = $(this).attr('id');
        $('#modal-oferta').removeClass('hidden');
        var precio = $('#precio-producto-'+id).text();
        var nombre = $('#nombre-producto-'+id).text();
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
        var oferta_id = $('#oferta-id-'+id).text();
        oferta_id = $.trim(oferta_id);
        oferta_id = $.trim(oferta_id);
        $('#editar-oferta').on('click', function(){
            console.log(oferta_id);
            $('#precio-oferta').attr('disabled', false);
            $('#fecha_ini').attr('disabled', false);
            $('#fecha_ter').attr('disabled', false);
            $(this).text('Guardar');
            //swal fire
            $('#editar-oferta').on('click', function(){
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
                        $('#form-editar').attr('action', 'http://18.220.82.247/editar-oferta/'+oferta_id);
                        $('#form-editar').submit();
                    }
                });
            });
            
        });
        $('#eliminar-oferta').on('click', function(){
            $('#form-eliminar').attr('action', 'http://18.220.82.247/borrar-oferta/'+oferta_id);
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar oferta!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-eliminar').submit();
                }
            })
        });
  
    });

    @if(session()->get('message') == 'error-cantidad')
        $('#modal-cantidad').removeClass('hidden');
        $('#cantidad-producto-modal').val('{{session('cantidad')}}');
    @endif
   
    @if(session()->get('message')=='error-oferta-editar')
        $('#modal-oferta').removeClass('hidden');
        $('.editar').removeClass('hidden');
        $('.crear').addClass('hidden');
        $('#nombre-modal').text('{{session('nombre')}}');
        $('#precio-antiguo').val('$'+'{{session('precio_antiguo')}}');
        $('#id-producto').val('{{session('id_producto')}}');
        $('#precio-antiguo-hidden').val('{{session('precio_antiguo')}}');
        $('#precio-oferta').val('{{session('precio_oferta')}}');
        $('#fecha_ini').val('{{session('fecha_ini')}}');
        $('#fecha_ter').val('{{session('fecha_ter')}}');
        var oferta_id = {{Session::get('id_oferta')}};
        oferta_id = $.trim(oferta_id);
        oferta_id = $.trim(oferta_id);
        console.log(oferta_id);
        $('#editar-oferta').on('click', function(){
            console.log(oferta_id);
            $('#precio-oferta').attr('disabled', false);
            $('#fecha_ini').attr('disabled', false);
            $('#fecha_ter').attr('disabled', false);
            $(this).text('Guardar');
            //swal fire
            $('#editar-oferta').on('click', function(){
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
                        $('#form-editar').attr('action', 'http://18.220.82.247/editar-oferta/'+oferta_id);
                        $('#form-editar').submit();
                    }
                });
            });
            
        });
        $('#eliminar-oferta').on('click', function(){
            $('#form-eliminar').attr('action', 'http://18.220.82.247/borrar-oferta/'+oferta_id);
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar oferta!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-eliminar').submit();
                }
            })
        });
    @endif


    @if (session()->get('message') == 'error-oferta')
        $('#modal-oferta').removeClass('hidden');
        $('#nombre-modal').text('{{session('nombre')}}');
        $('#precio-antiguo').val('$'+'{{session('precio_antiguo')}}');
        $('#id-producto').val('{{session('id_producto')}}');
        $('#precio-antiguo-hidden').val('{{session('precio_antiguo')}}');
    @endif

    $(document).ready(function(){
        $("#fecha_ini").datepicker({
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'y-m-d',
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
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
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

    $(document).ready(function(){
        $('#overlay-modal-oferta').on('click', function(){
            $('#modal-oferta').addClass('hidden');
            $('.errores').addClass('hidden');
            $('.crear').removeClass('hidden');
            $('.editar').addClass('hidden');
            $('#editar-oferta').text('editar oferta');
            $('#precio-oferta').val('');
            $('#fecha_ini').val('');
            $('#fecha_ter').val('');
        });
        $('#cerrar-modal-oferta').on('click', function(){
            $('#modal-oferta').addClass('hidden');
            $('.errores').addClass('hidden');
            $('.crear').removeClass('hidden');
            $('.editar').addClass('hidden');
            $('#editar-oferta').text('editar oferta');
        });
    });
    
    $(document).ready(function(){
        var date = new Date();
        $('#fecha_ini').datepicker('option', 'minDate', date);
    });

    $('#fecha_ini').on('change', function(){
        $('#fecha_ter').removeAttr("disabled");
        var fecha_ini_min = $('#fecha_ini').datepicker('getDate');
        var fecha_ter_min = new Date();
        fecha_ter_min.setDate(fecha_ini_min.getDate() + 1);
        $('#fecha_ter').datepicker('option', 'minDate', fecha_ter_min);
    });
    let id;

    $(document).ready(function(){
        $('#fecha_ini').on('change', function(){
            var fecha_ini = $('#fecha_ini').val();
            $('#fecha-ini-oculto').val(fecha_ini);
        });
    });

    $(document).ready(function(){
        $('#fecha_ter').on('change', function(){
            var fecha_ter = $('#fecha_ter').val();
            $('#fecha-ter-oculto').val(fecha_ter);
        });
    });

    $('.boton-oferta').click(function(){
        $('#precio-oferta').prop('disabled', false);
        $('#fecha_ini').prop('disabled', false);
        $('#fecha_ter').prop('disabled', false);
        var id = $(this).attr('id');
        $('#modal-oferta').removeClass('hidden');
        var precio = $('#precio-producto-'+id).text();
        var nombre = $('#nombre-producto-'+id).text();
        //if nombre strlen > 30 make nombre 30 char
        precio = $.trim(precio);
        nombre = $.trim(nombre);
        $('#nombre-modal').text(nombre);
        $('#precio-antiguo').val(precio);
        var precio_antiguo = precio.replace(/[$'.']/g, '');
        $('#precio-antiguo-hidden').val(precio_antiguo);
        $('#id-producto').val(id);
        $('.acciones-2').addClass('hidden');
        $('.acciones-1').removeClass('hidden');
    });

    $('#precio-oferta').on('keyup', function(e){
        let precio = $(this).val();
        //remove dollar
        precio = precio.replace('$', '');
        let precio2 = precio.replace(/[^0-9]/g, '');
        
        if(precio2 == NaN){
            precio2 = 1;
        }
        if(precio2<0){
            precio2 = 0;
        }
        if(precio2>100000){
            precio2 = 100000;
        }
        let precio3 = precio2.toString();
        precio3 = precio3.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        //if first char is 0 remove it
        if(precio3.charAt(0) == '0'){
            precio3 = precio3.substring(1);
        }
        //add dollar
        precio3 = '$'+precio3;
        $(this).val(precio3);
        $('#precio-oferta-oculto').val(precio3);
    });



</script> 
@endsection