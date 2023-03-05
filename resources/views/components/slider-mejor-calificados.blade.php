<div class="flex-none">
    <div class="flex mb-5 md:ml-5">
        <div class="grid grid-cols-2">
            <div clas="flex justify-start mr-3">
                <p class="text-xl font-black">Calificados</p>
            </div>
            <div class="flex justify-end md:justify-start lg:justify-end xl:justify-start pr-1 md:pr-0">
                <div id="calificados-izquierda" class="py-1 mx-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div id="calificados-derecha" class="py-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="swiper ml-5 hidden md:block" id="calificados-slider">
        <div class="swiper-wrapper">
            @php
                $contador = 0;
                $contador2 = 0;
            @endphp
            <div class="swiper-slide space-y-3">
                @foreach ($calificados as $calificado)
                    @if ($contador == 3)
                    @break
                @endif
                <div>
                    <a href="{{ route('detalles', $calificado->id) }}">
                        <div class="flex">
                            <img class="h-32 rounded-sm"
                                src="{{ asset('storage/imagenes/' . $calificado->imagenes) }}" alt="">
                            <ul>
                                <li>
                                    <p class="ml-3">
                                        @if (strlen($calificado->nombre_producto) > 30)
                                            {{ substr($calificado->nombre_producto, 0, 30) }}...
                                        @else
                                            {{ $calificado->nombre_producto }}
                                        @endif
                                    </p>
                                </li>
                                <li>
                                    <div class="ml-3 font-semibold space-x-1 flex items-center">

                                        @if (gettype($calificado->promedio_puntuacion) == 'integer')
                                            <p> {{ $calificado->promedio_puntuacion }}</p><i
                                                class="fa fa-star fa-sm text-yellow-500"></i>
                                        @else
                                            <p>{{ $promedio_formateado = number_format($calificado->promedio_puntuacion, 1, ',', '') }}
                                            </p><i class="fa fa-star fa-sm text-yellow-500"></i>
                                        @endif
                                    </div>
                                </li>
                                <li>
                                    <p class="ml-3 font-semibold">
                                        ${{ number_format($calificado->precio, 0, ',', '.') }}
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                @php
                    $contador++;
                @endphp
            @endforeach
        </div>
        <div class="swiper-slide space-y-3">
            @foreach ($calificados as $calificado)
                @if ($contador2 > 3)
                    <div>
                        <a href="{{ route('detalles', $calificado->id) }}">
                            <div class="flex">
                                <img class="h-32 rounded-sm"
                                    src="{{ asset('storage/imagenes/' . $calificado->imagenes) }}" alt="">
                                <ul>
                                    <li>
                                        <p class="ml-3">
                                            @if (strlen($calificado->nombre_producto) > 10)
                                                {{ substr($calificado->nombre_producto, 0, 10) }}...
                                            @else
                                                {{ $calificado->nombre_producto }}
                                            @endif
                                        </p>
                                    </li>
                                    <li>
                                        <div class="ml-3 font-semibold space-x-1 flex items-center">

                                            @if (gettype($calificado->promedio_puntuacion) == 'integer')
                                                <p> {{ $calificado->promedio_puntuacion }}</p><i
                                                    class="fa fa-star fa-sm text-yellow-500"></i>
                                            @else
                                                <p>{{ $promedio_formateado = number_format($calificado->promedio_puntuacion, 1, ',', '') }}
                                                </p><i class="fa fa-star fa-sm text-yellow-500"></i>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <p class="ml-3 font-semibold">
                                            ${{ number_format($calificado->precio, 0, ',', '.') }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                @endif

                @php
                    $contador2++;
                @endphp
            @endforeach
        </div>
    </div> 
</div> --}}
    <div class="swiper md:ml-5" id="calificados-slider">
        <div class="swiper-wrapper">
            @foreach ($calificados as $calificado)
                <div class="swiper-slide">
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
