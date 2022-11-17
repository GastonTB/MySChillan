<div>
    <div class="flex justify-evenly mb-5">
        <div class="ml-3">
            <p class="text-2xl lg:text-xl font-black">
                Ultimos Productos
            </p>
        </div>
        <div class="flex">
            <div class="cursor-pointer py-1 mx-1 px-1 bg-gray-200">
                <i id="ultimos-izquierda-pc" class="fa fa-chevron-left"></i>
            </div>
            <div class="cursor-pointer py-1 px-1 bg-gray-200">
                <i id ="ultimos-derecha-pc" class="fa fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <div class="swiper ml-5" id="ultimos-pc">
        <div class="swiper-wrapper">
            
            @foreach ($ultimos as $ultimo)
                <div class="swiper-slide">
                    <div>
                        <ul>
                            <li>
                                {{$ultimo->imagenes}}
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</div>

