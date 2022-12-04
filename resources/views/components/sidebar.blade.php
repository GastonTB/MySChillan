<div>
    <div id="sidebar" class="select-none hidden">
        {{-- overlay --}}
        <div id="overlay-sidebar" class="z-20 fixed h-screen w-screen bg-black opacity-40"></div>
        <div class="sidebar-slide z-40 h-full w-3/4 fixed md:w-2/5 bg-gray-100 overflow-auto">
            <div>
                <div class="mt-5 flex">
                    <div>
                        <a href="{{route('inicio')}}">
                            <img class="h-16" src="{{asset('img/logos/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="absolute top-2 right-3">
                        <i id="cerrar-sidebar" class="fa fa-x active:lime-green-500"></i>
                    </div>
                </div>
                <div>
                    <div class="flex justify-center my-5">
                        <x-carrito/>
                    </div>
                    <div>
                        @auth
                        <div class="pl-5 mt-5">
                            <p class="items-end active:text-lime-500"><i class="fa fa-user fa-sm pr-1 text-lime-600"> </i>{{Auth::user()->name}} {{Session::get('apellido_paterno')}} {{Session::get('apellido_materno')}}</p>
                        </div>
                        <div class="flex pl-5 mb-2">
                            <div class="mr-1">
                                <i class="fa fa-sign-out text-lime-600" aria-hidden="true"></i>
                            </div>
                            <p>
                                <a class="active:text-lime-500" id="logout" href="{{route('salir')}}">Cerrar Sesión</a>
                            </p>
                        </div>
                     @endauth

                    @guest
                        <div class="pl-5 mt-5">
                            <ul class="space-x-3">
                                <li class="inline-block" id="ingresar">
                                    <a class="hover:text-lime-500 flex space-x-2" href="#">
                                        <p class="text-gray-700 active:text-lime-500">
                                            <i class="fa-sm fa fa-user text-lime-600"></i>
                                            Ingresar
                                        </p>
                                    </a>
                                </li>
                                <li class="inline-block" id="registrarse">
                                    <a class="hover:text-lime-500 flex space-x-2" href="#">
                                        <p class="text-gray-700 active:text-lime-500">
                                            <i class="fa-sm fa fa-user-plus text-lime-600"></i>
                                            Registrarse
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endguest
                    </div>

                    {{-- menu --}}
                    <div class="mt-5">
                        <ul class="px-5 space-y-3 text-gray-700">
                            <li class="border-b-2 pb-1 border-black border-opacity-10">
                                <a class="active:text-lime-500" href="{{route('inicio')}}">Inicio</a>
                            </li>
                            <li class="border-b-2 pb-1 border-black border-opacity-10">
                                <div class="flex">
                                    <a class="active:text-lime-500" id="tienda" href="#">Tienda <i id="abajo-tienda" class="fa fa-chevron-down fa-sm"></i><i id="arriba-tienda" class="fa fa-chevron-up hidden fa-sm"></i></a>
                                </div>
                                <ul id="lista-tienda" class="pl-10 space-y-2 mt-3 pb-1 hidden">
                                    <li><a href="{{route('tienda')}}">Todos los Productos</a></li>
                                    <li><a href="{{route('filtrados', ['id' => 1, 'minimo' => 0, 'maximo' => 100000])}}">Ornamentales</a></li>
                                    <li><a href="{{route('filtrados', ['id' => 2, 'minimo' => 0, 'maximo' => 100000])}}">Plantas de Interior</li>
                                    <li><a href="{{route('filtrados', ['id' => 3, 'minimo' => 0, 'maximo' => 100000])}}">Plantas de Exterior</li>
                                    <li><a href="{{route('filtrados', ['id' => 4, 'minimo' => 0, 'maximo' => 100000])}}">Suculentas</li>
                                    <li><a href="{{route('filtrados', ['id' => 5, 'minimo' => 0, 'maximo' => 100000])}}">Arboles Frutales</li>
                                    <li><a href="{{route('filtrados', ['id' => 6, 'minimo' => 0, 'maximo' => 100000])}}">Maceteros</li>
                                    <li><a href="{{route('filtrados', ['id' => 7, 'minimo' => 0, 'maximo' => 100000])}}">Tierra de Hojas</li>
                                    <li><a href="{{route('filtrados', ['id' => 8, 'minimo' => 0, 'maximo' => 100000])}}">Accesorios</li>
                                </ul>
                            </li>
                            <li class="border-b-2 pb-1 border-black border-opacity-10">
                                <a class="active:text-lime-500" href="#">Carrito</a>
                            </li>
                            @auth
                                <li class="border-b-2 pb-1 border-black border-opacity-10">
                                    <a class="active:text-lime-500" href="#">Perfil</a>
                                </li>
                                {{-- check if is admin --}}
                                @if (session()->get('rol')== 1)
                                <li class="border-b-2 pb-1 border-black border-opacity-10">
                                    <a id="back-office" class="active:text-lime-500" href="#">Back Office <i id="abajo-bo" class="fa fa-chevron-down fa-sm"></i><i id="arriba-bo" class="fa fa-chevron-up hidden fa-sm"></i></a>
                                    <ul id="lista-bo" class="pl-10 space-y-2 mt-3 pb-1 hidden">
                                        <li>Ver Listado Productos</li>
                                        <li>Ver Listado Ofertas</li>
                                        <li>Agregar Producto</li>
                                    </ul>
                                </li>
                                @endif
                            @endauth
                            <li class="border-b-2 pb-1 border-black border-opacity-10">
                                <a class="active:text-lime-500" href="#">Sobre Nosotros</a>
                            </li>
                        </ul>
                    </div>
                    <div class="my-5 pl-5">
                        <div class="flex space-x-3">
                            <i class="text-lime-600 fa fa-instagram font-bold"></i>
                            <i class="text-lime-600 fa fa-facebook font-bold"></i>
                        </div>
                    </div>
                    <div class="pl-5 text-gray-700 flex space-x-2">
                        <div>
                            <i class="fa fa-sm fa-envelope"></i>
                        </div>
                        <div class="text-sm select-auto">
                            <p>correo@correo.cl</p>
                        </div>
                    </div>
                    <div class="pl-5 text-gray-700 flex space-x-2 mt-2">
                        <div>
                            <i class="fa fa-sm fa-phone"></i>
                        </div>
                        <div class="text-sm select-auto">
                            <p>+569 66 419 506</p>
                        </div>
                    </div>
                    <div class="pl-5 text-gray-700 flex space-x-2 mt-2">
                        <div>
                            <i class="fa fa-sm fa-map-marker"></i>
                        </div>
                        <div class="text-sm">
                            <p>Pasaje Ñiquen 2795, Chillán, Chile</p>
                        </div>
                    </div>
                    <div class="pl-5 text-gray-700 flex space-x-2 mt-5">
                        <div class="text-sm">
                            <p>Envios a Todo Chile y Retiro en Tienda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>