<div class="col-span-1">
    <div class="hover:scale-110 transition ease-in-out delay-150 hover:shadow-xl shadow-md select-none">
        <form action="{{route('carrito')}}" method="POST">
            @csrf
            <div class="col-container mb-3 grid place-items-center producto border-black border-opacity-5 rounded-md bg-gray-100" id="{{$producto->id}}">
                <div class="relative flex-shrink-0">
                    <a href="{{route('detalles',$producto->id)}}">
                            <img class="rounded-t-md shadow-sm" src="{{asset('storage/imagenes/'.$producto->imagenes[0])}}"  alt="">
                    </a>
                    @if($producto->oferta_id != 0 && $producto->oferta->estado_oferta!=0)
                        @if ($contador%2 != 0 && $contador!=0)
                                  
                            <div class="absolute top-0 -right-12 text-white text-xs font-bold rotate-45">
                                <div class="flex items-end">
                                    <div class="w-11  overflow-hidden inline-block">
                                        <div class=" h-16  bg-lime-500 rotate-45 transform origin-bottom-left">
                                            <div class=" my-1 rotate-90 transform origin-bottom-left">
                                                <p class="text-green-500 text-lg">
                                                &nbsp;
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="h-11 flex items-center bg-lime-500">
                                        <div class=" my-1">
                                            <p class="text-white text-lg">
                                                OFERTA
                                            </p>
                                        </div>
                                    </div>
                                    <div class="w-11  overflow-hidden inline-block">
                                        <div class=" h-16  bg-lime-500 -rotate-45 transform origin-bottom-right">
                                            <div class=" my-1">
                                                <p class="text-lg -rotate-45 transform origin-top-left">
                                                &nbsp;
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @elseif ($contador%2==0 && $contador!=0)
                            <div class="absolute top-0 -left-12 text-white text-xs font-bold -rotate-45">
                                <div class="flex items-end">
                                    <div class="w-11  overflow-hidden inline-block">
                                        <div class=" h-16  bg-lime-500 rotate-45 transform origin-bottom-left">
                                            <div class=" my-1 rotate-90 transform origin-bottom-left">
                                                <p class="text-green-500 text-lg">
                                                &nbsp;
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="h-11 flex items-center bg-lime-500">
                                        <div class=" my-1">
                                            <p class="text-white text-lg">
                                                OFERTA
                                            </p>
                                        </div>
                                    </div>
                                    <div class="w-11  overflow-hidden inline-block">
                                        <div class=" h-16  bg-lime-500 -rotate-45 transform origin-bottom-right">
                                            <div class=" my-1">
                                                <p class="text-lg -rotate-45 transform origin-top-left">
                                                &nbsp;
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        @endif
                        @if($contador == 0)
                            <div class="absolute top-0 -right-12 text-white text-xs font-bold rotate-45">
                                <div class="flex items-end">
                                    <div class="w-11  overflow-hidden inline-block">
                                        <div class=" h-16  bg-lime-500 rotate-45 transform origin-bottom-left">
                                            <div class=" my-1 rotate-90 transform origin-bottom-left">
                                                <p class="text-green-500 text-lg">
                                                &nbsp;
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="h-11 flex items-center bg-lime-500">
                                        <div class=" my-1">
                                            <p class="text-white text-lg">
                                                OFERTA
                                            </p>
                                        </div>
                                    </div>
                                    <div class="w-11  overflow-hidden inline-block">
                                        <div class=" h-16  bg-lime-500 -rotate-45 transform origin-bottom-right">
                                            <div class="my-1">
                                                <p class="text-lg -rotate-45 transform origin-top-left">
                                                &nbsp;
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif
                    @endif
                    @if($producto->cantidad == 0)
                    <div class="absolute left-0 right-0 top-2/3 grid place-items-center">
                        <div class="flex justify-center">
                            <div class="mt-2">
                                <div class="flex justify-evenly">
                                    <div class="btn-tienda bg-opacity-80">
                                        SIN STOCK
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="xl:py-5 lg:py-2 xl:space-y-1 lg:space-x-0">
                    <div class="flex justify-center mt-3 md:mt-0">
                        <p class="font-medium text-gray-700 hidden md:block">
                            @if(strlen($producto->nombre_producto) > 20)
                                {{substr($producto->nombre_producto,0,20)}}...
                            @else
                                {{$producto->nombre_producto}}
                            @endif
                        </p>
                        <p class="font-medium text-gray-700 md:hidden">
                            @if(strlen($producto->nombre_producto) > 10)
                                {{substr($producto->nombre_producto,0,10)}}...
                            @else
                                {{$producto->nombre_producto}}
                            @endif
                        </p>
                    </div>
                    <div>
                        @php
                            $original = $producto->precio 
                        @endphp
                        @if($producto->oferta_id!=0 && $producto->oferta->estado_oferta == 1)
                            <div class="flex justify-center space-x-3">
                                <div>
                                    <p class="font-semibold text-xl precio text-lime-700">
                                        ${{ number_format($producto->oferta->precio_oferta, 0, ",", ".")}}
                                    </p>
                                </div>
                                <div class="items-end flex">
                                    <p class="precio text-gray-700 line-through">
                                        ${{ number_format($original, 0, ",", ".")}}
                                    </p>
                                </div>
                            </div>
                        @else
                        <div class="flex justify-center">
                            <p class="font-semibold text-xl precio text-lime-700">
                                ${{ number_format($producto->precio, 0, ",", ".")}}
                            </p>
                        </div>
                        @endif
                    </div>
                    <input type="hidden" name="cantidad" value="1">
                    <input type="hidden" name="producto" value="{{$producto->id}}">
                    <div class="mb-3 px-3 md:px-0">
                        @if($producto->cantidad > 0)
                        <div class="flex justify-center md:px-0 lg:px-3">
                            <button type="submit" class="btn-tienda">
                                Añadir al Carrito
                            </button>
                        </div>
                    @else
                        <div class="flex justify-center md:px-0 lg:px-3">
                            <button type="button" class="btn-tienda text-xs">
                                <a href="{{route('detalles',$producto->id)}}">
                                    Detalles del Producto
                                </a>
                            </button>
                        </div>
                    @endif
                    </div>
                    
                </div>
            </div>
        </form>

    </div>
</div>