<div class="flex-none">
    <div class="flex mb-5 md:ml-5 justify-center">
        <div class="flex ">
            <div clas="">
                <p class="text-xl font-black">Calificados</p>
            </div>
            <div class="flex pr-1 md:pr-0">
                <div id="calificados-izquierda" class="py-1 mx-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div id="calificados-derecha" class="py-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper md:ml-5" id="calificados-slider">
        <div class="swiper-wrapper">
            @foreach ($calificados as $calificado)
                <div class="swiper-slide flex justify-center">
                    <a href="{{ route('detalles', $calificado->id) }}">
                        <div class="">
                            <img class="h-52" src="{{ asset('storage/imagenes/' . $calificado->imagenes) }}"
                                alt="">
                            <div class="">
                                <div class="flex justify-start">
                                    <div class="mt-3">
                                        <p class="font-semibold">
                                            @if (strlen($calificado->nombre_producto) > 15)
                                                {{ substr($calificado->nombre_producto, 0, 15) }}...
                                            @else
                                                {{ $calificado->nombre_producto }}
                                            @endif
                                        </p>
                                        <div class="flex items-center">
                                            <p class="font-semibold">
                                                ${{ number_format($calificado->precio, 0, ',', '.') }}
                                            </p>

                                            <div class="flex items-center ml-3 space-x-1">
                                                @if (gettype($calificado->promedio_puntuacion) == 'integer')
                                                    <p class="font-semibold"> {{ $calificado->promedio_puntuacion }}</p>
                                                    <i class="fa fa-star fa-sm pb-1 text-yellow-500"></i>
                                                @else
                                                    <p class="font-semibold">
                                                        {{ $promedio_formateado = number_format($calificado->promedio_puntuacion, 1, ',', '') }}
                                                    </p><i class="fa fa-star fa-sm pb-1 text-yellow-500"></i>
                                                @endif
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
