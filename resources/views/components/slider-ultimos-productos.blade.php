<div>
    {{-- <div class="flex justify-evenly mb-5">
        <div class="ml-3">
            <p class="text-2xl font-black">
                Ultimos Productos
            </p>
        </div>
        <div class="flex">
            <div class="py-1 mx-1 px-1 bg-gray-200">
                <i class="fa fa-chevron-left"></i>
            </div>
            <div class="py-1 px-1 bg-gray-200">
                <i class="fa fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <div>
        <div class="flex justify-start">
        <ul>
            <li class="mb-3">
                <div class="flex">
                    <div class="mx-3">
                        <img class="object-scale-down h-28" src="{{ asset("img/categories/cat-3.jpg")}}" alt="">
                    </div>
                    <div class="content-center">
                        <ul>
                            <li>
                                <p>
                                    nombre
                                </p>
                            </li>
                            <li>
                                <p class="font-black">
                                    precio oferta
                                </p>
                            </li>
                            <li>
                                <p class="text-sm text-red-500 line-through">
                                    precio antiguo
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="mb-3">
                <div class="flex">
                    <div class="mx-3">
                        <img class="object-scale-down h-28" src="{{ asset("img/categories/cat-3.jpg")}}" alt="">
                    </div>
                    <div class="content-center">
                        <ul>
                            <li>
                                <p>
                                    nombre
                                </p>
                            </li>
                            <li>
                                <p class="font-black">
                                    precio oferta
                                </p>
                            </li>
                            <li>
                                <p class="text-sm text-red-500 line-through">
                                    precio antiguo
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="mb-3">
                <div class="flex">
                    <div class="mx-3">
                        <img class="object-scale-down h-28" src="{{ asset("img/categories/cat-3.jpg")}}" alt="">
                    </div>
                    <div class="content-center">
                        <ul>
                            <li>
                                <p>
                                    nombre
                                </p>
                            </li>
                            <li>
                                <p class="font-black">
                                    precio oferta
                                </p>
                            </li>
                            <li>
                                <p class="text-sm text-red-500 line-through">
                                    precio antiguo
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    </div> --}}
    <div class="flex justify-evenly mb-5">
        <div class="ml-3">
            <p class="text-2xl lg:text-xl font-black">
                Ultimos Productos
            </p>
        </div>
        <div class="flex">
            <div class="cursor-pointer py-1 mx-1 px-1 bg-gray-200">
                <i id="ultimos-izquierda" class="fa fa-chevron-left"></i>
            </div>
            <div class="cursor-pointer py-1 px-1 bg-gray-200">
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
                        <div class="flex">
                            <img class="h-32" src="{{asset('storage/imagenes/'.$ultimo->imagenes)}}"  alt="">
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
                        @php
                            $contador++;
                        @endphp
                @endforeach
            </div>
            <div class="swiper-slide space-y-3">  
                @foreach ($ultimos as $ultimo) 
                        @if($contador2 > 3)
                        <div class="flex">
                            <img class="h-32" src="{{asset('storage/imagenes/'.$ultimo->imagenes)}}"  alt="">
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
                        @endif
                        
                        @php
                            $contador2++;
                        @endphp
                @endforeach
            </div>
        </div>
    </div>
</div>

