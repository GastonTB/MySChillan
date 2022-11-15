<div>
    <div class="">
        <div class="col-container mb-3 grid place-items-center producto" id="{{$producto->id}}">
            <div class="relative flex-shrink-0">
                <a href="{{route('detalles',$producto->id)}}">
                    <img class="object-scale-down py-5 px-5" src="{{asset('storage/imagenes/'.$producto->imagenes[0])}}"  alt="">
                </a>
                @if($producto->cantidad == 0)
                <div class="absolute left-1/5 top-2/3 grid place-items-center">
                    <div class="flex justify-center">
                        <div class="mt-2">
                            <div class="flex justify-evenly">
                                <div class="mr-5 font-bold px-6 py-2.5  bg-green-500 text-white leading-tight uppercase rounded shadow-md hover:shadow-lg focus:bg-green-900 hover:bg-white hover:text-green-500 focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-150 ease-in-out">
                                    SIN STOCK
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="space-y-1">
                <div class="flex justify-center">
                    <p class="font-medium">{{$producto->nombre_producto}}</p>
                </div>
                <div  class="flex justify-center">
                    <p class="font-semibold text-xl precio">
                        $ {{ number_format($producto->precio, 0, ",", ".")}}
                    </p>
                </div>
                <button class="btn-tienda">
                    Añadir al Carrito
                </button>
                
            </div>
        </div>

    </div>
</div>