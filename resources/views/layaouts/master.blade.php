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
       
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        @yield('css')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="flex flex-col min-h-screen body">
        @include('sweetalert::alert')
        @yield('modales')    

        {{-- sidebar --}}
        <section>
            <x-sidebar-carro :carrito="$carrito" :id_carrito="$id_carrito"/>
        </section>
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
        <nav>
                @if(isset($buscar))
                    @php $buscar = $buscar; @endphp
                @else
                @php $buscar =''; @endphp
                @endif
            <x-navbar :buscar="$buscar"/>
        </nav>


        <div>
            @yield('content')
        </div>

        

        {{-- footer --}}
        <footer class="mt-auto">
            <x-footer/>
        </footer>
        

    </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script
src="https://code.jquery.com/jquery-3.6.1.min.js"
integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
crossorigin="anonymous"></script>
<script src="{{asset('js/main.js')}}"></script>
<script type="text/javascript">
    @if (session()->get('message') == 'error-registro')
        $('#modal-registro').removeClass('hidden');
    @endif

    @if(session()->get('message') == 'error-login')
        $('#modal-login').removeClass('hidden');
    @endif

</script>
@yield('js')