@extends('layaouts.master')
@section('content')

    <section>
        <div class="md:grid md:grid-cols-4 xl:grid-cols-7 mt-10 mb-10 select-none">
            <div class="md:col-span-2 xl:col-start-2">
                <div>
                    <div class="xl:grid xl:grid-cols-5">
                        <div class="xl:col-start-2 xl:col-span-4">
                            <input type="hidden" id="fotos" data-cantidad="{{count($producto->imagenes)}}">
                            <x-slider-fotos-producto :producto="$producto"/>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="md:col-span-2 xl:col-span-2 xl:col-start-4">
                <div class="md:mt-0 mt-10 mb-5 flex justify-start pl-5">
                    <p>
                        <a class="text-lime-500" href="{{route('tienda')}}">Tienda</a> / 
                        <a class="text-lime-500" href="{{route('filtrados', ['id' => $producto->categoria_id , 'minimo' => 0, 'maximo' => 100000, 'orden' => 1, 'nombre' => '999'])}}">{{$producto->categoria->nombre_categoria}}</a> /
                        {{$producto->nombre_producto}}
                    </p>
                </div>
                <div class="justify-start pl-5 flex mb-3">
                    <ul>
                        <li class="text-2xl font-bold mb-3">{{$producto->nombre_producto}}</li>
                        <li class="">
                            @if($producto->oferta_id!=0)
                            <li class="block text-green-700 text-xl font-semibold flex">
                                ${{ number_format($producto->oferta->precio_oferta, 0, ",", ".")}}
                            </li>
                            <li class="text-gray-700 line-through block mt-1">
                                ${{ number_format($producto->precio, 0, ",", ".")}}
                            </li>
                            <li class="text-sm text-gray-700">
                                Oferta valida hasta {{$producto->oferta->fecha_fin}}
                            </li>
                            @else
                            ${{ number_format($producto->precio, 0, ",", ".")}}
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="px-5">
                    @for ($i = 0; $i < $cantidad; $i++)
                        <div class="mt-5">
                            <div>
                                <p class="font-semibold cursor-pointer titulo mb-2" id="titulo-{{$i}}">
                                    @switch($i)
                                        @case(0)
                                            Descripcion: <i id="fl-ar-0" class="fa fa-chevron-up hidden"></i><i id="fl-ab-0" class="fa fa-chevron-down"></i>
                                            @break
                                        @case(1)
                                            Caracteristicas: <i id="fl-ar-1" class="fa fa-chevron-up"></i><i id="fl-ab-1" class="fa fa-chevron-down hidden"></i>
                                            @break
                                        @case(2)
                                            Cuidados: <i id="fl-ar-2" class="fa fa-chevron-up"></i><i id="fl-ab-2" class="fa fa-chevron-down hidden"></i>
                                            @break
                                        @case(3)
                                            Temporada: <i id="fl-ar-3" class="fa fa-chevron-up"></i><i id="fl-ab-3" class="fa fa-chevron-down hidden"></i>
                                            @break
                                    
                                        @default
                                            
                                    @endswitch
                                </p>
                            </div>
                            <div class="text-sm">
                                @if ($i==3)
                                <div id="contenido-{{$i}}">
                                    <ul class="ml-5 space-y-1">
                                        @for($j=0; $j< $cantidad_temp; $j++)
                                            <li class="list-disc">
                                                {{$temporada[$j]}}
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                                @else
                                <div class="text-justify text-ellipsis" id="contenido-{{$i}}">
                                    <p>
                                        {{$producto->descripcion[$i]}}
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endfor
                    <div class="my-10">
                        @if($producto->cantidad == 0)
                            <p class="text-red-500 font-semibold">Producto agotado</p>
                        @else
                        @auth
                            @php
                                $id_carrito = Auth::user()->carrito->id;
                            @endphp
                        @endauth
                        @guest
                            @php
                                $id_carrito = Session::get('id_carrito');
                            @endphp
                        @endguest
                        <form action="{{route('actualizarCarrito',$id_carrito)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="producto_id" value="{{$producto->id}}">
                            <div class="flex space-x-2">
                                <div id="menos" class="flex boton items-center justify-end text-lime-500 font-black cursor-pointer">
                                    <i class="fa fa-minus"></i>
                                </div>
                                <div class="border-2 col-span-3 xl:col-span-2">
                                    <input value="1" id="cantidad" min="1" max="20" placeholder="1" type="number" name="cantidad" class="border-2 text-gray-500 text-center" style="width: 100%; height:100%">
                                </div>
                                <div id="mas" class="flex boton items-center text-lime-500 font-black cursor-pointer">
                                    <i class="fa fa-plus"></i>
                                </div>
                                <div class="col-span-5">
                                    <button class="btn-tienda col-span-5">
                                        agregar al carrito
                                    </button>
                                </div>
                            </div>
                            <div>
                                <span class="text-sm" style="color:red"><small>@error('cantidad'){{$message}}@enderror</small></span>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>

    @section('js')
        <script>

            $(document).ready(function(){
                const cantidad_fotos = $('#fotos').data('cantidad');
                if(cantidad_fotos>1){
                    var swiper = new Swiper("#producto", {
                        slidesPerView: 1,
                        spaceBetween: 1,
                        slidesPerGroup: 1,
                        loop: true,
                        loopFillGroupWithBlank: true,
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                        },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                            },
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        }
                    });
                }
            });

            $(window).on('load', function() {
                $('#contenido-1').addClass('hidden');
                $('#contenido-2').addClass('hidden');
                $('#contenido-3').addClass('hidden');
            });

            $('.titulo').on('click', function(){
                var id = $(this).attr('id');
                id = id.slice(-1);
                if($('#contenido-'+id).is(':visible')){
                    $('#contenido-'+id).hide('slow');
                    $('#fl-ab-'+id).addClass('hidden');
                    $('#fl-ar-'+id).removeClass('hidden');
                }else{
                    $('#contenido-'+id).show('slow');
                    $('#fl-ar-'+id).addClass('hidden');
                    $('#fl-ab-'+id).removeClass('hidden');
                } 
            });

            $('.boton').on('click', function(){
                var id = $(this).attr('id');
                var val = $('#cantidad').val();
                if(id == 'mas'){
                    val++;
                    $('#cantidad').val(val);
                }
                if(id == 'menos'){
                    val--;
                    $('#cantidad').val(val);
                }
                 if($('#cantidad').val()<1)
                 {    val = 1;
                     $('#cantidad').val(val);
                 }
                if($('#cantidad').val()>20)
                {    val = 20;
                    $('#cantidad').val(val);
                }

            });


            $("#cantidad").keyup(function(){
                var valor = $(this).val();
                valor = parseInt(valor);
                if(valor<1){
                    $(this).val(1);
                }
                if(valor>20){
                    $(this).val(20);
                }
            });
            

        </script>
    @endsection
@endsection
