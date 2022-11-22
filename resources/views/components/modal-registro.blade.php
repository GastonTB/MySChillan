
<div>
    <div id="modal-registro" class="hidden">
        <div id="overlay-modal-registro" class="z-40 bg-black h-screen w-screen opacity-40 fixed"></div>
        <div class="flex justify-center">
            <div class="top-17/400 md:top-1/6 lg:top-17/400 md:text-lg z-50 w-11/12 h-11/12 md:h-7/12 lg:h-3/4 lg:w-1/2 bg-white fixed outline-none overflow-x-hidden overflow-y-auto">
                <div class="lg:px-5">
                    <form action="{{route('registro')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid h-full grid-cols-2 grid-rows-16 gap-3"> 
                            <div class="flex justify-center col-span-2 py-3">
                                <img class="object-scale-down h-16" src="{{asset('img/logos/logo.png')}}" alt="">
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="p_nombre" class="block mb-2 text-xs font-medium text-gray-900">Primer Nombre</label>
                                            <input value="{{old('nombre')}}" id="nombre" name="nombre" type="text" class=" border text-black text-sm rounded-sm block w-full p-2.5 border-gray-200 placeholder-gray-400" placeholder="Primer Nombre" >
                                            <span class="text-sm" style="color:red"><small>@error('nombre'){{$message}}@enderror</small></span>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="direccion" class="block mb-2 text-xs font-medium text-gray-900">Dirección</label>
                                            <input value="{{old('direccion')}}" name="direccion" type="text" class=" border text-black text-sm rounded-sm block w-full p-2.5 border-gray-200 placeholder-gray-400" placeholder="Calle, Numero de Casa, Depto" >
                                            <span class="text-sm" style="color:red"><small>@error('direccion'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="apellido_p" class="block mb-2 text-xs font-medium text-gray-900">Apellido Paterno</label>
                                            <input value="{{old('apellido_paterno')}}" name ="apellido_paterno" type="text" class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400" placeholder="Apellido Paterno" >
                                            <span class="text-sm" style="color:red"><small>@error('apellido_paterno'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="regiones" class="block mb-2 text-xs font-medium text-gray-900">Regiones</label>
                                            <select name="region" id="regiones" class="border border-gray-200 text-gray-900 text-sm rounded-am  block w-full p-2.5">
                                                @foreach ($regiones as $region)
                                                    <option value="{{$region->id}}">
                                                        {{$region->nombre_region}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="apellido_m" class="block mb-2 text-xs font-medium text-gray-900">Apellido Materno</label>
                                            <input value="{{old('apellido_materno')}}" name="apellido_materno" name="" type="text" class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400" placeholder="Apellido Materno" >
                                            <span class="text-sm" style="color:red"><small>@error('apellido_materno'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="comunas" class="block mb-2 text-xs font-medium text-gray-900">Comunas</label>
                                            <select name="comuna" id="comunas" class="border border-gray-200 text-gray-900 text-sm rounded-am  block w-full p-2.5">
                                                @foreach ($comunas as $comuna)
                                                    <option value="{{$comuna->region_id}}">
                                                        {{$comuna->nombre_comuna}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="correo" class="block mb-2 text-xs font-medium text-gray-900">Correo Electrónico</label>
                                            <input value="{{old('email')}}" name="email" type="text" class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400" placeholder="correo@correo.cl" >
                                            <span class="text-sm" style="color:red"><small>@error('email'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="contrasena" class="block mb-2 text-xs font-medium text-gray-900">Contraseña</label>
                                            <input name="contraseña" type="password" class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400" placeholder="********" >
                                            <span class="text-sm" style="color:red"><small>@error('contraseña'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="apellido_p" class="block mb-2 text-xs font-medium text-gray-900">Numero de Teléfono</label>
                                            <input value="{{old('telefono')}}" name="telefono" type="text" class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400" placeholder="+569 99 999 999" >
                                            <span class="text-sm" style="color:red"><small>@error('telefono'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label for="contrasena" class="block mb-2 text-xs font-medium text-gray-900">Confirmar Contraseña</label>
                                            <input name="contraseña_confirmation" type="password"  class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400" placeholder="********" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="mx-auto col-span-2 py-5">
                                <button type="submit" class="text-lg font-bold px-6 py-2.5 bg-lime-500 text-white rounded hover:bg-white hover:text-lime-500 hover:shadow-lg ">Ingresar</button type="submit">
                            </div>
                        </div>
                    </form> </div>    
            </div>
        </div>

    </div>
</div>

@section('js')
   
@endsection