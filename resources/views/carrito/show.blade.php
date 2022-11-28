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

<div class="grid grid-cols-5 w-full gap-4 grid-flow-row mt-5 mb-10">
    <div class="col-start-2 col-span-2 mt-5">
        <div class="bg-gray-100 rounded-sm">
            <div class="text-gray-700 font-semibold text-xl uppercase pt-2 pl-5">
                CARRITO
            </div>
            <input id="cantidadTotal" type="hidden" data-cantidad="{{count($carrito)}}">
            @for ($i=0; $i < count($carrito); $i++)
                <div class="flex py-5 pl-5 relative">
                    <div>
                        @auth
                            <input type="hidden" name="id[]" value="{{$carrito[$i]['id']}}">
                        @endauth
                        @guest
                            <input type="hidden" name="id[]" val="{{$carrito[$i]['producto_id']}}">
                        @endguest
                        <img class="h-28 rounded-sm" src="{{asset('storage/imagenes/'.$carrito[$i]['imagenes'])}}" alt="">
                    </div>
                    <div>
                        <ul class="pl-5">
                            <li  id="precio{{$i}}" data-precio="{{$carrito[$i]['precio']}}" 
                            @auth
                                data-cantidad="{{$carrito[$i]['pivot']['cantidad_carrito']}}"
                            @endauth
                            @guest
                                data-cantidad="{{$carrito[$i]['cantidad_carrito']}}"
                            @endguest class="precio text-lg font-semibold text-gray-700 flex">
                                ${{number_format($carrito[$i]['precio'], 0, ',', '.')}}
                            </li>
                            <li class="text-lg text-gray-700">
                                {{$carrito[$i]['nombre_producto']}}
                            </li>
                            <li class="text-sm text-gray-500  mb-2">

                                ({{$carrito[$i]['categoria']}})

                            </li>
                            <li class="text-lg text-gray-700  mb-2">
                                @auth
                                <div class="flex space-x-1">
                                    <div id="menos{{$i}}" class="flex boton items-center justify-end text-lime-500 font-black cursor-pointer">
                                        <i class="fa fa-minus"></i>
                                    </div>
                                    <div class="border-2" style="width:20%">
                                        <input name="cantidad" id="cantidad{{$i}}" min="1" value="{{$carrito[$i]['pivot']['cantidad_carrito']}}" placeholder="1" type="number" name="" id="" class="border-2 text-gray-500 text-center text-sm" style="width: 100%; height:100%">
                                    </div>
                                    <div id="mas{{$i}}" class="flex boton items-center justify-end text-lime-500 font-black cursor-pointer">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                                @endauth
                                @guest
                                <div class="flex space-x-1">
                                    <div id="menos{{$i}}" class="flex boton items-center justify-end text-lime-500 font-black cursor-pointer">
                                        <i class="fa fa-minus"></i>
                                    </div>
                                    <div class="border-2" style="width:20%">
                                        <input id="cantidad{{$i}}" id="cantidad{{$i}}" min="1" value="{{$carrito[$i]['cantidad_carrito']}}" placeholder="1" type="number" name="" id="" class="border-2 text-gray-500 text-center text-sm" style="width: 100%; height:100%">
                                    </div>
                                    <div id="mas{{$i}}" class="flex boton items-center justify-end text-lime-500 font-black cursor-pointer">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                                @endguest
                            </li>
                        </ul>
                    </div>
                    <div class="absolute top-p right-5">
                        @auth
                        @php
                        $id_producto = $carrito[$i]['id']
                        @endphp
                    @endauth
                    @guest
                        @php    
                        $id_producto = $carrito[$i]['producto_id']
                        @endphp
                    @endguest
                        <form action="{{route('borrarProductoCarro',$id_producto)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="fa fa-trash hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400"></button>
                        </form>

                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="col-span-1 mt-5 bg-gray-50 rounded-sm">
        <div class="uppercase text-gray-700 text-xl font-semibold pt-2 pl-5">
            Total
        </div>
        <div class="uppercase mt-10 text-gray-700 font-semibold pl-5">
            <ul class="space-y-3">
                <li class="flex items-center">
                    <p>Sub-total: </p> &nbsp; <p id="subtotal" class="text-lime-500 text-lg">
                    </p>
                </li>
                <li class="flex">
                   <div class="flex items-start">
                        <p> Envío: </p>
                   <div class="px-5 mb-5">
                    <label class="relative">
                        <select id="envio" name="envio" class="font-medium bg-gray-50 border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1 px-5 transition duration-200">
                            <option disabled selected>Seleccione una opción</option>
                            <option value="0">Retiro En Tienda (Gratis)</option>
                            <option value="1"><i class="fa fa-shipping-fast"></i> A Domicilio (Envio por Pagar)</option>
                        </select>
                        <span class="font-medium normal-case text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select-invitado">
                            Envio
                        </span>
                    </label>
                </div>
                </div>
                   &nbsp;
                   <div id="info" class="hidden relative flex items-start">
                    <small class="text-lime-500 ml-2 pr-2">
                        <i class="fa fa-xl fa-info-circle"></i>
                    </small>
                    <div id="mensaje-alerta" class="normal-case absolute hidden font-medium h-100 top-0 right-2 w-64  bg-white text-gray-700 text-sm p-2 rounded-sm shadow-lg">El envio sera manejado por Starken, precio para la Region del Ñuble es de $5.000, para las demas regiones es de $10.000</div>
                   </div>
                </li>
            </ul>
        </div>
        <div id="retiro-tienda" class="text-gray-700 px-3 text-sm hidden">
            <div class="flex justify-center">
                <p>
                    Retire su Compra en Pasaje Ñiquen 2795, Chillan.
                </p>
            </div>
            <div class="flex justify-center">
                <p>
                    Horario de Atención: Lunes a Viernes de 10:00 a 18:00 hrs.
                </p>
            </div>
        </div>
        <div>
            
            {{-- ingresar --}}
                <div id="datos" class="hidden">
                    <div class="flex justify-center mt-5 mb-5 text-lg font-semibold text-gray-700">
                        <p>
                            Ingrese Sus datos
                        </p>
                    </div>
                    <div class="px-5 mb-5">
                        <label class="relative">
                            <input name="nombre" value="{{old('nombre')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none bg-gray-50 focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-invitado">
                                Nombre
                            </span>
                        </label>
                    </div>
                    <div class="px-5 mb-5">
                        <label class="relative">
                            <input name="apellido_paterno" value="{{old('apellido_paterno')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none bg-gray-50 focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-invitado">
                                Apellido Paterno
                            </span>
                        </label>
                    </div>
                    <div class="px-5 mb-5">
                        <label class="relative">
                            <input name="apellido_materno" value="{{old('apellido_materno')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none bg-gray-50 focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-invitado">
                                Apellido Materno
                            </span>
                        </label>
                    </div>
                    <div class="px-5 mb-5">
                        <label class="relative">
                            <input name="correo" value="{{old('correo')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none bg-gray-50 focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-invitado">
                                Correo
                            </span>
                        </label>
                    </div>
                    <div class="px-5 mb-5">
                        <label class="relative">
                            <input name="telefono" value="{{old('telefono')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none bg-gray-50 focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-invitado">
                                Teléfono
                            </span>
                        </label>
                    </div>
                    <div class="px-5 mb-5">
                        <label class="relative">
                            <input name="telefono" value="{{old('telefono')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none bg-gray-50 focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-invitado">
                                Dirección
                            </span>
                        </label>
                    </div>
                    <div class="px-5 mb-5">
                        <label class="relative">
                            <select name="region" id="region" class=" bg-gray-50 border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2.5 px-5 transition duration-200">
                                @foreach ($regiones as $region)
                                    <option value="{{$region->id}}">
                                        {{$region->nombre_region}}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select-invitado">
                                Región
                            </span>
                        </label>
                    </div>
                    <div class="px-5 mb-5">
                        <label class="relative">
                            <select name="comuna" id="comuna" class="bg-gray-50 border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2 px-5 transition duration-200">
                                @foreach ($comunas as $comuna)
                                    <option id="opciones" value="{{$comuna->region_id}}">
                                        {{$comuna->nombre_comuna}}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select-invitado">
                                Comuna
                            </span>
                        </label>
                    </div>
                </div>
        </div>
        <div>
            {{-- button btn-primary pagar --}}
            <div class="flex justify-center pb-5">
                <button class="bg-lime-500 text-white font-semibold text-lg uppercase py-2 px-4 rounded-sm mt-5">
                    Pagar
                </button>
                <noscript>
                    ACTIVE JAVASCRIPT
                </noscript>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>

        const cantidadTotal = $('#cantidadTotal').data('cantidad');
        var precios = [];
        var cantidades = [];
        var total = 0;
        
        //on load page
        function calculoInicial(){
            for(let i=0; i<cantidadTotal; i++){
                precios.push($('#precio'+i).data());
                cantidades.push($('#cantidad'+i).val());
            }
        }

        $(document).ready(function(){
            var total = calculoInicial();
            for(let i=0; i<cantidadTotal; i++){
                total += precios[i].precio * cantidades[i];
            }
            $('#total').text(total);
        });

        $(document).ready(function(){
            $('#info').hover(function(){
                $('#mensaje-alerta').css('display', 'block');
            }, function(){
                $('#mensaje-alerta').css('display', 'none');
            });
        });

        $(document).ready(function(){
            var total = 0;
            for(let i=0; i<cantidadTotal; i++){
                total += precios[i]['precio'] * cantidades[i];
            }
            $('#subtotal').data('precio', total);
            total = total.toString();
            total = total.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
            total = '$'+total;
            $('#subtotal').text(total);
        });


        $(document).ready(function(){
            $('#envio').on('change', function(){
                var envio = $('#envio').val();
                if(envio == 1){
                    $('#retiro-tienda').hide('slow');
                    $('#info').removeClass('hidden');
                }else{
                    $('#info').addClass('hidden');
                    $('#retiro-tienda').show('slow');
                }
                $('#datos').show('slow');                
                var region = selectRegion2();
                total = calcularTotal();
            });
        });
        
        $(document).ready(function(){
            $('#region').on('change', function(){
                let total = calcularTotal();
            });
        });
 

        $(document).ready(function(){
            $('.boton').on('click', function(){
                var id = $(this).attr('id');
                //last char
                var id = id.substr(id.length - 1);
                var tipo = $(this).attr('id');
                //todo menos el ultimo char
                var tipo = tipo.substr(0, tipo.length - 1);
                var cantidad = $('#cantidad'+id).val();
                //string to int
                cantidad = parseInt(cantidad);
                if(tipo == 'mas'){
                    cantidad = cantidad + 1;
                    $('#cantidad'+id).val(cantidad);
                    cantidades[id] = cantidad;
                    total = calcularTotal();

                }else{
                    if(cantidad > 1){
                        cantidad = cantidad - 1;
                        $('#cantidad'+id).val(cantidad);
                        cantidades[id] = cantidad;
                        total = calcularTotal();
                    }
                }
            });
        });

        
        function calcularTotal(){
            var tot = 0;
            for(var i = 0; i < cantidadTotal; i++){
                tot+= precios[i]['precio'] * cantidades[i];
            }
            if($('#envio').val() == 0){
                tot = tot
            }else if($('#envio').val()==1){
                if($('#region').val()==10){
                    tot = tot +5000;
                }else{
                    tot = tot +10000;
                }
            }else{
                tot = tot;
            }
            tot = tot.toString();
            tot = tot.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
            tot = '$'+tot;
            $('#subtotal').text(tot);
            console.log(tot);
        }



        function selectRegion2(){
            var region = $('#region');
            var comuna = $('#comuna');
            var options = comuna.find('option');

            region.on( 'change', function() {
                comuna.html( options.filter( '[value="' + this.value + '"]' ) );
            } ).trigger( 'change' );
        }

        

        // var opciones = [];
        // var nombres = [];
        // $(document).ready(function(){
        //     $('#comuna option').each(function(){
        //         opciones.push($(this).val());
        //     });
        //     $('#comuna option').each(function(){
        //         let nombre = $(this).text();
        //         //remove black space at the begining
        //         nombre = nombre.trim();
        //         nombre = nombre.replace(/(\r\n|\n|\r)/gm,"");
        //         nombres.push(nombre);
        //     });
        // });



    </script>
@endsection