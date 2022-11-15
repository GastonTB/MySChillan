<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jardin MyS</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
         {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/b64d0c0a86.js" crossorigin="anonymous"></script>

        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
       
        <link rel="stylesheet" href="css/style.css">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>
        @include('sweetalert::alert')
        {{-- sidebar --}}
        <section>
            <x-sidebar/>
        </section>
        {{-- modal login --}}
        <section>
            <x-modal-login/>
        </section>
        {{-- modal registro --}}
        <section>
                <x-modal-registro :regiones="$regiones" :comunas="$comunas"/>
        </section>
        {{-- navbar --}}
        <nav>
            <x-navbar/>
        </nav>


        <div>
            @yield('content')
        </div>

        

        {{-- footer --}}
        <footer>
            <div class="py-5 bg-gray-100">
                <div class="flex justify-center md:justify-start pb-2">
                    <img class="object-scale-down h-12 md:h-16" src="img/logos/logo.png" alt="">
                </div>
                <div class="flex justify-evenly">
                    <div class="flex justify-center md:justify-start md:ml-5">
                        <ul>
                            <li class="mb-2">
                                <div class="md:hidden lg:hidden xl:hidden">
                                    <p class="text-sm md:text-lg">
                                        Retiro gratis en tienda y 
                                    </p>
                                    <p class="text-sm md:text-lg">
                                        envios a todo Chile
                                    </p>
                                </div>
                                <div class="hidden md:block">
                                    Retiro gratis en tienda y envios a todo Chile
                                </div>
                            </li>
                            <li>
                                <p class="text-sm md:text-lg">
                                    +56966419506
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="md:flex md:justify-end">
                        <div class="mb-2">
                            <p class="text-sm">
                                correo@correo.cl
                            </p>
                        </div>
                        <div>
                            <ul class="flex justify-evenly">
                                <li>
                                    <p class="text-green-500">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </p>  
                                </li>
                                <li>
                                    <p class="text-green-500">
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </p>    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        @yield('js')

        <script type="text/javascript">
            @if (session()->get('message') == 'error-registro')
                $('#modal-registro').show();
            @endif
        </script>
        <script>
            @if(session()->get('message') == 'error-login')
                $('#modal-login').show();
            @endif 
        </script>

    </body>
</html>