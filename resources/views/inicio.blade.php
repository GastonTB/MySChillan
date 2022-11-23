@extends('layaouts.master')
@section('content')
            
        {{-- celular y tablet --}}
        <div class="lg:hidden xl:hidden">
            {{-- carrito --}}
            <section>
                <div class="flex justify-center py-5">
                    <x-carrito/>
                </div>
            </section>
            <section>
                <div class="px-5 mb-5">
                    <x-lista-categorias/>
                </div>
            </section>
            <section>
                <div class="mx-2 mb-5 md:mb-10">
                    <x-hero />
                </div>
            </section>
            <section>
                <div class="mb-5 md:mb-10">
                    <x-telefono/>
                </div>
            </section>
            <section>
                <div class="mb-5 md:mb-10">
                    <x-slider-categorias/>
                </div>
            </section>
            <div class="md:columns-2 md:mb-10">
                <section class="order-1 md:order-2">
                    <div class="mb-5">
                        <x-slider-ultimos-productos :ultimos="$ultimos"/>
                    </div>
                </section>
                <section class="order-2 md:order-1">
                    <div class="mb-5">
                        <x-slider-ofertas :ofertas="$ofertas"/>
                    </div>
                </section>
            </div>
            <section>
                <div class="mb-5">
                    <x-slider-mejor-calificados/>
                </div>
            </section>
        </div>
        <div class="hidden lg:block xl:block">
            <div class="grid xl:grid-cols-5 lg:grid-cols-7 gap-4 mt-10">
                <div class="xl:col-start-2 lg:col-start-2 xl:col-span-1 lg:col-span-1 pt-8">
                    <x-lista-categorias />
                </div>
                <div class="xl:col-span-2 lg:col-span-4">
                    <div class="row-span-2 p-1">
                        <div class="flex justify-center">
                            <div  class="inline-flex items-center justify-center w-10 h-10 mr-2 text-black transition-colors duration-150 bg-lime-500 rounded-full focus:shadow-outline hover:bg-lime-500 hover:text-white">
                                <i class="fa-solid fa-phone fa-xl"></i>
                            </div>
                            <div>
                                <p class="text-lg md:text-xl md:font-black">+569 66 419 506</p>
                                <div class="flex justify-start">
                                    <p class="text-sm md:text-xl">Contacto</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <x-hero />
                    </div>
                </div>
                <div class="xl:col-start-2 lg:col-span-5 lg:col-start-2 xl:col-span-3 mb-5">
                    <x-slider-categorias />
                </div>
            </div>
            <div class="grid xl:grid-cols-5 lg:grid-cols-7 gap-4 mt-10">
                <div class="col-start-2 col-span-1  mt-5">
                    <x-slider-ofertas :ofertas="$ofertas"/>
                </div>
                <div class="xl:col-start-3 lg:col-start-4 col-span-1  mt-5">
                    <x-slider-ultimos-productos :ultimos="$ultimos"/>
                </div>
                <div class="xl:col-start-4 lg:col-start-6 col-span-1 mt-5">
                    <x-slider-mejor-calificados/>
                </div>
            </div>
        </div>
        <div id="mq">
            <div class="text-white hidden md:block lg:hidden xl:hidden">
                3
            </div>
            <div class="text-white md:hidden">
                1
            </div>
            <div class="text-white hidden lg:block">
                4
            </div>
            <div class="text-white hidden xl:block">
                5
            </div>
        </div>

        @section('js')
            <script>
            $('#flecha-arriba').hide();
            $('#flecha-abajo').hide();

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
              disableOnInteraction: false,
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
            disableOnInteraction: false,
        }
    });


            </script>
        @endsection
@endsection
