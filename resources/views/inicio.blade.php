@extends('layaouts.master')
@section('content')

    {{-- celular y tablet --}}
    <div class="lg:hidden">
        <section>
            <div class="px-2 mb-5 mt-5">
                <x-lista-categorias />
            </div>
        </section>
        <section>
            <div class="mx-2 mb-5 md:mb-10">
                <x-hero />
            </div>
        </section>
        <section>
            <div class="mb-5 md:mb-10">
                <x-slider-categorias />
            </div>
        </section>
        <section>
            @php
                $contador = 0;
                if (count($ofertas) > 0) {
                    $contador++;
                }
                if (count($calificados) > 1) {
                    $contador++;
                }
                if (count($ultimos) > 1) {
                    $contador++;
                }
            @endphp
            <div class="md:grid md:grid-cols-3 md:mb-10 hidden md:block lg:hidden md:px-5">

                @if ($contador == 2)
                    @if (count($ofertas) > 0)
                        <div class="">
                            <x-slider-ofertas :ofertas="$ofertas" />
                        </div>
                    @endif
                    @if (count($calificados) > 0)
                        <div class="">
                            <x-slider-mejor-calificados :calificados="$calificados" />
                        </div>
                    @endif
                    <div class="">
                        <x-slider-ultimos-productos :ultimos="$ultimos" />
                    </div>
                @endif
                @if ($contador == 3)
                    @if (count($ofertas) > 0)
                        <div class="">
                            <x-slider-ofertas :ofertas="$ofertas" />
                        </div>
                    @endif
                    @if (count($calificados) > 0)
                        <div class="">
                            <x-slider-mejor-calificados :calificados="$calificados" />
                        </div>
                    @endif
                    <div>
                        <x-slider-ultimos-productos :ultimos="$ultimos" />
                    </div>
                @endif

            </div>
            <div class="md:hidden grid grid-cols-2 mb-10 gap-3 px-5">
                @if ($contador == 2)
                    @if (count($ofertas) > 0)
                        <div class="">
                            <x-slider-ofertas :ofertas="$ofertas" />
                        </div>
                    @endif
                    @if (count($calificados) > 0)
                        <div class="">
                            <x-slider-mejor-calificados :calificados="$calificados" />
                        </div>
                    @endif
                    <div class="">
                        <x-slider-ultimos-productos :ultimos="$ultimos" />
                    </div>
                @endif
                @if ($contador == 3)
                    @if (count($ofertas) > 0)
                        <div class="">
                            <x-slider-ofertas :ofertas="$ofertas" />
                        </div>
                    @endif
                    @if (count($calificados) > 0)
                        <div class="">
                            <x-slider-mejor-calificados :calificados="$calificados" />
                        </div>
                    @endif
                    <div class="col-span-2 mt-5">
                        <div class="w-full">
                            <div class="block mx-auto w-1/2">
                                <x-slider-ultimos-productos :ultimos="$ultimos" />
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </section>
    </div>

    <div class="hidden lg:block xl:block">
        <div class="grid xl:grid-cols-5 lg:grid-cols-7 gap-4 mt-10">
            <div class="xl:col-start-2 lg:col-start-2 xl:col-span-1 lg:col-span-1 pt-3">
                <x-lista-categorias />
            </div>
            <div class="xl:col-span-2 lg:col-span-4">
                <div class="py-3">
                    <x-hero />
                </div>
            </div>
            <div class="xl:col-start-2 lg:col-span-5 lg:col-start-2 xl:col-span-3 mb-5">
                <x-slider-categorias />
            </div>
        </div>
        <div class="grid xl:grid-cols-7 lg:grid-cols-7 gap-4 mt-10">
            <div class="col-start-2 col-end-7">


                <div class="grid grid-cols-{{ $contador }}">

                    @if (count($ofertas) > 0)
                        <div class="col-span-1">
                            <x-slider-ofertas class="mx-auto" :ofertas="$ofertas" />
                        </div>
                    @endif
                    @if (count($calificados) > 0)
                        <div class="col-span-1">
                            <x-slider-mejor-calificados class="mx-auto" :calificados="$calificados" />
                        </div>
                    @endif
                    @if (count($ultimos) > 0)
                        <div class="col-span-1">
                            <x-slider-ultimos-productos class="mx-auto" :ultimos="$ultimos" />
                        </div>
                    @endif
                </div>
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
        //document ready
        $(document).ready(function() {
            var swiper5 = new Swiper("#ultimos-slider", {
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

            var swiper7 = new Swiper("#calificados-slider", {
                slidesPerView: 1,
                spaceBetween: 10,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                navigation: {
                    nextEl: "#calificados-derecha",
                    prevEl: "#calificados-izquierda",
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                }
            });

            $('.flecha').on('click', function() {
                let id = $(this).attr('id');
                if (id == 'abajo') {
                    $('#lista').show('slow');
                    $('#abajo').hide();
                    $('#arriba').show();
                } else {
                    $('#lista').hide('slow');
                    $('#abajo').show();
                    $('#arriba').hide();
                }
            });

        });
    </script>
@endsection
@endsection
