<div>
    <div class="flex mb-5 md:ml-5">
        <div class="grid grid-cols-2">
            <div clas="flex justify-start">
                <p class="text-xl md:text-2xl font-black">Nuevos</p>
            </div>
            <div class="flex justify-end pr-1 md:pr-0">
                <div id="ultimos-izquierda" class="py-1 mx-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div id="ultimos-derecha" class="py-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-right"></i>
                </div>
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
                                                @if(strlen($ultimo->nombre_producto) > 30)
                                                {{substr($ultimo->nombre_producto, 0, 30)}}...
                                                @else
                                                    {{$ultimo->nombre_producto}}
                                                @endif
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
                                                @if(strlen($ultimo->nombre_producto) > 10)
                                                {{substr($ultimo->nombre_producto, 0, 10)}}...
                                                @else
                                                    {{$ultimo->nombre_producto}}
                                                @endif
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
                        <div class="">
                            <img class="h-52" src="{{asset('storage/imagenes/'.$ultimo->imagenes)}}" alt="">
                            <div class="">
                                <div class="flex justify-start">
                                    <div class="mt-3">
                                        <p class="font-semibold">
                                            @if(strlen($ultimo->nombre_producto) > 15)
                                                {{substr($ultimo->nombre_producto, 0, 15)}}...
                                            @else
                                                {{$ultimo->nombre_producto}}
                                            @endif
                                        </p>
                                        <div class="flex items-end">
                                            <p class="font-semibold">
                                                ${{ number_format($ultimo->precio, 0, ",", ".")}}
                                            </p>
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

