<div>
    <div class="cursor-pointer">
        <div class="col-container mb-3 grid place-items-center producto" id="{{$producto->id}}">
            <div class="relative flex-shrink-0">
                <img class="object-scale-down py-5 px-5" src="{{asset('storage/imagenes/'.$producto->imagenes[0])}}"  alt="">
                {{-- <div class="grid place-items-center">
                    <div class="flex justify-evenly">
                        <div class="mt-2">
                            <div class="flex justify-evenly">
                                <div class="text-xl mr-5 font-bold px-6 py-2.5  bg-green-500 text-white leading-tight uppercase rounded shadow-md hover:shadow-lg focus:bg-green-900 hover:bg-white hover:text-green-500 focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-150 ease-in-out">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <div class="text-xl font-bold px-6 py-2.5 bg-green-500 text-white leading-tight uppercase rounded shadow-md hover:shadow-lg focus:bg-green-900 hover:bg-white hover:text-green-500 focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-150 ease-in-out">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="mt-2">
                <ul class="">
                    <li class="">
                        <p class="text-md">
                            {{$producto->nombre_producto}}
                        </p>
                    </li>
                    <li class="py-1">
                        <p class="text-lg font-black flex justify-center">
                            ${{$producto->precio}}
                        </p>
                    </li>
                    <li class="py-1">
                        <p class="text-sm line-through text-red-500">
                           
                        </p>
                    </li>
                </ul>
            </div>
            
        </div>

    </div>
</div>