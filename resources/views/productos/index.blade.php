@extends('layaouts.master')

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection
@section('modales')

    <div id="modal-oferta" class="hidden">
        <div id="overlay-modal-oferta" class="z-40 fixed h-screen w-screen bg-black opacity-40"></div>
        <div class="flex justify-center">
            <div class="top-1/12 z-50 w-4/5 md:w-1/2 lg:w-1/4 bg-white fixed rounded-md">
                <form action="{{route('crear-oferta')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid"> 
                        <div class="flex justify-center pt-5 mb-10">
                            <p class="text-2xl font-bold" id="nombre-modal">
                            </p>
                        </div>
                        <div class="">
                            <div class="px-3">
                                <div class="grid grid-cols-7 w-full">
                                    <div class="col-start-2 col-end-4">
                                        <div>
                                            {{-- precio antiguo --}}
                                            <label class="block mb-2 text-xs font-medium text-gray-900">Precio Normal</label>
                                            <input id="precio-antiguo" class="border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400"  disabled>
                                        </div>
                                    </div>
                                    <div>

                                    </div>
                                    <div class="col-start-5 col-end-7 flex items-end">
                                        <div class="">
                                            {{-- precio nuevo --}}
                                            <label class="block mb-2 text-xs font-medium text-gray-900">Precio Oferta</label>
                                            <input autocomplete="off" name="oferta" type="text" id="precio-oferta" class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400" >
                                            <span class="text-sm" style="color:red"><small>@error('oferta'){{$message}}@enderror</small></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="px-3">
                                <div class="grid md:grid-cols-7 grid-cols-9 w-full">
                                    <div class="col-start-2 md:col-end-4 col-end-5">
                                        <div>
                                            <label class="block mb-2 text-xs font-medium text-gray-900">Fecha Inicio</label>
                                            <input  readonly="readonly" name="fecha_ini" autocomplete="off" id="fecha_ini" class="border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400" >
                                            <span class="text-sm" style="color:red"><small>@error('fecha_ini'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                    <div>

                                    </div>
                                    <div class="md:col-start-5 md:col-end-7 col-start-6 col-end-9 flex items-end">
                                        <div class="">
                                            <label class="block mb-2 text-xs font-medium text-gray-900">Fecha Fin</label>
                                            <input  readonly="readonly" name="fecha_ter" autocomplete="off" name="fecha_ter" type="text" id="fecha_ter" class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400"  disabled>
                                            <span class="text-sm" style="color:red"><small>@error('fecha_ter'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input name="id_producto" id="id-producto" hidden>
                        <div class="mx-auto my-10 flex items-center">
                            <button type="submit" class="text-lg font-bold px-6 py-2.5 bg-lime-500 text-white rounded hover:bg-white hover:text-lime-500 hover:shadow-lg ">Crear Oferta</button>
                        </div>
                    </div>
                </form>    
            </div>
         </div>
    </div>
@endsection
@section('content')
    <div class="flex justify-center">
        <p class="text-3xl font-bold my-3">
            Listado de Productos
        </p>
    </div>
    <div class="container w-full md:w-4/5 xl-3/5 mx-auto px-2">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            Oferta
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th id="nombre-producto-{{$producto->id}}" scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$producto->nombre_producto}}
                        </th>
                        <td id="precio-producto-{{$producto->id}}" class="py-4 px-6">
                            ${{$producto->precio}}
                        </td>
                        <td class="py-4 px-6">
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
                        <td class="py-4 px-6">
                            <button class="btn-tienda">
                                Agregar
                            </button>
                        </td>
                        <td class="py-4 px-6">
                            <div class="bg-white">
                                <i class="fa fa-pencil"></i>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>

<script>

    @if (session()->get('message') == 'error-oferta')
        $('#modal-oferta').show();
        $('#nombre-modal').text('Crear Oferta para ' + '{{session('nombre')}}');
        $('#precio-antiguo').val('$'+'{{session('precio_antiguo')}}');
        $('#id-producto').val('{{session('id_producto')}}');
    @endif

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

    $('.boton-oferta').click(function(){
        var id = $(this).attr('id');
        console.log(id);
        $('#modal-oferta').removeClass('hidden');
        var precio = $('#precio-producto-'+id).text();
        var nombre = $('#nombre-producto-'+id).text();
        precio = $.trim(precio);
        nombre = $.trim(nombre);
        $('#nombre-modal').text('Crear Oferta para '+ nombre);
        $('#precio-antiguo').val(precio);
        $('#id-producto').val(id);
    });

    $('#precio-oferta').keyup( function(){

        var precio_antiguo = $('#precio-antiguo').val();
        precio_antiguo = $('#precio-antiguo').val().replace(/[$'.']/g, '');
        var val = $('#precio-oferta').val();
        val = $(this).val().replace(/[$'.']/g, '');
        val = parseInt(val);
        precio_antiguo = parseInt(precio_antiguo);
        
        if(isNaN(val))
        {
            val = 0;
        }

        if(val<0){
            val = 0;
        }

        if(val>precio_antiguo)
        {
            val = precio_antiguo-1;
        }
        
        val = val.toLocaleString();

        console.log(typeof(val));

        $(this).val('$'+val);
    });



</script> 
@endsection