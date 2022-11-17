@extends('layaouts.master')
@section('content')

    <section>
        <div class="md:grid md:grid-cols-4 xl:grid-cols-7 mt-10">
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
                        <a class="text-green-500" href="{{route('inicio')}}">Inicio</a> / 
                        <a class="text-green-500" href="#">{{$producto->categoria->nombre_categoria}}</a> /
                        {{$producto->nombre_producto}}
                    </p>
                </div>
                <div class="justify-start pl-5 flex mb-5">
                    <ul>
                        <li class="text-2xl font-bold">{{$producto->nombre_producto}}</li>
                        <li class="text-green-700 text-xl font-semibold flex">${{ number_format($producto->precio, 0, ",", ".")}}</li>
                    </ul>
                </div>
                <div class="px-5">
                    @for ($i = 0; $i < count($producto->descripcion); $i++)
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
                                @php
                                    $temporada = explode('--', $producto->descripcion[3])
                                @endphp
                                <div id="contenido-{{$i}}">
                                    <ul class="ml-5 space-y-1">
                                        @for($i=0; $i< count($temporada); $i++)
                                            <li class="list-disc">
                                                {{$temporada[$i]}}
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
                        <div class="grid grid-cols-12 w-full space-x-2">
                            <div id="menos" class="flex boton items-center justify-end text-green-500 font-black cursor-pointer">
                                <i class="fa fa-minus"></i>
                            </div>
                            <div class="border-2 col-span-3 xl:col-span-2">
                                <input id="cantidad"  placeholder="1" type="number" name="" id="" class="border-2 text-gray-500 text-center" style="width: 100%; height:100%">
                            </div>
                            <div id="mas" class="flex boton items-center text-green-500 font-black cursor-pointer">
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

        //    $('#cantidad').keypress(function(){
        //        if($(this).val()<1)
        //        {   
        //            $(this).val(1);
        //        }
        //        if($(this).val2>max){
        //            $(this).val(max);
        //        }
        //    });
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
