@extends('layaouts.master')
@section('content')
            
        {{-- celular y tablet --}}
        <div class="lg:hidden xl:hidden">
            {{-- carrito --}}
            <section>
                <div class="flex justify-center py-5">
                    <x-carrito />
                </div>
            </section>
            {{-- categorias lista --}}
            <section>
                <div class="px-5 mb-5 md:mb-10">
                    <div class="bg-green-500 columns-2 md:text-lg">
                        <div class="flex justify-start">
                            <div class="mx-2 py-2 text-white">
                                <i class="fa fa-bars"></i>
                            </div>
                            <p class="text-white font-black py-2">
                                Categorias
                            </p>
                        </div>
                        <div class="flex justify-end">
                            <p class="text-white text-sm font-black mr-2 py-2">
                                <i class="fa fa-chevron-up"></i>
                            </p>
                            <p class="text-white text-sm font-black mr-2 py-2">
                                <i class="fa fa-chevron-down"></i>
                            </p> 
                        </div>
                    </div>
                    <div class="border-2 md:text-lg">
                        <ul class="pl-2">
                            <li class="py-2 hover:text-green-500"><a href="#">Ornamentales</a></li>
                            <li class="py-2 hover:text-green-500"><a href="#">Plantas de Interior</a></li>
                            <li class="py-2 hover:text-green-500"><a href="#">Plantas de Exterior</a></li>
                            <li class="py-2 hover:text-green-500"><a href="#">Suculentas</a></li>
                            <li class="py-2 hover:text-green-500"><a href="#">Arboles Frutales</a></li>
                            <li class="py-2 hover:text-green-500"><a href="#">Maceteros</a></li>
                            <li class="py-2 hover:text-green-500"><a href="#">Tierra de Hojas</a></li>
                            <li class="py-2 hover:text-green-500"><a href="#">Accesorios</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            {{-- hero --}}
            <section>
                <div class="mx-2 mb-5 md:mb-10">
                    <x-hero />
                </div>
            </section>
            {{-- telefono --}}
            <section>
                <div class="mb-5 md:mb-10">
                    <x-telefono/>
                </div>
            </section>
            {{-- slider categorias --}}
            <section>
                <div class="mb-5 md:mb-10">
                    <x-slider-categorias />
                </div>
            </section>
            {{-- ofertas y ultimos productos --}}
            <div class="md:columns-2 md:mb-10">
                {{-- ofertas --}}
                <section>
                    <div class="mb-5">
                        <x-slider-ofertas />
                    </div>
                </section>
                {{-- ultimos productos --}}
                <section>
                    <div class="mb-5">
                        <x-slider-ultimos-productos :ultimos="$ultimos"/>
                    </div>
                </section>
            </div>
            {{-- mejor calificados --}}
            <section>
                <div class="mb-5">
                    <x-slider-mejor-calificados/>
                </div>
            </section>
        </div>
        {{-- celular y tablet fin --}}

        {{-- computador --}}
        <div class="hidden lg:block xl:block">
            <div class="grid grid-cols-5 gap-4 mt-10">
                <div class="col-start-2 col-span-1 pt-8">
                    <x-lista-categorias />
                </div>
                <div class="col-span-2">
                    <div class="row-span-2 p-1">
                        <div class="flex justify-center">
                            <div  class="inline-flex items-center justify-center w-10 h-10 mr-2 text-black transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-500 hover:text-white">
                                <i class="fa-solid fa-phone fa-xl"></i>
                            </div>
                            <div>
                                <p class="text-lg md:text-xl md:font-black">+569 66 419 506</p>
                                <div class="flex justify-start">
                                    <p class="text-sm md:text-xl">Contacto</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <x-hero />
                    </div>
                </div>
                <div class="col-start-2 col-span-3 mb-5">
                    <x-slider-categorias />
                </div>
                <div class="col-start-2 col-span-1 mt-5">
                    <x-slider-ofertas />
                </div>
                <div class="col-start-3 col-span-1 mt-5">
                    <x-slider-ultimos-productos :ultimos="$ultimos"/>
                </div>
                <div class="col-start-4 col-span-1 mt-5">
                    <x-slider-mejor-calificados/>
                </div>
            </div>
        </div>
        {{-- computador fin --}}

        <div id="mq">
            <div class="text-white hidden md:block lg:hidden">
                2
            </div>
            <div class="text-white md:hidden">
                1
            </div>
            <div class="text-white hidden lg:block">
                3
            </div>
        </div>

        @section('js')
            <script>
            $('#flecha-arriba').hide();
            $('#flecha-abajo').hide();
            </script>
        @endsection
@endsection
