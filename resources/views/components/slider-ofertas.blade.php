<div>
    <div class="flex mb-5 md:ml-5">
        <div class="grid grid-cols-2">
            <div clas="flex justify-start">
                <p class="text-xl md:text-2xl font-black">Ofertas</p>
            </div>
            <div class="flex justify-end pr-2 md:pr-0">
                <div id="oferta-izquierda" class="py-1 mx-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div id="oferta-derecha" class="py-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper ml-5 hidden md:block" id="ofertas-slider">
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
                                <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes)}}"  alt="">
                                <ul>
                                    <li>
                                        <p class="ml-3">
                                            @if (strlen($oferta->nombre_producto)>10)
                                                    {{substr($oferta->nombre_producto, 0, 10)}}...
                                                @else
                                                    {{$oferta->nombre_producto}}
                                                @endif
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
                                    <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes)}}"  alt="">
                                    <ul>
                                        <li>
                                            <p class="ml-3">
                                                @if (strlen($oferta->nombre_producto)>10)
                                                    {{substr($oferta->nombre_producto, 0, 15)}}...
                                                @else
                                                    {{$oferta->nombre_producto}}
                                                @endif
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
                                <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes)}}"  alt="">
                                <ul>
                                    <li>
                                        <p class="ml-3">
                                            @if (strlen($oferta->nombre_producto)>10)
                                                    {{substr($oferta->nombre_producto, 0, 15)}}...
                                                @else
                                                    {{$oferta->nombre_producto}}
                                                @endif
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
                                <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes)}}"  alt="">
                                <ul>
                                    <li>
                                        <p class="ml-3">
                                            @if (strlen($oferta->nombre_producto)>10)
                                                    {{substr($oferta->nombre_producto, 0, 15)}}...
                                                @else
                                                    {{$oferta->nombre_producto}}
                                                @endif
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
                                        <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes)}}"  alt="">
                                        <ul>
                                            <li>
                                                <p class="ml-3">
                                                    @if (strlen($oferta->nombre_producto)>10)
                                                    {{substr($oferta->nombre_producto, 0, 15)}}...
                                                @else
                                                    {{$oferta->nombre_producto}}
                                                @endif
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
                                        <img class="h-32 rounded-sm" src="{{asset('storage/imagenes/'.$oferta->imagenes)}}"  alt="">
                                        <ul>
                                            <li>
                                                <p class="ml-3">
                                                    @if (strlen($oferta->nombre_producto)>10)
                                                    {{substr($oferta->nombre_producto, 0, 15)}}...
                                                @else
                                                    {{$oferta->nombre_producto}}
                                                @endif
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
    <div class="swiper md:hidden" id="ofertas-slider">
        <div class="swiper-wrapper">
            @foreach ($ofertas as $oferta)
                <div class="swiper-slide">
                    <a href="{{route('detalles', $oferta->id)}}">
                        <div class="">
                            <img class="h-52" src="{{asset('storage/imagenes/'.$oferta->imagenes)}}" alt="">
                            <div class="flex justify-start">
                                <div class="mt-3">
                                    <p class="font-semibold">
                                        @if (strlen($oferta->nombre_producto)>10)
                                                    {{substr($oferta->nombre_producto, 0, 10)}}...
                                                @else
                                                    {{$oferta->nombre_producto}}
                                                @endif
                                    </p>
                                    <div class="flex justify-center space-x-3">
                                        <p class="font-semibold flex items-end">
                                            ${{ number_format($oferta->oferta->precio_oferta, 0, ",", ".")}}
                                        </p>
                                        <p class="text-gray-500 line-through text-sm flex items-end">
                                            ${{ number_format($oferta->precio, 0, ",", ".")}}
                                        </p>
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