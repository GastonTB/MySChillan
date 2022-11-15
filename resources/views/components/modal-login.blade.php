<div>
    <div id="modal-login" class="hidden">
        <div id="overlay-modal-login" class="z-40 fixed h-screen w-screen bg-black opacity-40"></div>
        <div class="flex justify-center">
            <div class="top-1/12 z-50 w-4/5 md:w-2/3 lg:w-1/4 bg-white fixed">
                <form action="{{route('ingresar')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid h-full grid-rows-5 gap-2"> 
                        <div class="flex justify-center py-3">
                            <img class="object-scale-down h-16" src="{{asset('img/logos/logo.png')}}" alt="">
                        </div>
                        <div class="">
                            <div class="mx-3">
                                <div>
                                    <div>
                                        {{-- correo --}}
                                        <label for="correo" class="block mb-2 text-xs font-medium text-gray-900">Correo Electronico</label>
                                        <input value="{{old('correo')}}" type="text" name="correo" id="correo_login" class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400" placeholder="correo@dominio.cl" required>
                                        <span class="text-sm" style="color:red"><small>@error('correo'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="mx-3">
                                <div>
                                    <div>
                                        {{-- contraseña --}}
                                        <label for="contrasena" class="block mb-2 text-sm font-medium text-gray-900">Contrasena</label>
                                        <input type="password" name="contraseña" id="contrasena_login" class=" border text-black text-sm rounded-sm  block w-full p-2.5 border-gray-200 placeholder-gray-400 " placeholder="******" required>
                                        <span class="text-sm" style="color:red"><small>@error('contraseña'){{$message}}@enderror</small></span>
                                        <span class="text-sm" style="color:red"><small>@if(session()->get('credenciales') == 'error-credenciales'){{$credenciales}}@endif</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mx-3">
                                <p class="text-sm text-gray-500">¿Olvidó su contraseña?</p>
                            </div>
                            <div class="mx-3">
                                <p class="text-sm text-gray-500">¿No tiene una cuenta? Registrarse</p>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <button type="submit" class="text-lg font-bold px-6 py-2.5 bg-green-500 text-white rounded hover:bg-white hover:text-green-500 hover:shadow-lg ">Ingresar</button>
                        </div>
                    </div>
                </form>     
        </div>
    </div>
</div>