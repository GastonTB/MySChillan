<div>
    <div id="sidebar" class="hidden">
        {{-- overlay --}}
        <div id="overlay-sidebar" class="z-10 fixed h-screen w-screen bg-black opacity-40"></div>
        <div class="z-20 h-full w-3/4 fixed md:w-2/4 bg-gray-100">
            {{-- contenido sidebar --}}
            <div class="grid h-screen grid-rows-10 gap-4">
                <div class="flex row-span-1">
                    <div class="m-auto">
                        <img class="object-scale-down h-16" src="{{asset('img/logos/logo.png')}}" alt="">
                    </div>
                </div>
                <div class="row-span-1 flex justify-center md:text-lg">
                    <div class="flex content-center">
                        <div class="grid content-center mx-1">
                            <i class="fa fa-lg fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                        <div class="grid content-center mx-1">
                            <p class="font-bold">$123.456</p>
                        </div>
                    </div>
                </div>
                <div class="row-span-1 flex justify-evenly md:text-lg">
                    <div class="grid content-center">
                        <ul class="flex space-x-5">
                            <li id="ingresar">
                                <a class="hover:text-green-500 flex space-x-2" href="#">
                                    <i class="fa fa-user"></i>
                                    <p class="">
                                        Ingresar
                                    </p>
                                </a>
                            </li>
                            <li id="registrarse">
                                <a class="hover:text-green-500 flex space-x-2" href="#">
                                    <i class="fa fa-user-plus"></i>
                                    <p class="">
                                        Registrarse
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- menu lista --}}
                <div class="pl-10 row-span-2">
                    <div class="flex">
                        <div class="grid content-center md:text-lg">
                            <ul class="space-y-3 font-semibold">
                                <div class="flex pb-1 hover:text-green-500 hover:text-lg">
                                    <li class="hover:text-xl">
                                        <a href="#">Inicio</a>
                                    </li>
                                </div>
                                <div class="flex pb-1 hover:text-green-500 hover:text-lg">
                                    <li class="hover:text-xl">
                                        <a href="#">Tienda</a>
                                    </li>
                                </div>
                                <div class="flex pb-1 hover:text-green-500 hover:text-lg">
                                    <li class="hover:text-xl">
                                        <a href="#">Carrito</a>
                                    </li>
                                </div>
                                <div class="flex pb-1 hover:text-green-500 hover:text-lg">
                                    <li class="hover:text-xl">
                                        <a href="#">Sobre Nosotros</a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- footer --}}
                <div class="border-2">
                    <footer>
                        <div class="py-5">
                            <div class="mb-5">
                                <ul class="flex justify-evenly md:text-2xl">
                                    <li>
                                        <p class="text-green-500 hover:text-white">
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </p>  
                                    </li>
                                    <li>
                                        <p class="text-green-500 hover:text-white">
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </p>    
                                    </li>
                                </ul>
                            </div>
                            <div class="pl-5">
                                <ul class="space-y-1 text-sm text-gray-600 md:text-md">
                                    <li>
                                        <p>Retiro Gratis en Tienda y Envios a Todo Chile</p>
                                    </li>
                                    <li>
                                        direccion
                                    </li>
                                    <li>
                                        telefono
                                    </li>
                                    <li>
                                        correo
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>