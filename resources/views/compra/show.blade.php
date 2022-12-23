@extends('layaouts.master')

@section('content')
<div class="lg:grid grid-cols-5 mb-10">
    <div class="col-start-2 col-span-3">
        <div class="lg:grid grid-cols-3 mt-10">
            <div class="col-start-1 col-span-3">
                <p class="md:text-3xl text-xl font-black text-gray-700 px-5 lg:px-0">
                    FINALIZAR COMPRA
                </p>
                <div class="lg:grid grid-cols-3">
                    <div class="col-start-1 col-span-2">
                        <div class="mt-5 pr-10 px-5 py-5 lg:py-0">
                            <p class="font-black text-lg text-gray-700 border-b border-black border-opacity-10 pb-2">
                                Detalles de Facturación
                            </p>
                            <div class="columns-2 mt-5">
                                <div>
                                    <label class="relative">
                                        <input name="nombre" value="{{$user->name}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                        <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                            Nombre
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="relative">
                                        <input name="apellido_paterno" value="{{$meta->apellido_paterno}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                        <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                            Apellido Paterno
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    
                                </div>
                            </div>
                            <div class="columns-2 mt-5">
                                <div>
                                    <label class="relative">
                                        <input name="apellido_materno" value="{{$meta->apellido_materno}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                        <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                            Apellido Materno
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="relative">
                                        <input name="dirección" value="{{$meta->direccion}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                        <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                            Dirección
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    
                                </div>
                            </div>
                            <div class="columns-2 mt-5">
                                <div>
                                    <label class="relative">
                                        <select name="region" id="regiones" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2.5 px-5 transition duration-200">
                                            @foreach ($regiones as $region)
                                                <option
                                                @if($region->id == $region_user->id)
                                                    selected
                                                @endif
                                                value="{{$region->id}}">
                                                    {{$region->nombre_region}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                            Región
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="relative">
                                        <select name="comuna" id="comunas" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2.5 px-5 transition duration-200">
                                            @foreach ($comunas as $comuna)
                                                <option
                                                @if($comuna->id == $comuna_user->id)
                                                    selected
                                                @endif
                                                value="{{$comuna->id}}">
                                                    {{$comuna->nombre_comuna}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                            Región
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="columns-2 mt-5">
                                <div>
                                    <label class="relative">
                                        <input name="nombre" value="{{$user->email}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                        <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                            Correo Electronico
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="relative">
                                        <input name="apellido_paterno" value="{{$meta->telefono}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                        <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                            Teléfono
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 border-2 px-5 pt-5 mx-5 lg:mx-0">
                        <div>
                            <p class="font-black text-gray-700 text-lg">
                                Tu Pedido
                            </p>
                        </div>
                        <div class="columns-2 pt-5">
                            <div>
                                <p class="text-gray-700 font-semibold">
                                    Producto
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-700 font-semibold">
                                    Subtotal
                                </p>
                            </div>
                        </div>
                        @for($i=0; $i<count($carrito);$i++)
                        <div class="columns-2 text-green-500 py-2 border-b">
                            <div class="flex items-center space-x-2">
                                <div>
                                    {{$carrito[$i]['nombre_producto']}}
                                </div> 
                                <div>
                                    <p class="text-sm"> x </p>
                                </div> 
                               <div>
                                <p class="text-sm">{{$carrito[$i]['pivot']['cantidad_carrito']}}</p>
                               </div>
                            </div>
                            <div>
                                @php
                                    $subtotal = $carrito[$i]['precio'] * $carrito[$i]['pivot']['cantidad_carrito']
                                @endphp
                                ${{number_format($subtotal,0,',','.')}}
                            </div>
                        </div>
                        @endfor
                        <div class="columns-2 my-5">
                            <div>
                                Subtotal
                            </div>
                            <div>
                                ${{number_format($carro['total'],0,',','.')}}
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-center">
                                <img class="w-52" src="{{asset('img/logos/1.WebpayPlus_FB_800px.png')}}" alt="">
                            </div>
                            <div class="flex justify-center mt-3 pb-5">
                                <a href="{{route('webpayPagar')}}" class="btn-tienda">
                                    PAGAR
                                </a>
                            </div>
                            
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection