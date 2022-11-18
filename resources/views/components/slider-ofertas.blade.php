<div>
    <div class="flex ml-5 mb-5 space-x-5">
        <div clas="justify-start">
            <p class="text-2xl font-black">Ofertas</p>
        </div>
        <div class="flex justify-end">
            <div id="oferta-izquierda" class="py-1 mx-1 px-1 bg-gray-200">
                <i class="fa fa-chevron-left"></i>
            </div>
            <div id="oferta-derecha" class="py-1 px-1 bg-gray-200">
                <i class="fa fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <div class="swiper ml-5" id="ofertas-slider">
        <div class="swiper-wrapper">
            @php
                $contador = 0;
                $contador2 = 0;
            @endphp
            <div class="swiper-slide space-y-3">  
                @foreach ($ofertas as $oferta) 
                        @if($contador == 3)
                            @break
                        @endif
                        <div class="flex">
                            <img class="h-32" src="{{asset('storage/imagenes/'.$oferta->imagenes)}}"  alt="">
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
                                    <p class="ml-3 text-sm line-through text-red-600">
                                        ${{ number_format($oferta->precio, 0, ",", ".")}}
                                    </p>
                                </li>
                            </ul>
                        </div>
                        @php
                            $contador++;
                        @endphp
                @endforeach
            </div>
            <div class="swiper-slide space-y-3">  
                @foreach ($ofertas as $oferta) 
                        @if($contador2 > 3)
                        <div class="flex">
                            <img class="h-32" src="{{asset('storage/imagenes/'.$oferta->imagenes)}}"  alt="">
                            <ul>
                                <li>
                                    <p class="ml-3">
                                        {{$oferta->nombre_producto}}
                                    </p>
                                </li>
                                <li>
                                    <p class="ml-3 font-semibold">
                                        ${{ number_format($oferta->precio, 0, ",", ".")}}
                                    </p>
                                </li>
                            </ul>
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