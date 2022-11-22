<div>
    <div class="swiper" id="producto">
        <div class="swiper-wrapper">
            @for ($i = 0; $i < count($producto->imagenes);$i++)
                <div class="swiper-slide">                  
                    <div class="flex justify-center">
                        <img class="" src="{{asset('storage/imagenes/'.$producto->imagenes[$i])}}"  alt="">
                    </div>
                </div>
            @endfor
        </div>
        <div class="text-lime-500 swiper-pagination"></div>
    </div>
</div>