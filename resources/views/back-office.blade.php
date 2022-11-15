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
            <div class="md:grid lg:grid-cols-3 md:grid-cols-2">
                
                <div class="p-5">
                    <x-slider nombre="Más Vendidos"/>                
                </div>
                <div class="p-5">
                    <x-slider nombre="Mejor Calificados"/>
                </div>
                <div class="p-5">
                    <x-slider nombre="Ofertas Vigentes"/>
                </div>
            
        </div>
        </div>
    </div>
@endsection