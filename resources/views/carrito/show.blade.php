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

<div class="grid xl:grid-cols-5 lg:grid-cols-7 md:grid-cols-4 gap-5 mt-10 px-5 lg:px-0">
    <div class="lg:col-start-2 lg:col-span-3 xl:col-start-2 md:col-span-3 xl:col-span-2 bg-gray-100 order-1">
        <div class="bg-gray-100 rounded-sm">
            <div class="text-gray-700 font-semibold text-xl uppercase pt-2 pl-5">
                CARRITO
            </div>
            <input type="hidden" id="cantidad-total" data-cantidad="{{count($carrito)}}">
            @for ($i=0; $i < count($carrito); $i++)
                <div class="
                @if($i != count($carrito)-1)
                flex pt-5 md:px-10 relative border-b-2 mx-5 border-black border-opacity-10"
                @else
                flex pt-5 pb-5 md:px-10 relative mx-5"
                @endif
                >
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
                            <li  id="precio{{$i}}" data-precio="{{$carrito[$i]['precio']}}" class="precio text-lg font-semibold text-gray-700 flex">
                                ${{number_format($carrito[$i]['precio'], 0, ',', '.')}}
                            </li>
                            <li class="text-lg text-gray-700 md:hidden">
                                @if(strlen($carrito[$i]['nombre_producto'])<30)
                                {{$carrito[$i]['nombre_producto']}}
                                @else
                                {{ Str::limit($carrito[$i]['nombre_producto'], $limit = 20, $end = '...') }}
                                @endif
                            </li>
                             <li class="text-lg text-gray-700 hidden md:block">
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
                                        <input  name="cantidad" id="cantidad{{$i}}" min="1" value="{{$carrito[$i]['pivot']['cantidad_carrito']}}" placeholder="1" type="number" name="cantidad[]" class="bg-white cantidad border-2 text-gray-500 text-center text-sm" style="width: 100%; height:100%">
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
                                        <input name="cantidad[]"  id="cantidad{{$i}}" id="cantidad{{$i}}" min="1" value="{{$carrito[$i]['cantidad_carrito']}}" placeholder="1" type="number" class="bg-white cantidad border-2 text-gray-500 text-center text-sm" style="width: 100%; height:100%">
                                    </div>
                                    <div id="mas{{$i}}" class="flex boton items-center justify-end text-lime-500 font-black cursor-pointer">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                                @endguest
                            </li>
                        </ul>
                        {{-- laravel error cantidad --}}
                        <span class="text-sm" style="color:red"><small>@error('cantidad_oculta.'.$i){{$message}}@enderror</small></span>
                    </div>
                    <div class="absolute top-6 right-10">
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
    <div class="xl:col-span-1 lg:col-span-2 bg-gray-100 relative h-min order-3 md:order-2 mb-10 md:mb-0">
        <div class="uppercase text-gray-700 text-xl font-semibold pt-2 pl-5">
            {{-- Total --}}
            <div class="flex justify-center py-3">
                <img src="{{ asset('img/logos/logo.png') }}" class="lg:h-16 md:h-10 h-12">
            </div>
        </div>
        <div class="uppercase mt-5 text-gray-700 font-semibold pl-5">
            <div class="flex items-end">
                <p>Total: </p> &nbsp; <p id="subtotal" class="text-lime-500 lg:text-lg">
                    ${{number_format($carro['total'], 0, ',', '.')}}
                </p>
            
            </div>
        </div>
        <div id="retiro-tienda" class="text-gray-700 px-3 text-sm hidden">
            <div class="flex  text-justify">
                <p>
                Retire su Compra en Pasaje Ñiquen 2795, Chillan.
                </p>
            </div>
            <div class="flex text-justify">
                <p>
                    Horario de Atención: Lunes a Viernes de 10:00 a 18:00 hrs.
                </p>
            </div>
        </div>
        <div id="info" class="text-gray-700 px-3 text-sm hidden">
            <div class="text-justify">
                <p>
                    Su envio será gestionado por Starken
                </p>
            </div>
            <div class="text-justify">
                <p>
                    Envio a domicilio por pagar
                </p>
            </div>
        </div>
        <div>
            <div class="flex justify-center pb-5">
                @auth
                    @php
                    $id_carrito = $id_carrito
                    @endphp
                @endauth
                @guest
                @php
                $id_carrito = Session::get('id_carrito')
                @endphp
                @endguest
                <form action="{{route('comprar', $id_carrito)}}" method="POST">
                    @csrf
                    <button class="bg-lime-500 text-white font-semibold text-lg uppercase py-2 px-4 rounded-sm mt-5">
                        Pagar
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-span-1 xl:col-start-2 lg:col-start-2 md:col-span-2 md:col-start-2 mt-1 order-2 md:order-3 mb-10">
        <form action="{{route('actualizarCarrito2', $id_carrito)}}" method="POST">
         @csrf
         @method('PUT')
         @for ($i = 0; $i<count($carrito); $i++)
         <div class="hidden">
             <input name="id_producto[]" type="hidden" value="{{$id_producto}}">
             <input  name="precio_oculto[]" type="hidden" id="precio{{$i}}" value="{{$carrito[$i]['precio']}}">
             @auth
             <input name="cantidad_oculta[]" type="number" id="cantidad-oculta{{$i}}" val="{{$carrito[$i]['pivot']['cantidad_carrito']}}">
             @endauth
             @guest
             <input name="cantidad_oculta[]" type="number" id="cantidad-oculta{{$i}}" val="{{$carrito[$i]['cantidad_carrito']}}">
             @endguest
         </div>
         @endfor
         <div class="flex justify-end">
             <button class="btn-tienda">
                 Actualizar Carrito
             </button>
         </div>
        </form>
     </div>
</div>

@endsection

@section('js')
    <script>


        $(document).ready(function(){
            $('#envio').on('change', function(){
                var envio = $('#envio').val();
                if(envio == 1){
                    $('#retiro-tienda').hide('slow');
                    $('#info').show('slow');
                }else{
                    $('#info').hide('slow');
                    $('#retiro-tienda').show('slow');
                }
            });
        });


        $(document).ready(function(){
            $('.boton').on('click', function(){
                var id = $(this).attr('id');
                var id = id.substr(id.length - 1);
                var tipo = $(this).attr('id');
                var tipo = tipo.substr(0, tipo.length - 1);
                var cantidad = $('#cantidad'+id).val();
                cantidad = parseInt(cantidad);
                if(tipo == 'mas'){
                    if(cantidad < 21){
                        cantidad = cantidad + 1;
                        $('#cantidad'+id).val(cantidad);
                    }else{
                        cantidad = 20;
                        $('#cantidad'+id).val(cantidad);
                    }

                }else{
                    if(cantidad > 1){
                        cantidad = cantidad - 1;
                        $('#cantidad'+id).val(cantidad);
                    }
                }
                cantidad = parseInt(cantidad);
                $('#cantidad-oculta'+id).val(cantidad);
            });
        });

        // $(".cantidad").keydown(function(){
        //         var valor = $(this).val();
        //         valor = parseInt(valor);
        //         if(valor<1){
        //             $(this).val(1);
        //         }
        //         // if(valor>19){
        //         //     $(this).val(19);
        //         // }
        //         cantidad = parseInt(cantidad);
        //         $('#cantidad-oculta').val(cantidad);
        // });
        $('.cantidad').keypress(function(){
            //prevent default
            event.preventDefault();
        });

        $(".cantidad").on('change', function(){
                var valor = $(this).val();
                valor = parseInt(valor);
                if(valor<1){
                    $(this).val(1);
                }
                if(valor>20){
                    $(this).val(20);
                }
                cantidad = parseInt(cantidad);
                $('#cantidad-oculta').val(cantidad);
        });

        const cantidad = $('#cantidad-total').data('cantidad');
        $(document).ready(function(){
            for(var i=0; i<cantidad; i++){
                $('#cantidad-oculta'+i).val($('#cantidad'+i).val());
            }
        });

    </script>
@endsection