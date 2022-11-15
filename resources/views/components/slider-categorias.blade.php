<div>
    <div class="flex justify-center mb-5 md:mb-10">
        <p class="text-2xl md:text-3xl font-black">¿Qué Estas Buscando?</p>
    </div>
    <div class="swiper" id="categorias">
        <div class="swiper-wrapper">
        <div class="swiper-slide">                  
            <div class="container grid place-items-center">
                <div class="imagen relative flex-shrink-0">
                    <img class="categoria" src="{{ asset("img/categories/cat-1.jpg")}}" alt="">
                    <div class="grid place-items-center">
                        <div class="absolute bottom-1/6 btn-primary">ORNAMENTALES</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="container grid place-items-center">
                <div class="imagen relative flex-shrink-0">
                    <img class="categoria" src="{{ asset("img/categories/cat-2.jpg")}}" alt="">
                        <div class="grid place-items-center">
                            <div class="absolute bottom-1/6 btn-primary">DE INTERIOR
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="container grid place-items-center">
                <div class="imagen relative flex-shrink-0">
                    <img class="categoria" src="{{ asset("img/categories/cat-3.jpg")}}" alt="">
                    <div class="grid place-items-center">
                        <div class="absolute bottom-1/6 btn-primary">DE EXTERIOR</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="text-green-500 swiper-button-next"></div>
        <div class="text-green-500 swiper-button-prev"></div>
        <div class="text-green-500 swiper-pagination"></div>
    </div>
</div>