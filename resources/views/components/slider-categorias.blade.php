<div>
    <div class="flex justify-center mb-5 mt-5 md:mb-10">
        <p class="text-2xl md:text-3xl font-black">¿Qué Estas Buscando?</p>
    </div>
    <div class="swiper categorias" id="categorias">
        <div class="swiper-wrapper">
            <div class="swiper-slide flex justify-center">                  
                <div class="container grid place-items-center">
                    <div class="imagen relative flex-shrink-0">
                        <img class="categoria rounded-sm h-64 object-fill" src="{{ asset("img/categories/ornamentales.jpg")}}" alt="">
                        <div class="grid place-items-center">
                            <div class="absolute bottom-1/6 text-lg px-3 btn-primary">
                            <a href="{{route('filtrados', ['id' => 1, 'minimo' => 0, 'maximo' => 100000])}}">Ornamentales</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide flex justify-center">
                <div class="container grid place-items-center">
                    <div class="imagen relative flex-shrink-0">
                        <img class="categoria rounded-sm h-64 object-fill" src="{{ asset("img/categories/interior.jpg")}}" alt="">
                        <div class="grid place-items-center">
                            <div class="absolute bottom-1/6 btn-primary">
                                <a href="{{route('filtrados', ['id' => 2, 'minimo' => 0, 'maximo' => 100000])}}">Interior</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide flex justify-center">
                <div class="container grid place-items-center">
                    <div class="imagen relative flex-shrink-0">
                        <img class="categoria rounded-sm h-64 object-fill" src="{{ asset("img/categories/exterior.jpg")}}" alt="">
                        <div class="grid place-items-center">
                            <div class="absolute bottom-1/6 btn-primary">
                                <a href="{{route('filtrados', ['id' => 3, 'minimo' => 0, 'maximo' => 100000])}}">Exterior</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide flex justify-center">
                <div class="container grid place-items-center">
                    <div class="imagen relative flex-shrink-0">
                        <img class="categoria rounded-sm h-64 object-fill" src="{{ asset("img/categories/suculentas.jpg")}}" alt="">
                        <div class="grid place-items-center">
                            <div class="absolute bottom-1/6 btn-primary">
                                <a href="{{route('filtrados', ['id' => 4, 'minimo' => 0, 'maximo' => 100000])}}">Suculentas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide flex justify-center">
                <div class="container grid place-items-center">
                    <div class="imagen relative flex-shrink-0">
                        <img class="categoria rounded-sm h-64 object-fill" src="{{ asset("img/categories/arboles_frutales.jpg")}}" alt="">
                        <div class="grid place-items-center">
                            <div class="absolute bottom-1/6 text-xs py-3.5 btn-primary">
                                <a href="{{route('filtrados', ['id' => 5, 'minimo' => 0, 'maximo' => 100000])}}">Árboles Frutales</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide flex justify-center">
                <div class="container grid place-items-center">
                    <div class="imagen relative flex-shrink-0">
                        <img class="categoria rounded-sm h-64 object-fill" src="{{ asset("img/categories/macetero.png")}}" alt="">
                        <div class="grid place-items-center">
                            <div class="absolute bottom-1/6 btn-primary">
                                <a href="{{route('filtrados', ['id' => 6, 'minimo' => 0, 'maximo' => 100000])}}">Maceteros</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide flex justify-center">
                <div class="container grid place-items-center">
                    <div class="imagen relative flex-shrink-0">
                        <img class="categoria rounded-sm h-64 object-fill" src="{{ asset("img/categories/tierra-de-hoja.jpg")}}" alt="">
                        <div class="grid place-items-center">
                            <div class="absolute bottom-1/6 btn-primary text-xs py-3.5">
                                <a href="{{route('filtrados', ['id' => 7, 'minimo' => 0, 'maximo' => 100000])}}">Tierra de Hoja</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide flex justify-center">
                <div class="container grid place-items-center">
                    <div class="imagen relative flex-shrink-0">
                        <img class="categoria rounded-sm h-64 object-fill" src="{{ asset("img/categories/accesorios.jpg")}}" alt="">
                        <div class="grid place-items-center">
                            <div class="absolute bottom-1/6 btn-primary">
                                <a href="{{route('filtrados', ['id' => 8, 'minimo' => 0, 'maximo' => 100000])}}">Accesorios</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:hidden text-lime-500 swiper-button-next"></div>
        <div class="lg:hidden text-lime-500 swiper-button-prev"></div>
        <div class="lg:hidden text-lime-500 swiper-pagination"></div>
    </div>
</div>