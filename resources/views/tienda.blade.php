@extends('layaouts.master')
@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
@endsection
@section('content')

        <div class="lg:hidden">
            <div class="md:hidden">
                <div class="mt-5"></div>
            </div>
            <div class="hidden md:block my-10 text-center flex-justify-center" style="background-image: url('{{asset('img/banner/close-up-macro-of-green-leaf-1641721.jpg')}}')">
                <p class="titulo font-black uppercase text-black bg-white text-4xl md:text-5xl mix-blend-lighten">
                    @if(isset($titulo))
                        {{$titulo}}
                    @else
                        Tienda
                    @endif
                </p>          
            </div>
            <div class="md:grid md:grid-cols-7 gap-1">
                <div class="md:col-span-3">
                    <div class="mb-5 px-5 md:pt-4">
                        <x-filtro-categorias-movil :orden="$orden" :minimo="$minimo" :maximo="$maximo" :categoria="$categoria"/>                           
                    </div>
                    <div class="mb-5 hidden md:block">
                        <x-slider-ofertas :ofertas="$ofertas"/>
                    </div>
                    <div class="mb-5 hidden md:block">
                        <x-slider-ultimos-productos :ultimos="$ultimos"/>
                    </div>
                    <div class="md:hidden grid grid-cols-2 pl-5">
                        <div class="columns-1">
                            <div class="mb-5">
                                <x-slider-ofertas :ofertas="$ofertas"/>
                            </div>
                        </div>
                        <div class="columns-1">
                            <div class="mb-5">
                                <x-slider-ultimos-productos :ultimos="$ultimos"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:hidden my-10 text-center flex-justify-center" style="background-image: url('{{asset('img/banner/close-up-macro-of-green-leaf-1641721.jpg')}}')">
                    <p class="titulo font-black uppercase text-black bg-white text-4xl md:text-5xl mix-blend-lighten">
                        @if(isset($titulo))
                            {{$titulo}}
                        @else
                            Tienda
                        @endif
                    </p>          
                </div>
                <div class="col-span-4 p-4">
                    <div class="grid grid-cols-2 gap-4">
                        @if(count($productos)>0)
                            @php
                                $i=1;
                            @endphp
                            @foreach($productos as $producto)
                                <div class="col-span-1">
                                    <x-card-producto :contador="$i" :categoria="$categoria" :minimo="$minimo" :maximo="$maximo" :producto="$producto"/>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        @else
                            <div class="col-span-2 mb-10">
                                <p class="text-center text-gray-700 font-bold text-2xl">Lo sentimos hay productos en esta categoría</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>  
        </div>

    <div class="hidden lg:block xl:block mb-10">
        
        <div class="my-5 text-center flex-justify-center" style="background-image: url('{{asset('img/banner/close-up-macro-of-green-leaf-1641721.jpg')}}')">            
            <p class="select-none font-black uppercase text-black bg-white text-8xl mix-blend-lighten">
                @if(isset($titulo))
                        {{$titulo}}
                    @else
                        Tienda
                @endif
            </p>
        </div>
        <div class="grid xl:grid-cols-5 lg:grid-cols-7 w-full mt-5">
            <div class="col-start-2 col-span-1 pt-5">
                <div class="hidden lg:block">
                    <x-filtro-categorias :orden="$orden" :minimo="$minimo" :maximo="$maximo" :categoria="$categoria"/>
                </div>
                <div class="mt-10">
                    <x-slider-ofertas :ofertas="$ofertas"/>
                </div>
                <div class="mt-10">
                    <x-slider-ultimos-productos :ultimos="$ultimos"/>
                </div>
            </div>
            <div class="lg:col-span-4 xl:col-span-2 lg:px-3">
                <div class="grid xl:grid-cols-3 p-5 lg:grid-cols-3 gap-4 lg:px-5">
                    @if (count($productos)>0)
                        @foreach ($productos as $producto)
                        <x-card-producto :categoria="$categoria" :minimo="$minimo" :maximo="$maximo" :contador="0" :producto="$producto"/>
                        @endforeach     
                    @else
                        <div class="col-span-2 mb-20 flex items-center">
                            <p class="text-center text-gray-700 font-bold text-3xl">
                                @if(isset($buscar))
                                    No se encontraron resultados para la busqueda: {{$buscar}}
                                @else
                                    Lo sentimos hay productos en esta categoría
                                @endif
                            </p>
                        </div>
                                       
                   @endif 

                </div>
                {{$productos->links()}} 
            </div>
        
        </div>
    </div>



@endsection

@section('js')

<script>

    $(document).ready(function(){
        $('#buscador_movil').on('keyup', function(){
            var busqueda = $('#buscador_movil').val();
            $('#buscador').val(busqueda);
            if(busqueda==''){
                $('#nombre_busqueda').val('');
                $('#nombre_busqueda_movil').val('');
            }else{
                $('#nombre_busqueda').val(busqueda);
                $('#nombre_busqueda_movil').val(busqueda);
            }
        });
        $('#buscador').on('keyup', function(){
            var busqueda = $('#buscador').val();
            $('#buscador_movil').val(busqueda);
            if(busqueda==''){
                $('#nombre_busqueda').val('');
                $('#nombre_busqueda_movil').val('');
            }else{
                $('#nombre_busqueda').val(busqueda);
                $('#nombre_busqueda_movil').val(busqueda);
            }
        });
    });

    $(document).ready(function(){
        if($('#buscador').val()!='' || $('#buscador_movil').val()!=''){
            $('#nombre_busqueda').val($('#buscador').val());
            $('#nombre_busqueda_movil').val($('#buscador_movil').val());
            console.log($('#buscador').val());

        }else{
            $('#nombre_busqueda').val('');
            $('#nombre_busqueda_movil').val('');
        }
    });


    $(document).ready(function(){



        $('#filtro-abajo').on('click', function(){
            $('#filtro-arriba').removeClass('hidden');
            $('#lista-filtros').removeClass('rounded-md');
            $('#lista-filtros').addClass('rounded-t-md');
            $('#filtro-abajo').addClass('hidden');
            $('#filtros').show('slow');
        });

        $('#filtro-arriba').on('click', function(){
            $('#filtro-arriba').addClass('hidden');
            $('#lista-filtros').removeClass('rounded-t-md');
            $('#lista-filtros').addClass('rounded-md');
            $('#filtro-abajo').removeClass('hidden');
            $('#filtros').hide('slow');
        });
        var maximo1 = $('.maximo').val();
        var minimo1 = $('.minimo').val();
        var maximo2 = $('.maximo2').val();
        var minimo2 = $('.minimo2').val();
        var maximo1 = maximo1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        var minimo1 = minimo1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        var maximo2 = maximo2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        var minimo2 = minimo2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        
        $('.precio_minimo').text(' $' + minimo1);
        $('.precio_maximo').text(' $' + maximo1);

        $('.minimo').on('change', function(){
            comparar();
           
        });

        $('.maximo').on('change', function(){
            comparar();           
        });

      
        function comparar(){
            var minimo = $('.minimo').val();
            minimo = parseInt(minimo);
            var maximo = $('.maximo').val();
            maximo = parseInt(maximo);
            if(minimo >= maximo){
                if(maximo == 100000){
                    minimo = minimo - 10000;
                }
                if(minimo == 0 && maximo != 0){
                    maximo = maximo + 10000;
                }
                if(minimo != 0 && maximo != 100000){
                    maximo = minimo + 10000;
                }
            }
            if(maximo <= minimo){
                if(maximo == 100000){
                    minimo = minimo - 10000;
                }
                if(minimo == 0 && maximo != 0){
                    maximo = maximo + 10000;
                }
                if(minimo != 0 && maximo != 100000){
                    minimo = maximo - 10000;
                }
            }
            if(minimo == 0 && maximo == minimo){
                maximo = maximo + 10000;
            }
            if(minimo == 100000 && maximo == minimo){
                minimo = minimo - 10000;
            }
            if(maximo > 100000){
                maximo = 100000;
            }
            $('.minimo').val(minimo);
            $('.maximo').val(maximo);
            var minimo = minimo.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('.precio_minimo').text(' $' + minimo);
            var maximo = maximo.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('.precio_maximo').text(' $' + maximo);
        }

        
        $('.precio_minimo2').text(' $' + minimo2);
        $('.precio_maximo2').text(' $' + maximo2);

        $('.minimo2').on('change', function(){
            comparar2();
           
        });

        $('.maximo2').on('change', function(){
            comparar2();           
        });
      
        function comparar2(){
            var minimo2 = $('.minimo2').val();
            minimo2 = parseInt(minimo2);
            var maximo2 = $('.maximo2').val();
            maximo2 = parseInt(maximo2);
            if(minimo2 >= maximo2){
                if(maximo2 == 100000){
                    minimo2 = minimo2 - 10000;
                }
                if(minimo2 == 0 && maximo2 != 0){
                    maximo2 = maximo2 + 10000;
                }
                if(minimo2 != 0 && maximo2 != 100000){
                    maximo2 = minimo2 + 10000;
                }
            }
            if(maximo2 <= minimo2){
                if(maximo2 == 100000){
                    minimo2 = minimo2 - 10000;
                }
                if(minimo2 == 0 && maximo2 != 0){
                    maximo2 = maximo2 + 10000;
                }
                if(minimo2 != 0 && maximo2 != 100000){
                    minimo2 = maximo2 - 10000;
                }
            }
            if(minimo2 == 0 && maximo2 == minimo2){
                maximo2 = maximo2 + 10000;
            }
            if(minimo2 == 100000 && maximo2 == minimo2){
                minimo2 = minimo2 - 10000;
            }
            if(maximo2 > 100000){
                maximo2 = 100000;
            }
            $('.minimo2').val(minimo2);
            $('.maximo2').val(maximo2);
            var minimo2 = minimo2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('.precio_minimo2').text(' $' + minimo2);
            var maximo2 = maximo2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('.precio_maximo2').text(' $' + maximo2);
        }
        
        $('.categoria').on('change', function(){
        if($(this).prop('checked') == true){
            $('.categoria').not(this).prop('checked', false);
        }
        });

        var swiper5 = new Swiper("#ultimos-slider", {
          slidesPerView: 1,
          spaceBetween: 0,
          slidesPerGroup: 1,
          loop: true,
          loopFillGroupWithBlank: true,
          navigation: {
          nextEl: "#ultimos-derecha",
          prevEl: "#ultimos-izquierda",
          },
          autoplay: {
              delay: 4000,
              disableOnInteraction: true,
          }
      });

      var swiper6 = new Swiper("#ofertas-slider", {
        slidesPerView: 1,
        spaceBetween: 0,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        navigation: {
        nextEl: "#oferta-derecha",
        prevEl: "#oferta-izquierda",
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        }
    });

    $('.carrito').on('click', function(){
          $('#sidebar-carro').removeClass('hidden');

    });
    $('.circulo').on('click', function(){
        $('#sidebar-carro').removeClass('hidden');
    });
        
    $('#overlay-carro').on('click', function(){
        $('#sidebar-carro').addClass('hidden');
    });

    });

 


</script>
@endsection
