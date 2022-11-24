<div>
    <div class="flex ml-5 mb-5 space-x-5">
        <div clas="justify-start">
            <p class="text-2xl font-black">Ofertas</p>
        </div>
        <div class="flex justify-end">
            <div id="oferta-izquierda" class="py-1 mx-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                <i class="fa fa-chevron-left"></i>
            </div>
            <div id="oferta-derecha" class="py-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                <i class="fa fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <div class="swiper ml-5" id="ofertas-slider">
        <div class="swiper-wrapper">
            @php
                $contador = 0;
                $contador2 = 0;
                $contador3 = 0;
                $cantidad_ofertas = count($ofertas); 
            @endphp
            @if ($cantidad_ofertas < 4)
                @foreach ($ofertas as $oferta)
                    <div class="swiper-slide space-y-3">
                        <a href="{{route('detalles', $oferta->id)}}">
                            <div class="flex">
                                <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes[0])}}"  alt="">
                                <ul>
                                    <li>
                                        <p class="ml-3">
                                            {{$oferta->nombre_producto}}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="ml-3 font-semibold">
                                            ${{ number_format($oferta->oferta->precio_oferta, 0, ",", ".")}}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="ml-3 text-sm line-through text-gray-600">
                                            ${{ number_format($oferta->precio, 0, ",", ".")}}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                @endforeach
            @elseif($cantidad_ofertas >= 3 && $cantidad_ofertas < 6)
             <div class="swiper-slide space-y-3">
                @foreach ($ofertas as $oferta)
                    @if($contador == 2)
                        @break
                    @endif
                        <div>
                            <a href="{{route('detalles', $oferta->id)}}">
                                <div class="flex">
                                    <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes[0])}}"  alt="">
                                    <ul>
                                        <li>
                                            <p class="ml-3">
                                                {{$oferta->nombre_producto}}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="ml-3 font-semibold">
                                                ${{ number_format($oferta->oferta->precio_oferta, 0, ",", ".")}}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="ml-3 text-sm line-through text-gray-600">
                                                ${{ number_format($oferta->precio, 0, ",", ".")}}
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
                @foreach ($ofertas as $oferta)
                    @if($contador2 >= 2 && $contador2 < 4 )
                    <div>
                        <a href="{{route('detalles', $oferta->id)}}">
                            <div class="flex">
                                <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes[0])}}"  alt="">
                                <ul>
                                    <li>
                                        <p class="ml-3">
                                            {{$oferta->nombre_producto}}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="ml-3 font-semibold">
                                            ${{ number_format($oferta->oferta->precio_oferta, 0, ",", ".")}}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="ml-3 text-sm line-through text-gray-600">
                                            ${{ number_format($oferta->precio, 0, ",", ".")}}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    @else
                        
                    @endif
                    
                    @php
                        $contador2++;
                    @endphp
                @endforeach
            </div>
            <div class="swiper-slide space-y-3">
                @foreach ($ofertas as $oferta)
                    @if($contador3 >= 4 )
                    <div>
                        <a href="{{route('detalles', $oferta->id)}}">
                            <div class="flex">
                                <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes[0])}}"  alt="">
                                <ul>
                                    <li>
                                        <p class="ml-3">
                                            {{$oferta->nombre_producto}}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="ml-3 font-semibold">
                                            ${{ number_format($oferta->oferta->precio_oferta, 0, ",", ".")}}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="ml-3 text-sm line-through text-gray-600">
                                            ${{ number_format($oferta->precio, 0, ",", ".")}}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    @endif
                    
                    @php
                        $contador3++;
                    @endphp
                @endforeach
            </div>
            @else
                <div class="swiper-slide space-y-3">  
                    @foreach ($ofertas as $oferta) 
                            @if($contador == 3)
                                @break
                            @endif
                            <div>
                                <a href="{{route('detalles', $oferta->id)}}">
                                    <div class="flex">
                                        <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes[0])}}"  alt="">
                                        <ul>
                                            <li>
                                                <p class="ml-3">
                                                    {{$oferta->nombre_producto}}
                                                </p>
                                            </li>
                                            <li>
                                                <p class="ml-3 font-semibold">
                                                    ${{ number_format($oferta->oferta->precio_oferta, 0, ",", ".")}}
                                                </p>
                                            </li>
                                            <li>
                                                <p class="ml-3 text-sm line-through text-gray-600">
                                                    ${{ number_format($oferta->precio, 0, ",", ".")}}
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
                    @foreach ($ofertas as $oferta) 
                            @if($contador2 > 3)
                            <div>
                                <a href="{{route('detalles', $oferta->id)}}">
                                    <div class="flex">
                                        <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes[0])}}"  alt="">
                                        <ul>
                                            <li>
                                                <p class="ml-3">
                                                    {{$oferta->nombre_producto}}
                                                </p>
                                            </li>
                                            <li>
                                                <p class="ml-3 font-semibold">
                                                    ${{ number_format($oferta->oferta->precio_oferta, 0, ",", ".")}}
                                                </p>
                                            </li>
                                            <li>
                                                <p class="ml-3 text-sm line-through text-gray-600">
                                                    ${{ number_format($oferta->precio, 0, ",", ".")}}
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
            @endif
            
        </div>
    </div>
</div>