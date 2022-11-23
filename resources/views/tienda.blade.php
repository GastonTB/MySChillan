@extends('layaouts.master')
@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
@endsection
@section('content')

        <div class="lg:hidden">
            <section>
                <div class="flex justify-center items-center py-5">
                    <x-carrito/>
                </div>
            </section>
            <section>
                <div class="my-10 text-center flex-justify-center" style="background-image: url('{{asset('img/banner/close-up-macro-of-green-leaf-1641721.jpg')}}')">
                    <p class="titulo font-black uppercase text-black bg-white text-4xl md:text-5xl mix-blend-lighten">
                        @if(isset($titulo))
                            {{$titulo}}
                        @else
                            Tienda
                        @endif
                    </p>          
            </div>
            </section>
            <section>
                <div class="md:grid md:grid-cols-7 gap-1">
                    <div class="col-span-3 lg:col-span-2">
                        <div class="mb-5 px-5 lg:px-0">
                            <x-filtro-categorias :categoria="$categoria"/> 
                            <span class="text-sm" style="color:red"><small>@error('categorias'){{$message}}@enderror</small></span>                              
                        </div>
                        <div class="mb-5">
                            <x-slider-ofertas :ofertas="$ofertas"/>
                        </div>
                        <div class="mb-5">
                            <x-slider-ultimos-productos :ultimos="$ultimos"/>
                        </div>
                    </div>
                    <div class="col-span-4 lg:col-span-5 p-4">
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach ($productos as $producto)
                            <x-card-producto :producto="$producto"/>
                            @endforeach
                        </div>
                    </div>
                </div>  
            </section>
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
        <div class="grid grid-cols-5 w-full mt-5">
            <div class="col-start-2 col-span-1 pt-5">
                <div>
                    <x-filtro-categorias :categoria="$categoria"/>
                </div>
                <div class="mt-10">
                    <x-slider-ofertas :ofertas="$ofertas"/>
                </div>
                <div class="mt-10">
                    <x-slider-ultimos-productos :ultimos="$ultimos"/>
                </div>
            </div>
            <div class="lg:col-span-2">
                <div class="grid xl:grid-cols-3 p-5 lg:grid-cols-2 gap-4 lg:px-5">
                     @foreach ($productos as $producto)
                        <x-card-producto :producto="$producto"/>
                    @endforeach  
                </div> 
            </div>
        
        </div>
    </div>



@endsection

@section('js')

<script>

    $('.categorias').on('change', function(){
        if($(this).prop('checked') == true){
            $('.categorias').not(this).prop('checked', false);
        }
    });

    var swiper5 = new Swiper("#ultimos-mobile", {
          slidesPerView: 1,
          spaceBetween: 10,
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
        spaceBetween: 10,
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
          console.log('gola');
    });
    $('.circulo').on('click', function(){
        $('#sidebar-carro').removeClass('hidden');
        console.log('gola');
    });
        
    $('#overlay-carro').on('click', function(){
        $('#sidebar-carro').addClass('hidden');
    });



</script>
@endsection
