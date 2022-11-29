<div>
    <div class="flex md:ml-5 mb-5 space-x-5">
        <div clas="justify-start">
            <p class="text-xl md:text-2xl font-black">Nuevos</p>
        </div>
        <div class="flex justify-end">
            <div id="ultimos-izquierda" class="py-1 mx-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                <i class="fa fa-chevron-left"></i>
            </div>
            <div id="ultimos-derecha" class="py-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                <i class="fa fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <div class="swiper ml-5 hidden md:block" id="ultimos-slider">
        <div class="swiper-wrapper">
            @php
                $contador = 0;
                $contador2 = 0;
            @endphp
            <div class="swiper-slide space-y-3">  
                @foreach ($ultimos as $ultimo) 
                        @if($contador == 3)
                            @break
                        @endif
                        <div>
                            <a href="{{route('detalles', $ultimo->id)}}">
                                <div class="flex">
                                    <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$ultimo->imagenes)}}"  alt="">
                                    <ul>
                                        <li>
                                            <p class="ml-3">
                                                {{$ultimo->nombre_producto}}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="ml-3 font-semibold">
                                                ${{ number_format($ultimo->precio, 0, ",", ".")}}
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
                @foreach ($ultimos as $ultimo) 
                        @if($contador2 > 3)
                        <div>
                            <a href="{{route('detalles', $ultimo->id)}}">
                                <div class="flex">
                                    <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$ultimo->imagenes)}}"  alt="">
                                    <ul>
                                        <li>
                                            <p class="ml-3">
                                                {{$ultimo->nombre_producto}}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="ml-3 font-semibold">
                                                ${{ number_format($ultimo->precio, 0, ",", ".")}}
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
    </div>
    <div class="swiper md:ml-5 md:hidden" id="ultimos-slider">
        <div class="swiper-wrapper">
            @foreach ($ultimos as $ultimo)
                <div class="swiper-slide">
                    <a href="{{route('detalles', $ultimo->id)}}">
                        <div class="ml-5">
                            <img class="h-52" src="{{asset('storage/imagenes/'.$ultimo->imagenes)}}" alt="">
                            <div class="">
                                <div class="mt-3">
                                    <p class="font-semibold flex justify-center">
                                        {{$ultimo->nombre_producto}}
                                    </p>
                                    <p class="font-semibold flex justify-center">
                                        ${{ number_format($ultimo->precio, 0, ",", ".")}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>  
            @endforeach
        </div>
    </div>
</div>

