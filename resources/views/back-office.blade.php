@extends('layaouts.master')

@section('content')
    <div class="lg:grid lg:grid-cols-5 mt-10">
        <div class="lg:grid lg:col-start-2 lg:col-span-3">
            <div class="md:grid md:grid-cols-3">
                <div>
                    <div class="px-5 py-5">
                        <x-crud-productos/>
                    </div>
                </div>
                <div>
                    <div class="px-5 py-5">
                        <x-crud-ofertas/>
                    </div>
                </div>
                <div class="lg:flex lg:items-center lg:justify-center px-5 py-5">
                    <x-crud-usuarios/>
                </div> 
            </div>
            <div class="md:grid lg:grid-cols-3 md:grid-cols-2 space-x-3">   
                <div class="border-2">
                    <div class="flex justify-center mb-3">
                        <p class="text-lg font-bold text-gray-700">Cantidad de unidades en Stock</p>
                    </div>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="border-2">
                    <div class="grid grid-cols-1 items-end">
                        <div class="flex justify-center mb-3">
                            <p class="text-lg font-bold text-gray-700">Productos por Categoria en Stock</p>
                        </div>
                        
                        <div class="grid ">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="border-2">
                    <div class="flex justify-center mb-3">
                        <p class="text-lg font-bold text-gray-700">Total Productos por Categoria en Stock</p>
                    </div>
                    <div class="grid items-end">
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
            </div>
            <div class="md:grid lg:grid-cols-3 md:grid-cols-2">   
                <div class="p-5">
                    <x-slider nombre="Más Vendidos"/>                
                </div>
                <div class="p-5">
                    <x-slider nombre="Mejor Calificados"/>
                </div>
                <div class="p-5">
                    <x-slider-ofertas :ofertas="$ofertas"/>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>

    <script>
        var swiper6 = new Swiper("#ofertas-slider", {
                slidesPerView: 1,
                spaceBetween: 10,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                navigation: {
                nextEl: "#oferta-derecha",
                prevEl: "#oferta-izquierda",
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                }
                });

        const ctx = document.getElementById('myChart');
        var productos = [];
        var cantidad = [];
        @foreach ($productos as $producto)
            productos.push("{{$producto->nombre_producto}}");
            cantidad.push("{{$producto->cantidad}}");
        @endforeach

        new Chart(ctx, {
          type: 'pie',
          data: {

            labels: productos,
            datasets: [{
              label: 'Unidades',
              data: cantidad,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              
            }
          }
        });

        const ctx2 = document.getElementById('myChart2');
        var categorias = [];
        var cantidad2 = [];
        @foreach ($array as $categoria)
            categorias.push("{{$categoria->nombre_categoria}}");
            cantidad2.push("{{$categoria->productos}}");
        @endforeach
        new Chart(ctx2, {
            type: 'bar',
          data: {
            labels: categorias,
            datasets: [{
              label: 'Productos',
              data: cantidad2,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 10
                }
              }
            }
          }
        });

        const ctx3 = document.getElementById('myChart3');
        var categorias2= [];
        var cantidad3 = [];
        @foreach ($array2 as $categoria2)
            categorias2.push("{{$categoria2->nombre_categoria}}");
            cantidad3.push("{{$categoria2->productos}}");
        @endforeach
        new Chart(ctx3, {
            type: 'bar',
          data: {
            labels: categorias2,
            datasets: [{
              label: 'Productos',
              data: cantidad3,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 100
                }
              }
              
            }
          }
        });

      </script>
@endsection
@endsection