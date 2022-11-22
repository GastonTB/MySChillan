@extends('layaouts.master')
@section('content')

    <section>
        <div class="md:grid md:grid-cols-4 xl:grid-cols-7 mt-10 mb-10 select-none">
            <div class="md:col-span-2 xl:col-start-2">
                <div>
                    <div class="xl:grid xl:grid-cols-5">
                        <div class="xl:col-start-2 xl:col-span-4">
                            <x-slider-fotos-producto :producto="$producto"/>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="md:col-span-2 xl:col-span-2 xl:col-start-4">
                <div class="md:mt-0 mt-10 mb-5 flex justify-start pl-5">
                    <p>
                        <a class="text-lime-500" href="{{route('tienda')}}">Tienda</a> / 
                        <a class="text-lime-500" href="{{route('filtrados', $producto->categoria_id)}}">{{$producto->categoria->nombre_categoria}}</a> /
                        {{$producto->nombre_producto}}
                    </p>
                </div>
                <div class="justify-start pl-5 flex mb-3">
                    <ul>
                        <li class="text-2xl font-bold mb-3">{{$producto->nombre_producto}}</li>
                        <li class="">
                            @if($oferta!=null)
                            <li class="block text-green-700 text-xl font-semibold flex">
                                ${{ number_format($oferta->precio_oferta, 0, ",", ".")}}
                            </li>
                            <li class="text-gray-700 line-through block mt-1">
                                ${{ number_format($producto->precio, 0, ",", ".")}}
                            </li>
                            <li class="text-sm text-gray-700">
                                Oferta valida hasta {{$oferta->fecha_fin}}
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
                                <p class="font-semibold cursor-pointer titulo" id="titulo-{{$i}}">
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
                                <div id="contenido-{{$i}}">
                                    {{$producto->descripcion[$i]}}
                                </div>
                                @endif
                            </div>
                        </div>
                    @endfor
                    <div class="my-10">
                        @if($producto->cantidad == 0)
                            <p class="text-red-500 font-semibold">Producto agotado</p>
                        @else
                        <div class="grid grid-cols-12 w-full space-x-2">
                            <div id="menos" class="flex boton items-center justify-end text-lime-500 font-black cursor-pointer">
                                <i class="fa fa-minus"></i>
                            </div>
                            <div class="border-2 col-span-3 xl:col-span-2">
                                <input id="cantidad" min="1" max="{{$producto->cantidad}}" placeholder="1" type="number" name="" id="" class="border-2 text-gray-500 text-center" style="width: 100%; height:100%">
                            </div>
                            <div id="mas" class="flex boton items-center text-lime-500 font-black cursor-pointer">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="col-span-5">
                                <button class="btn-tienda col-span-5">
                                    agregar al carrito
                                </button>
                                <div id="{{$producto->cantidad}}" class="oculto hidden">
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>

    @section('js')
        <script>
            const max = $('.oculto').attr('id');
            var swiper = new Swiper("#producto", {
                slidesPerView: 1,
                spaceBetween: 1,
                slidesPerGroup: 1,
                loop: false,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });

            $(window).on('load', function() {
                $('#contenido-1').hide();
                $('#contenido-2').hide();
                $('#contenido-3').hide();
            });

            $('.titulo').on('click', function(){
                var id = $(this).attr('id');
                id = id.slice(-1);
                if($('#contenido-'+id).is(':visible')){
                    $('#contenido-'+id).hide('slow');
                    $('#fl-ab-'+id).hide();
                    $('#fl-ar-'+id).show();
                }else{
                    $('#contenido-'+id).show('slow');
                    $('#fl-ar-'+id).hide();
                    $('#fl-ab-'+id).show();
                } 
            });

            $('.boton').on('click', function(){
                var id = $(this).attr('id');
                var val = $('#cantidad').val();
                val = parseInt(val);
                if(id == 'mas'){
                    val++;
                    $('#cantidad').val(val);
                }
                if(id == 'menos'){
                    val--;
                    $('#cantidad').val(val);
                }
                 if($('#cantidad').val()<1)
                 {   var val = 1;
                     $('#cantidad').val(val);
                 }
                 if($('#cantidad').val()>max)
                 {
                     $('#cantidad').val(max);
                 }
            });


            $("#cantidad").keyup(function(){
                var valor = $(this).val();
                valor = parseInt(valor);
                if(valor>max){
                    $(this).val(max);
                }
                if(valor<1){
                    $(this).val(1);
                }
                
            });
            

        </script>
    @endsection
@endsection
