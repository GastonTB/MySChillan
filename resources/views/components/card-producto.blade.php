<div class="px-10 md:px-0 ">
    <div class="hover:scale-110 transition ease-in-out delay-150 hover:shadow-xl shadow-md select-none">
        <form action="{{route('carrito')}}" method="POST">
            @csrf
            <div class="col-container mb-3 grid place-items-center producto border-black border-opacity-5 rounded-md bg-gray-100" id="{{$producto->id}}">
                <div class="relative flex-shrink-0">
                    <a href="{{route('detalles',$producto->id)}}">
                            <img class="object-scale-down rounded-t-md shadow-sm" src="{{asset('storage/imagenes/'.$producto->imagenes[0])}}"  alt="">
                    </a>
                    @if($producto->cantidad == 0)
                    <div class="absolute left-1/5 top-2/3 grid place-items-center">
                        <div class="flex justify-center">
                            <div class="mt-2">
                                <div class="flex justify-evenly">
                                    <div class="mr-5 font-bold px-6 py-2.5  bg-lime-500 text-white leading-tight uppercase rounded shadow-md hover:shadow-lg focus:bg-green-900 hover:bg-white hover:text-lime-500 focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-150 ease-in-out">
                                        SIN STOCK
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="py-5 space-y-1">
                    <div class="flex justify-center">
                        <p class="font-medium text-gray-700">{{$producto->nombre_producto}}</p>
                    </div>
                    <div>
                        @if($producto->oferta_id!=0)
                            <div class="flex justify-center space-x-3">
                                <div>
                                    <p class="font-semibold text-xl precio text-lime-700">
                                        ${{ number_format($producto->oferta->precio_oferta, 0, ",", ".")}}
                                    </p>
                                </div>
                                <div class="items-end flex">
                                    <p class="precio text-gray-700 line-through">
                                        ${{ number_format($producto->precio, 0, ",", ".")}}
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
                    @if($producto->cantidad > 0)
                        <button type="submit" class="btn-tienda">
                            Añadir al Carrito
                        </button>
                    @else
                        <button type="button" class="btn-tienda">
                            <a href="{{route('detalles',$producto->id)}}">
                                Detalles del Producto
                            </a>
                        </button>
                    @endif
                    
                </div>
            </div>
        </form>

    </div>
</div>