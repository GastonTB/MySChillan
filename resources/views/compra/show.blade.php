@extends('layaouts.master')

@section('content')

<div class="md:grid xl:grid-cols-5 mb-10 lg:grid-cols-7">
    <div class="lg:col-start-2 xl:col-span-3 lg:col-span-5 xl:col-start-2">
        <div class="md:grid xl:grid-cols-3 mt-10">
            <div class="col-start-1 col-span-3">
                <p class="md:text-3xl text-xl font-black text-gray-700 px-5 lg:px-0">
                    FINALIZAR COMPRA
                </p>
                <form action="{{route('webpayPagar')}}" method="POST">
                @csrf

                    <div class="lg:grid grid-cols-3">
                        <div class="col-start-1 col-span-2">
                            <div class="mt-5 lg:pr-10 px-5 py-5 lg:py-0 text-gray-700 space-y-2">
                                <p class="font-black text-lg  border-b border-black border-opacity-10 pb-2">
                                    Detalles de Facturación
                                </p>
                                <div class="">
                                    <div id="direcciones" class="cols-span-2">
                                        <div id="direccion_antigua" class="space-y-2 break-all">
                                            <div class="flex">
                                                <p class="font-bold mr-2">
                                                   Nombre:
                                                </p>
                                                <div class="md:space-x-2 md:flex break-all">
                                                   <p> {{$user->name}}</p> <p>
                                                    {{$meta->apellido_paterno}}</p> 
                                                    <p>{{$meta->apellido_materno}}</p>
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <p class="font-bold mr-2">
                                                    Región: 
                                                </p>
                                                <p>
                                                    {{$region_user->nombre_region}}
                                                </p>
                                            </div>
                                            <div class="flex">
                                                <p class="font-bold mr-2">
                                                    Comuna: 
                                                </p>
                                                <p>
                                                    {{$comuna_user->nombre_comuna}}
                                                </p>
                                            </div>
                                            <div class="flex">
                                                <p class="font-bold mr-2">
                                                    Dirección: 
                                                </p>
                                                <p>
                                                    {{$meta->direccion}}
                                                </p>
                                            </div>
                                            <div class="flex">
                                                <p class="font-bold mr-2">
                                                    Télefono: 
                                                </p>
                                                <p>
                                                    {{$meta->telefono}}
                                                </p>
                                            </div>
                                            <div class="flex break-words" style="word-wrap:break-word">
                                                {{-- if $user->email overflow break line --}}
                                                <p class="font-bold mr-2">
                                                    Email:
                                                </p>
                                                <p class="break-all">
                                                    {{$user->email}}
                                                </p>
                                            </div>
                                        </div>
                                        <div id="direccion_nueva" class="hidden space-y-4">
                                            <div class="flex">
                                                <p class="font-bold mr-2">
                                                   Nombre:
                                                </p>
                                                <div class="md:space-x-2 md:flex break-all">
                                                   <p> {{$user->name}}</p> <p>
                                                    {{$meta->apellido_paterno}}</p> 
                                                    <p>{{$meta->apellido_materno}}</p>
                                                </div>
                                            </div>
                                               <div>
                                                <label class="relative">
                                                    <select name="region" id="regiones_envio" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2.5 px-5 transition duration-200">
                                                        @foreach ($regiones as $region)
                                                            <option
                                                            value="{{$region->id}}">
                                                                {{$region->nombre_region}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                        Región
                                                    </span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="relative">
                                                    <select name="comuna" id="comunas_envio" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2.5 px-5 transition duration-200">
                                                        @foreach ($comunas as $comuna)
                                                            <option
                                                            value="{{$comuna->region_id}}">
                                                                {{$comuna->nombre_comuna}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                        Comuna
                                                    </span>
                                                </label>
                                                <span class="text-sm" style="color:red"><small>@error('comuna'){{$message}}@enderror</small></span>
                                            </div>
                                            <div>
                                                <label class="relative">
                                                    <input name="direccion" value="{{old('direccion')}}"  type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                    <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                        Dirección
                                                    </span>
                                                </label>
                                                <span class="text-sm" style="color:red"><small>@error('direccion'){{$message}}@enderror</small></span>
                                            </div>
                                            <div>
                                                <label class="relative">
                                                    <input name="correo" value="{{old('correo')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                    <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                        Correo
                                                    </span>
                                                </label>
                                                <span class="text-sm" style="color:red"><small>@error('correo'){{$message}}@enderror</small></span>
                                            </div>
                                            <div>
                                                <label class="relative">
                                                    <input name="telefono" value="{{old('telefono')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                    <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                        Teléfono
                                                    </span>
                                                </label>
                                                <span class="text-sm" style="color:red"><small>@error('telefono'){{$message}}@enderror</small></span>

                                            </div>
                                        </div>
                                        <div class="my-5">
                                            <input hidden  id="nueva" name="direccion_radio" value="1" type="radio">
                                            <input hidden checked id="vieja" name="direccion_radio" value="2" type="radio">
                                            <div class="flex justify-center">
                                                <a id="boton_nuevo" class="btn-tienda hidden">
                                                    Agregar Nuevos Datos de Envío
                                                </a>
                                            </div>
                                            <div class="flex justify-center">
                                                <a id="boton_viejo" class="btn-tienda hidden">
                                                    Usar Datos Antiguos
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <div class="flex justify-center">
                                            <h3 class="mb-3 text font-bold text-gray-700">Tipo de Envío:</h3>
                                        </div>
                                        <div class="grid w-full md:grid-cols-2 gap-5 h-full">
                                            <div>
                                                <input checked type="radio" id="retiro_tienda" name="envio" value="1" class="hidden peer">
                                                <label for="retiro_tienda" class="inline-flex items-center justify-between w-full p-5 text-gray-700 bg-gray-100 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-lime-600 hover:text-lime-500 hover:border-lime-500 hover:bg-gray-100">
                                                    <div class="block">
                                                        <div class="w-full font-semibold">Retiro en tienda <i class="fa-solid fa-store"></i></div>
                                                        <div class="w-full text-xs">
                                                            <p>Retire su Compra en Pasaje Ñiquen 2795, Chillan.</p>
                                                            <p>Horario de Atención: Lunes a Viernes de 10:00 a 18:00 hrs.</p>
                                                        </div>
                                                    </div>
                                                    
                                                </label>
                                            </div>
                                            <div class=" relative h-max">
                                                
                                                <input type="radio" id="domicilio" name="envio" value="2" class="hidden peer" required>
                                                <label for="domicilio" class="inline-flex items-center justify-between w-full p-5 text-gray-700 bg-gray-100 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-lime-600 hover:text-lime-500 hover:border-lime-500 hover:bg-gray-100">  
                                                            
                                                                        
                                                    <div class="block">
                                                        <div class="w-full font-semibold">Envío por pagar <i class="fa-sharp fa-solid fa-truck-fast"></i></div>
                                                        <div class="w-full text-xs">El envio será manejado por Starken a la dirección que nos proporciona, el valor del envio será manejado por Starken</div>
                                                    </div>
                                                    
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-span-1 border-2 px-5 pt-5 mx-5 lg:mx-0 relative h-min">
                            <div>
                                <p class="font-black text-gray-700 text-lg">
                                    Tu Pedido
                                </p>
                            </div>
                            <div class="columns-2 pt-5">
                                <div>
                                    <p class="text-gray-700 font-semibold">
                                        Producto
                                    </p>
                                </div>
                                <div>
                                    <p class="text-gray-700 font-semibold">
                                        Subtotal
                                    </p>
                                </div>
                            </div>
                            @for($i=0; $i<count($carrito);$i++)
                            <div class="columns-2 text-green-500 py-2 border-b">
                                <div class="flex items-center space-x-2">
                                    <div>
                                        {{$carrito[$i]['nombre_producto']}} 
                                    </div> 
                                    <div>
                                        <p class="text-sm"> x </p>
                                    </div> 
                                   <div>
                                    <p class="text-sm">{{$carrito[$i]['pivot']['cantidad_carrito']}}</p>
                                   </div>
                                </div>
                                <div>
                                    @php
                                        $subtotal = $carrito[$i]['precio'] * $carrito[$i]['pivot']['cantidad_carrito']
                                        
                                    @endphp
                                    ${{number_format($subtotal,0,',','.')}}
                                </div>
                            </div>
                            @endfor
                            <div class="columns-2 my-5">
                                <div>
                                    Subtotal
                                </div>
                                <div>
                                    ${{number_format($carro['total'],0,',','.')}}
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-center">
                                    <img class="w-52" src="{{asset('img/logos/1.WebpayPlus_FB_800px.png')}}" alt="">
                                </div>
                                <div class="flex justify-center mt-3 pb-5 mb-5">
                                    <button class="btn-tienda">
                                        PAGAR
                                    </button>
                                </div>
                                
                            </div>
                        </div>  
                    
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')


    <script>
        // $(document).ready(function(){
        //     $('#vieja').prop('checked', true);
        // });
        @if(session()->get('message') == 'error')
            $('#direccion_nueva').removeClass('hidden');
            $('#direccion_antigua').addClass('hidden');
            $('#boton_nuevo').addClass('hidden');
            $('#boton_viejo').removeClass('hidden');
            $('#nueva').prop('checked', true);
            //check radio domicilio
            $('#domicilio').prop('checked', true);
        @endif
        //when the page is load auto check id vieja
        
        $(document).ready(function(){
            $('#boton_nuevo').click(function(){
                $('#direccion_antigua').addClass('hidden');
                $('#direccion_nueva').removeClass('hidden');
                $('#boton_nuevo').addClass('hidden');
                $('#boton_viejo').removeClass('hidden');
                $('#nueva').prop('checked', true);
            });
            $('#boton_viejo').click(function(){
                $('#direccion_antigua').removeClass('hidden');
                $('#direccion_nueva').addClass('hidden');
                $('#boton_nuevo').removeClass('hidden');
                $('#boton_viejo').addClass('hidden');
                $('#vieja').prop('checked', true);
            });
        });

        $(document).ready(function(){
           //if retiro_tienda is checked do something
              $('#retiro_tienda').click(function(){
                 if($(this).is(':checked')){
                    //show button nuevo
                    $('#boton_nuevo').addClass('hidden');
                    $('#boton_viejo').addClass('hidden');
                    $('#direccion_nueva').addClass('hidden');
                    $('#direccion_antigua').removeClass('hidden');
                 }
                });
                //if retiro_tienda is not checked do something
                $('#domicilio').click(function(){
                 if($(this).is(':checked')){
                     //hide boton nuevo y boton viejo
                     //check if boton viejo not has class hidden
                        if(!$('#boton_viejo').hasClass('hidden')){
                        }else{
                            $('#boton_nuevo').removeClass('hidden');
                        }
                     //focus screen in direcciones id
                        $('html, body').animate({
                            scrollTop: $("#direcciones").offset().top
                        }, 1000);


                 }
                });
        });

        $(document).ready(function(){
            //when regiones_envio change comunas_envio to show only the comunas with region_id
            $('#regiones_envio').change(function(){
                //filter comunas with region_id
                var region_id = $(this).val();
                var comunas = @json($comunas);
                var comunas_filtradas = comunas.filter(comuna => comuna.region_id == region_id);
                //remove all options
                $('#comunas_envio').find('option').remove();
                //add new options
                for (let i = 0; i < comunas_filtradas.length; i++) {
                    $('#comunas_envio').append('<option value="'+comunas_filtradas[i].id+'">'+comunas_filtradas[i].nombre_comuna+'</option>');
                }

            });
        });
    </script>
@endsection