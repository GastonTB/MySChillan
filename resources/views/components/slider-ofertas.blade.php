
<div class="flex-none">
    <div class="flex mb-5 md:ml-5 justify-center">
        <div class="flex ">
            <div clas="">
                <p class="text-xl font-black">Ofertas</p>
            </div>
            <div class="flex pr-1 md:pr-0">
                <div id="ofertas-izquierda" class="py-1 mx-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div id="ofertas-derecha" class="py-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper md:ml-5" id="ofertas-slider">
        <div class="swiper-wrapper">
            @foreach ($ofertas as $oferta)
                <div class="swiper-slide flex justify-center">
                    <a href="{{ route('detalles', $oferta->id) }}">
                        <div class="">
                            <img class="h-52" src="{{ asset('storage/imagenes/' . $oferta->imagenes) }}"
                                alt="">
                            <div class="">
                                <div class="flex justify-start">
                                    <div class="mt-3">
                                        <p class="font-semibold">
                                            @if (strlen($oferta->nombre_producto) > 15)
                                                {{ substr($oferta->nombre_producto, 0, 15) }}...
                                            @else
                                                {{ $oferta->nombre_producto }}
                                            @endif
                                        </p>
                                        <div class="flex items-center">
                                            <p class="font-semibold">
                                                ${{ number_format($oferta->oferta->precio_oferta, 0, ",", ".")}}
                                            </p>

                                            <div class="flex items-center ml-3 space-x-1 text-sm line-through text-gray-400">
                                                ${{ number_format($oferta->precio, 0, ",", ".")}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
