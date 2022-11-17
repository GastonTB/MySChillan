@extends('layaouts.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection
@section('modales')
<div class="hidden" id="modal-oferta">
    <div class="z-40 fixed bg-black h-screen w-screen bg-opacity-40"></div>
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <button type="button" class="absolute top-3 right-2.5">
                    <i class="fa fa-x"></i>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 id="nombre-modal" class="mb-4 text-xl font-bold text-gray-900 "></h3>
                    <form class="space-y-6" action="#">
                        <div class="flex justify-evenly">
                            <div>
                                <label class="block" for="">Precio Antiguo</label>
                                <input id="precio-antiguo" class="block" disabled>
                            </div>
                            <div>
                                <label class="block" for="">Precio Oferta</label>
                                <input id="precio-oferta" step="1" class="text-center block border-2 rounded-md bg-gray-200"  name="" style="width: 50%">
                            </div>
                        </div>
                        <div class="justify-evenly flex">
                            <div>
                                <label for="">Fecha Inicio</label>
                                <input class="bg-gray-200 p-2 rounded-md" type="date" name="" id="fecha-ini">
                            </div>
                            <div>
                                <label for="">Fecha Fin</label>
                                <input class="bg-gray-200 p-2 rounded-md" type="date" name="" id="fecha-ter">
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="btn-primary">Crear Oferta</button>
                        </div>
                    </form>
                </div>
            </div>
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
                        <th id="nombre-producto" scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$producto->nombre_producto}}
                        </th>
                        <td id="precio-producto" class="py-4 px-6">
                            ${{$producto->precio}}
                        </td>
                        <td class="py-4 px-6">
                            {{$producto->cantidad}}
                        </td>
                        <td class="py-4 px-6">
                            {{$producto->categoria->nombre_categoria}}
                        </td>
                        <td class="py-4 px-6">
                            <button id ="{{$producto->id}}" class="boton-oferta btn-tienda">
                                Agregar
                            </button>
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
<script>
    $('.boton-oferta').click(function(){
        id = $(this).attr('id');
        $('#modal-oferta').removeClass('hidden');
        var precio = $('#precio-producto').text();
        var nombre = $('#nombre-producto').text();
        precio = $.trim(precio);
        nombre = $.trim(nombre);
        $('#nombre-modal').text('Crear Oferta para '+ nombre);
        $('#precio-antiguo').val(precio);
        console.log($('#fecha-ini').val());
    
    });

    // $('#precio-oferta').keyup(function(){
    //     var val = parseInt($(this).val());
    //     var precio = $('#precio-producto').text().replace(/[$'.']/g, '');
    //     precio = $.trim(precio);
    //     precio = parseInt(precio);
    //     console.log('precio'+precio);
    //     console.log('val'+val);
    //     console.log(typeof(val));
    //     $('#precio-oferta').on('change', function(){
        
    //     if(val<0)
    //     {
    //         $(this).val(0);
    //     }
    //     if(val>precio)
    //     {
    //         console.log('')
    //         $(this).val(precio);
    //     }
    //     val = val.toLocaleString();
    //     $(this).val(val);
    // });
    // });

   $('#precio-oferta').keyup( function(){
       var precio = $('#precio-producto').text().replace(/[$'.']/g, '');
       precio = $.trim(precio);
       var precio = parseInt(precio);
       console.log(typeof(precio));
       var val = $(this).text().replace(/[$'.']/g, '');
       var val = parseInt($(this).val());
       if(isNaN(val)){
        val = 0;
       }
       if(val<0)
       {
           val = 0;
       }
       if(val>precio)
       {    
            val = precio-1;
       }
       val = val.toLocaleString();
       $('#precio-oferta').val(val);
       console.log(val);
   });

   $(window).on('load', function(){
    console.log($('#fecha-ini').val());
   });
</script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
@endsection