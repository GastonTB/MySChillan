
<div>
    <div id="modal-registro" class="hidden">
        <div id="overlay-modal-registro" class="z-40 bg-black h-screen w-screen opacity-40 fixed"></div>
        <div class="flex justify-center">
            <div class="top-17/400 rounded-md md:top-1/6 lg:top-17/400 xl:top-1/10 md:text-lg z-50 w-11/12 h-11/12 custombp:h-7/10 md:h-8/12 lg:h-3/4 lg:w-1/2 xl:h-6/10 xl:w-1/3 bg-white fixed outline-none overflow-x-hidden overflow-y-auto">
                <div class="lg:px-5">
                    <form action="{{route('registro')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid h-full grid-cols-2 md:gap-3 gap-0"> 
                            <div class="flex justify-center col-span-2 mt-2 py-3">
                                <img class="object-scale-down h-16" src="{{asset('img/logos/logo.png')}}" alt="">
                            </div>
                            <div class="col-span-1 order-1">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="nombre" value="{{old('nombre')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Nombre
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>@error('nombre'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-4">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="direccion" value="{{old('direccion')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Direccion
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>@error('direccion'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="apellido_paterno" value="{{old('apellido_paterno')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Apellido Paterno
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>@error('apellido_paterno'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-1 col-span-2 order-5">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <select name="region" id="regiones" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2.5 px-5 transition duration-200">
                                                    @foreach ($regiones as $region)
                                                        <option value="{{$region->id}}">
                                                            {{$region->nombre_region}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                    Región
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-3">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="apellido_materno" value="{{old('apellido_materno')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Apellido Materno
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>@error('apellido_materno'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 md:col-span-1 order-6">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <select name="comuna" id="comunas" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2 px-5 transition duration-200">
                                                    @foreach ($comunas as $comuna)
                                                        <option value="{{$comuna->region_id}}">
                                                            {{$comuna->nombre_comuna}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                    Comuna
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-7">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="correo" value="{{old('correo')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Correo
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>@error('correo'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-9">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="contraseña" type="password" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                                    Contraseña
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>@error('contraseña'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-8">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="telefono" id="telefono_registro" value="{{old('telefono')}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Teléfono
                                                </span>
                                            </label>
                                        </div>
                                        <div>
                                            <span id="error-telefono" class="text-sm hidden" style="color:red"><small>El Numero de Teléfono debe comenzar con un 9</small></span>
                                        </div>
                                        <div>
                                            <span class="text-sm" style="color:red"><small>@error('telefono'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 order-10">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <label class="relative">
                                            <input name="contraseña_confirmation" type="password" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                               Confirme Contraseña
                                            </span>
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 order-11">
                                <div class="flex justify-center">
                                    <div class="mx-auto col-span-2 py-5">
                                        <button type="submit" class="btn-primary">Registrarse</button type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> </div>    
            </div>
        </div>

    </div>
</div>

@section('js')
   
@endsection