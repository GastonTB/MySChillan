<div class="select-none relative">
    <div id="overlay-busqueda" class="z-40 fixed h-screen w-screen bg-black opacity-40 hidden"></div>
    <div id="celular" class="lg:hidden">
        <div class="columns-2 mb-5">
            <div class="flex justify-start">
                <div class="items-center">
                    <a id="logo" href="{{route('inicio')}}" class="">
                        <img class="object-scale-down h-16 md:h-20" src="{{asset('img/logos/logo.png')}}" alt="">
                    </a>
                    <div class="hidden" id="espacio">
                        <br>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end content-center pr-3 pt-5 md:pr-5 md:pt-7">
                
                <div class="relative md:right-10 right-8 md:text-2xl text-xl">
                    <form action="{{route('buscar')}}" method="POST">
                        @csrf
                        <div class="absolute right-0 hidden md:block" id="busqueda">
                            <div class="flex items-center">
                                <input name="buscar"
                                @if(isset($buscar))
                                    value="{{$buscar}}"
                                @endif
                                type="text" class="w-64 py-1 border-2 px-5 text-sm border-1 md:border-2 md:py-1.5 rounded-l-md border-black border-opacity-20 outline-none focus:border-lime-500 transition duration-200" placeholder=" " id="buscador_movil">
                                <input type="hidden" name="categoria_busqueda" value="9" id="categoria_busqueda_movil">
                                <input type="hidden" name="minimo_busqueda" value="0" id="minimo_busqueda_movil">
                                <input type="hidden" name="maximo_busqueda" value="100000" id="maximo_busqueda_movil">
                                <input type="hidden" name="orden_busqueda" value="1" id="orden_busqueda_movil">
                                <button type="submit" class="bg-lime-500 md:py-1.5 py-1 px-2 rounded-r-md rounded-l-none text-sm md:text-base">
                                    <i class="fa fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="buscar" class="flex items-end pt-1 md:hidden md:text-3xl">
                        <i class="fa fa-magnifying-glass"></i>
                    </div>                    
                </div>
                <div class="flex items-end hover:text-lime-500 md:text-xl">
                    <x-carrito/>
                </div>
                <div id="boton-menu" class="md:text-3xl text-xl flex items-center">
                    <i class="fa fa-bars fa-3xl hover:text-lime-500"></i>
                </div>
            </div>
        </div>
    </div>
    <div id="pc" class="hidden lg:block xl:block">
        <div class="bg-gray-100 py-2 text-sm text-gray-500">
            <div class="grid grid-cols-4">
                <div class="flex justify-end">
                    <p class="border-r-2 pr-5">
                        correo@correo.cl
                    </p>
                </div>
                
                <div class="flex justify-start">
                        <p class="ml-5">
                            Retiro en tienda y envios a todo Chile
                        </p>
                </div>
                <div class="flex justify-end pr-5 border-r-2">    
                    <div class="mr-3 hover:text-lime-500">
                        <a href="https://www.instagram.com/mys_vivero/"><i class="fa fa-instagram fa-lg"></i></a>
                    </div>
                    <div class="hover:text-lime-500">
                        <a href="https://www.facebook.com/MySPlantasySuculentasChillan"><i class="fa fa-facebook fa-lg"></i></a>
                    </div>         
                </div>
                <div class="ml-5">
                    <div class="flex">
                        <div class="mr-4">
                            <div class="flex hover:text-lime-500">
                                @guest
                                    <div class="mr-2">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <p>
                                        <a id="ingresar2" href="#">Ingresar</a>
                                    </p>
                                @endguest
                                @auth
                                    <div class="mr-1">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <p>
                                        <a id="usuario" href="#">{{Auth::user()->name}} {{ session('apellido_paterno')}} {{ session('apellido_materno')}}</a>
                                    </p>
                                @endauth
                            </div>
                        </div>
                        <div class="flex hover:text-lime-500">
                            @guest
                                <div class="mr-2">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <p class="hover:text-lime-500">
                                    <a id="registrarse2" href="#">Registrarse</a>
                                </p>
                            @endguest
                            @auth
                                <div class="mr-1">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                </div>
                                <p>
                                    <a id="logout" href="{{route('salir')}}">Cerrar Sesión</a>
                                </p>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2">
            <div class="grid grid-cols-4 items-center">
                <div class="flex justify-end">
                    <a href="{{route('inicio')}}">
                        <img class="object-scale-down h-14" src="{{asset('img/logos/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="grid col-span-2 justify-evenly font-black text-lime-500">
                    <div class="flex @auth
                    lg:space-x-8 xl:space-x-10
                    @endauth space-x-16">
                        <div>
                            <a href="{{route('inicio')}}">
                                <p class=" hover:text-black">
                                    INICIO
                                </p>
                            </a>
                        </div>
                        <div>
                            <a href="{{route('tienda')}}">
                                <p class=" hover:text-black">
                                    TIENDA
                                </p>
                            </a>
                        </div>
                        @if(session('rol')==1)
                        <div class="relative">
                            <div id="admin">
                                <a href="{{route('backoffice')}}">
                                    <p class=" hover:text-black">
                                        BACK OFFICE
                                    </p>
                                </a>
                            </div>
                            <div id="opciones-admin" class="space-y-2 fixed hidden z-10 bg-white">
                                <ul clas="">
                                    <li class=" hover:text-black">
                                       <a href="{{route('listado-productos')}}">PRODUCTOS</a>
                                    </li>
                                    <li class=" hover:text-black">
                                        <a href="{{route('mostrarOfertas')}}">OFERTAS</a>
                                    </li>
                                    <li class=" hover:text-black">
                                        USUARIOS
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        @auth
                            <div>
                                <p class=" hover:text-black">
                                    PERFIL
                                </p>
                            </div>
                        @endauth
                        <div>
                            <p class=" hover:text-black">
                                <a href="{{route('nosotros')}}">SOBRE NOSOTROS</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="grid-cols-1">
                    <x-carrito/>
                </div>
            </div>
            <div class="grid grid-cols-5 items-center">
                <div class="col-start-3 col-span-1 mt-5">
                    <form action="{{route('buscar')}}" method="POST">
                        @csrf
                        <div class="flex justify-center">
                            <input name="buscar" 
                            @if(isset($buscar))
                            value="{{$buscar}}"
                            @endif
                            type="text" class="w-full border-1 md:border-2 py-1.5 rounded-l-md border-black border-opacity-20 outline-none focus:border-lime-500 px-5 transition duration-200" placeholder=" " id="buscador">
                            <input type="hidden" name="categoria_busqueda" value="9" id="categoria_busqueda">
                            <input type="hidden" name="minimo_busqueda" value="0" id="minimo_busqueda">
                            <input type="hidden" name="maximo_busqueda" value="100000" id="maximo_busqueda">
                            <input type="hidden" name="orden_busqueda" value="1" id="orden_busqueda">
                            <button type="submit" class="bg-lime-500 py-1.5  px-2 rounded-r-md rounded-l-none text-sm md:text-base">
                                <i class="fa fa-magnifying-glass"></i>
                            </button>
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>