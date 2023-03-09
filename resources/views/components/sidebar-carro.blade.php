<div>
    <div id="sidebar-carro" class="select-none hidden">
        <div id="overlay-carro" class="z-40 fixed h-screen w-screen bg-black opacity-40"></div>
        <div class="z-50 right-0 fixed h-screen w-4/5 md:w-2/5 lg:w-1/4 xl:w-1/5 bg-gray-100">

            
                <div class="grid grid-rows-18 h-full">
                    <div class="row-span-1">
                        <div class="flex justify-end">
                            <div class="pr-5 pt-3">
                                <i id="cerrar-carrito" class="fa fa-x hover:text-lime-500 active:text-lime-500"></i>
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
                                                            <p class="text-gray-700">
                                                        
                                                                @if($carrito[$i]['nombre_producto']>10)
                                                                {{substr($carrito[$i]['nombre_producto'], 0,20)}}...
                                                                @else
                                                                    {{$carrito[$i]['nombre_producto']}}
                                                                @endif
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
                                                @auth
                                                    @php
                                                    $id_producto = $carrito[$i]['id']
                                                    @endphp
                                                @endauth
                                                @guest
                                                    @php    
                                                    $id_producto = $carrito[$i]['producto_id']
                                                    @endphp
                                                @endguest
                                               <form action="{{route('borrarProductoCarro',$id_producto)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                    <button href="#" class="fa fa-trash hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400"></button>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @else
                                <div class="row-start-2">
                                    <div class="flex justify-center items-center h-full">
                                        <p class="text-xl font-bold text-gray-700">
                                            No hay productos en el carrito
                                        </p>
                                    </div>
                                </div>
                            @endif
                    </div>
                    @if(count($carrito)!=0)
                    <div class="row-start-14  row-span-4 border-t-2 bottom-0 bg-gray-200 border-black border-opacity-20">
                        <div class="mt-5 mb-10 space-y-4">
                            <div class="flex justify-center space-x-2">
                                <p class="text-gray-900 text-lg font-bold">
                                    TOTAL: 
                                </p>
                                <p class="font-black text-xl text-gray-900">
                                    ${{number_format($carro['total'], 0, ",", ".")}}
                                </p>
                            </div>
                            <div class="flex justify-center">
                                <a href="{{route('mostrarCarrito', $id_carrito)}}" class="btn-tienda">
                                    Ir al carrito
                                </a>
                            </div>
                            <div class="flex justify-center">
                                <a  href="{{route('comprar', $id_carrito)}}" class="btn-tienda">
                                    Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
        </div>
    </div>
</div>