@extends('layaouts.master')

@section('content')
{{-- celular y tablet --}}
        <div class=" lg:hidden xl:hidden">
            <section>
                <div class="flex justify-center items-center py-5">
                    <x-carrito />
                </div>
            </section>
            <section>
                <div class="mx-3 mb-5">
                    <x-lista-categorias/>
                </div>
            </section>
            <section>
                <div class="mb-5">
                    <x-telefono/>
                </div>
            </section>
            <section>
                <div class="mb-5">
                    <div class="relative bg-black bg-opacity-50">
                        <img class="object-cover w-full" src="img/banner/banner-1.jpg" alt="">
                        <div class="absolute top-1/6 left-1/3">
                            <p class="font-black text-4xl md:text-6xl text-yellow-500" style="text-shadow: #E5E9F0 1px 0px 0px, #E5E9F0 0.540302px 0.841471px 0px, #E5E9F0 -0.416147px 0.909297px 0px, rgb(255, 255, 255) -0.989992px 0.14112px 0px, rgb(255, 255, 255) -0.653644px -0.756802px 0px, rgb(255, 255, 255) 0.283662px -0.958924px 0px, rgb(255, 255, 255) 0.96017px -0.279415px 0px;">
                                Tienda
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="md:grid md:grid-cols-7 gap-1">
                    <div class="col-span-3 lg:col-span-2">
                            
                            <div class="mb-5">
                                <x-filtro-categorias/>                               
                            </div>
                            <div class="mb-5">
                                <x-slider-ofertas/>
                            </div>
                            <div class="mb-5">
                                <x-slider-ultimos-productos/>
                            </div>
                    </div>
                    
                    <div class="col-span-4 lg:col-span-5 p-4">
                        
                            
               

                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                            
                            
                        @foreach ($productos as $producto)
                        <x-card-producto :producto="$producto" />
                        @endforeach
                           
                            
                            
                            
                           
                        </div>
                                
                                
                                
                            
            
                        
                           
                        
                    </div>
                </div>  
            </section>
        </div>
{{-- celular y tablet fin --}}


{{-- pc --}}
    <div class="hidden lg:block xl:block">
        <div class="grid xl:grid-cols-5 lg:grid-cols-7 mt-10 gap-4">
            <div class="col-start-2 flex justify-start">
                <div class="columns-1">
                    <div class="my-10">
                        <x-filtro-categorias/>
                    </div>
                    <div class="my-10">
                        <x-slider-ofertas/>
                    </div>
                    <div class="my-10">
                        <x-slider-ultimos-productos/>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-2 lg:col-span-4 p-4">
                <div class="grid grid-cols-3  gap-4">
                     @foreach ($productos as $producto)
                        <x-card-producto :producto="$producto"/>
                    @endforeach  
                </div> 
            </div>
        </div>
    </div>
{{-- fin PC --}}




@section('js')
<script>
    $('.flecha-arriba').hide();
    $('.categoria').hide();

$('.flecha-abajo').on('click', function(){
    $('.flecha-arriba').show();
    $('.flecha-abajo').hide();
    $('.categoria').hide();
});

$('.flecha-arriba').on('click', function(){
    $('.flecha-arriba').hide();
    $('.flecha-abajo').show();
    $('.categoria').show();
});




</script>
@endsection
@endsection