<div>
    <div class="flex ml-5 mb-5 space-x-1">
        <div class="">
            <p class="text-2xl lg:text-xl font-black">
                Ultimos Productos
            </p>
        </div>
        <div class="flex">
            <div class="cursor-pointer py-1 mx-1 px-1 bg-gray-200 rounded-md shadow-sm hover:bg-lime-500">
                <i id="ultimos-izquierda" class="fa fa-chevron-left"></i>
            </div>
            <div class="cursor-pointer py-1 px-1 bg-gray-200 rounded-md shadow-sm hover:bg-lime-500">
                <i id ="ultimos-derecha" class="fa fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <div class="swiper ml-5" id="ultimos-mobile">
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
</div>

