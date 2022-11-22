<div>
    <div id="sidebar-carro" class="">
        <div id="overlay-carro" class="z-40 fixed h-screen w-screen bg-black opacity-40"></div>
        <div class="z-50 right-0 fixed h-screen w-4/5 md:w-3/5 lg:w-1/4 xl:w-1/5 bg-gray-100">

            
                <div class="grid grid-rows-18 h-full">
                    <div class="row-span-1">
                        <div class="flex justify-end">
                            <div class="pr-5 pt-3">
                                <i class="fa fa-x fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row-start-2 row-span-11 overflow-y-auto">
                        
                            @if(count($carrito)>0)
                                @for ($i=0; $i< count($carrito); $i++)
                                    <div class="row-span-2">
                                        <div class="flex relative border-b-2 border-black border-opacity-10 mt-5 mx-5 pb-5 ">
                                            <div class="h-32 w-24 mr-5">
                                                <img clas="object-cover h-32 w-24" src="{{asset('storage/imagenes/'.$carrito[$i]['imagenes'])}}" alt="">
                                            </div>
                                            <div>
                                                <div class="flex items-end">
                                                    <ul>
                                                        <li>
                                                            <p class="">
                                                                {{$carrito[$i]['nombre_producto']}}
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="font-bold text-lime-500">
                                                                @auth
                                                                {{$carrito[$i]['pivot']['cantidad_carrito']}} x ${{number_format($carrito[$i]['precio'], 0, ",", ".")}}
                                                                @endauth
                                                                @guest
                                                                {{$carrito[$i]['cantidad_carrito']}} x ${{number_format($carrito[$i]['precio'], 0, ",", ".")}}
                                                                @endguest
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="absolute bottom-4 right-0">
                                                <i class="fa fa-trash text-lime-500 hover:text-black active:text-red-400"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @else
                                <div class="flex justify-center items-center h-full">
                                    <p class="text-2xl font-bold text-gray-400">
                                        No hay productos en el carrito
                                    </p>
                                </div>
                            @endif
                       
                    </div>
                    <div class="row-start-14  row-span-4 border-t-2 bottom-0 bg-gray-200 border-black border-opacity-20">
                        <div class="mt-5 mb-10 space-y-4">
                            <div class="flex justify-center">
                                @auth
                                
                                @endauth
                            </div>
                            <div class="flex justify-center">
                                <button class="btn-tienda">
                                    Detalles Carrito
                                </button>
                            </div>
                            <div class="flex justify-center">
                                <button class="btn-tienda">
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </div>
               
                </div>
            
        </div>
    </div>
</div>