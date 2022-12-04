@extends('layaouts.master')

@section('content')
<div class="flex justify-center">
    <p class="text-3xl font-semibold my-3">
        Crear Nuevo Producto
    </p>
</div>
<form action="{{route('crearproducto2')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid xl:grid-cols-5 lg:grid-cols-7 md:grid-cols-1 gap-4 pb-10">
        <div class="xl:col-start-2 xl:col-span-3 lg:col-start-2 lg:col-span-5 mt-10 ">
            <div class="grid xl:grid-cols-5 md:grid-cols-2 ">
                {{-- izquierda --}}
                <div class="xl:col-span-2 lg:order-2">
                    <div class="grid xl:grid-cols-5 gap-4">                        
                        <div class="xl:col-start-2 xl:col-span-3 galeria">
                            <div class="flex justify-center items-center">
                                <img id="preview-imagen-0" class="xl:object-cover md:object-scale-down py-15 px-5 mb-5 mt-10" src="" alt="">
                            </div>
                        </div>      
                    </div>
                    <div class="flex justify-center items-center mt-10">
                        <div class="flex space-x-2">
                            <div id ="imagen-boton-0" class="btn-tienda md:btn-primary boton">
                                SUBIR IMAGEN 1
                            </div>
                            <div id ="borrar-boton-0" class="btn-red">
                                <i class="fa fa-trash-can"></i>
                            </div>
                        </div>
                    </div>
                    <div class="grid xl:grid-cols-5 gap-4">                        
                        <div class="xl:col-start-2 xl:col-span-3 galeria">
                            <div class="flex justify-center items-center">
                                <img id="preview-imagen-1" class="xl:object-cover md:object-scale-down py-15 px-5 mb-5 mt-10" src="" alt="">
                            </div>
                        </div>      
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="flex space-x-2">
                            <div id ="imagen-boton-1" class="btn-tienda md:btn-primary boton">
                                SUBIR IMAGEN 2
                            </div>
                            <div id ="borrar-boton-1" class="btn-red">
                                <i class="fa fa-trash-can"></i>
                            </div>
                        </div>
                    </div>
                    <div class="grid xl:grid-cols-5 gap-4">                        
                        <div class="xl:col-start-2 xl:col-span-3 galeria">
                            <div class="flex justify-center items-center">
                                <img id="preview-imagen-2" class="xl:object-cover md:object-scale-down py-15 px-5  mb-5 mt-10" src="" alt="">
                            </div>
                        </div>      
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="flex space-x-2">
                            <div id ="imagen-boton-2" class="btn-tienda md:btn-primary boton">
                                SUBIR IMAGEN 3
                            </div>
                            <div id ="borrar-boton-2" class="btn-red">
                                <i class="fa fa-trash-can"></i>
                            </div>
                        </div>
                    </div>
                    <div class="grid xl:grid-cols-5 gap-4">                        
                        <div class="col-start-2 col-span-3 galeria">
                            <div class="flex justify-center items-center">
                                <img id="preview-imagen-3" class="xl:object-cover md:object-scale-down py-15 px-5 mb-5 mt-10" src="" alt="">
                            </div>
                        </div>      
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="flex space-x-2">
                            <div id ="imagen-boton-3" class="btn-tienda md:btn-primary boton">
                                SUBIR IMAGEN 4
                            </div>
                            <div id ="borrar-boton-3" class="btn-red">
                                <i class="fa fa-trash-can"></i>
                            </div>
                        </div>
                    </div>
                    <div class="hidden">
                        <input name="imagen0" id="imagen-0" type="file" accept="image/*">
                        <input name="imagen1" id="imagen-1" type="file" accept="image/*">
                        <input name="imagen2" id="imagen-2" type="file" accept="image/*">
                        <input name="imagen3" id="imagen-3" type="file" accept="image/*">
                    </div>
                    <div class="errores flex justify-center mt-5">
                        <span id="alerta-1" hidden class=" text-red-500"><small>Por favor suba una imagen con una proporción de 4:3 </small></span>
                        <span id="alerta-1" class=" text-red-500"><small>{{session()->get('message')}} </small></span>
                    </div>

                    
                    
                </div>
                {{-- derecha --}}
                <div class="xl:col-span-3 lg:order-1">
                    <div class="pl-10 mt-5">
                        <label class="md:text-xl mb-2 font-medium text-gray-900">Nombre del Producto</label>
                        <input value="{{old('nombre')}}" name="nombre" type="text" class=" border text-black rounded-sm block w-3/4 p-2.5 border-gray-300 placeholder-gray-400" placeholder="Nombre del Producto" >
                        <span class="xl:text-sm md:text-md" style="color:red"><small>@error('nombre'){{$message}}@enderror</small></span>
                    </div>
                    <div class="flex">
                        <div class="pl-10 mt-5">
                            <label class="md:text-xl mb-2 font-medium text-gray-900">Precio del Producto</label>
                            <input value="{{old('precio')}}" id="precio" name="precio" type="number" class=" border text-black rounded-sm block w-3/4 p-2.5 border-gray-300 placeholder-gray-400" placeholder="$Precio">
                            <span class="xl:text-sm md:text-md" style="color:red"><small>@error('precio'){{$message}}@enderror</small></span>
                        </div>
                        <div class="pl-10 mt-5">
                            <label class="md:text-xl mb-2 font-medium text-gray-900">Stock</label>
                            <input value="{{old('cantidad')}}" id="cantidad" name="cantidad" type="number" class=" border text-black rounded-sm block w-3/4 p-2.5 border-gray-300 placeholder-gray-400" placeholder="Cantidad">
                            <span class="xl:text-sm md:text-md" style="color:red"><small>@error('cantidad'){{$message}}@enderror</small></span>
                        </div>
                    </div>
                    <div class="pl-10 mt-5">
                        @foreach ($categorias as $categoria)
                            <div>
                                <input id="{{$categoria->id}}" name="categorias[]" value="{{$categoria->id}} " @if(is_array(old('categorias')) && in_array($categoria->id, old('categorias'))) checked @endif class="categorias form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-lime-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                <label class="md:text-xl" for="">{{$categoria->nombre_categoria}}</label>
                            </div>
                        @endforeach
                        <span class="text-sm md:text-md" style="color:red"><small>@error('categorias'){{$message}}@enderror</small></span>
                    </div>
    
                    <div class="pl-10 mt-5">
                        <ul class="pestañas flex flex-wrap text-sm  font-medium text-center text-gray-500 border-b border-gray-200">
                            <li id="descripcion" class="xl:mr-2 inline-block p-4 sm:p-2 text-lime-500 bg-gray-100 rounded-t-xl active">
                                <a href="#" aria-current="page">Descripción</a>
                            </li>
                            <li id="temporada" class="xl:mr-2 inline-block p-4 sm:p-2 rounded-t-xl hover:text-gray-600 hover:bg-gray-100">
                                <a href="#">Temporada</a>
                            </li>
                            <li id="caracteristicas" class="xl:mr-2 inline-block p-4 sm:p-2 rounded-t-xl hover:text-gray-600 hover:bg-gray-100">
                                <a href="#" >Caracteristicas</a>
                            </li>
                            <li id="cuidados" class="xl:mr-2 inline-block p-4 sm:p-2 rounded-t-xl hover:text-gray-600 hover:bg-gray-100">
                                <a href="#" >Cuidados</a>
                            </li>
                        </ul>
                        <div class="text mb-10">
                            <textarea id="descripcion-text" class="border-2 texto" name="descripcion_text" id="" cols="35" rows="7">{{old('descripcion_text')}}</textarea>
                            <div id="temporada-text" class="texto hidden">
                                <div>
                                    <input name="temporada_text[]" value="1" @if(is_array(old('temporada_text')) && in_array(1, old('temporada_text'))) checked @endif class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-lime-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                <label for="">Otoño</label>
                                </div>
                                <div>
                                    <input name="temporada_text[]" value="2" @if(is_array(old('temporada_text')) && in_array(2, old('temporada_text'))) checked @endif class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-lime-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                <label for="">Invierno</label>
                                </div>
                                <div>
                                    <input name="temporada_text[]" value="3" @if(is_array(old('temporada_text')) && in_array(3, old('temporada_text'))) checked @endif class=" form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-lime-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                    <label for="">Primavera</label>
                                </div>
                                <div>
                                    <input name="temporada_text[]" value="4" @if(is_array(old('temporada_text')) && in_array(4, old('temporada_text'))) checked @endif class=" form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-lime-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                    <label for="">Verano</label>
                                </div>
                            </div>
                            <textarea id="caracteristicas-text" class="border-2 texto hidden" name="caracteristicas_text" id="" cols="35" rows="7">{{old('caracteristicas_text')}}</textarea>
                            
                            <textarea id="cuidados-text" class="border-2 texto hidden" name="cuidados_text" id="" cols="35" rows="7">{{old('cuidados_text')}}</textarea>
                            <div>
                                <span class="text-sm" style="color:red"><small>@error('cuidados_text'){{$message}}@enderror</small></span>
                            </div>
                            <div>
                                <span class="text-sm" style="color:red"><small>@error('descripcion_text'){{$message}}@enderror</small></span>
                            </div>
                            <div>
                                <span class="text-sm" style="color:red"><small>@error('temporada_text'){{$message}}@enderror</small></span>
                            </div>
                            <div>
                                <span class="text-sm" style="color:red"><small>@error('caracteristicas_text'){{$message}}@enderror</small></span>
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
            <div class="xl:col-span-5 mt-10">
                <div class="flex justify-center">
                    <button type="submit" class="btn-primary">
                        Crear Producto
                    </button>
                </div>
            </div> 
        </div>
    </div>
</form>
<div id="mq">
    <div class="text-white hidden md:block xl:hidden">
        2
    </div>
    <div class="text-white md:hidden">
        1
    </div>
    <div class="text-white hidden xl:block">
        3
    </div>
    <div class="text-white hidden lg:block xl:hidden">
        4
    </div>
</div>
    @section('js')
        <script>
            //cambiar pestañas en descripcion
            $('.pestañas > li').on('click', function(){
                var id = $(this).attr('id');
                $(this).siblings().removeClass('bg-gray-100');
                $(this).siblings().removeClass('text-lime-500');
                $(this).addClass('bg-gray-100');
                $(this).addClass('text-lime-500');
                $('.texto').addClass('hidden');
                $('#'+ id + '-text').removeClass('hidden');
            });


            $('.categorias').on('change', function(){
                if($(this).prop('checked') == true){
                    $('.categorias').not(this).prop('checked', false);
                }
                if($('.categorias')[5].checked || $('.categorias')[6].checked || $('.categorias')[7].checked){
                    $('#temporada').addClass('hidden');
                    $('#cuidados').addClass('hidden');
                }else{
                    $('#temporada').removeClass('hidden');
                    $('#cuidados').removeClass('hidden');
                }
            });

            $('#precio').on('keypress', function(){

                if($(this).val()<0){
                    var precio = $(this).val();
                    precio = parseInt(precio);
                    $(this).val(precio * (-1));
                }

                if($(this).val()>999999){
                    $(this).val(999999);
                }
                
            });

            $('#cantidad').on('keypress', function(){

                if($(this).val()<0){
                    var cantidad = $(this).val();
                    cantidad = parseInt(cantidad);
                    $(this).val(cantidad * (-1));
                }

                if($(this).val()>99){
                    $(this).val(99);
                }
                
            });

            //ocultar input file
            let id;
            $('.boton').on('click', function(){
                id = $(this).attr('id')[13];
                $('#imagen-' + id).click();
                $('#imagen-' + id).on('change', function(){
                    var reader = new FileReader();
                    reader.onload = (e) => { 
                        $('#preview-imagen-' + id).attr('src', e.target.result); 
                    }
                    reader.readAsDataURL(this.files[0]); 
                    $('#borrar-boton-' + id).show();
                });
            })


            let borrarId;
            $('.btn-red').on('click', function(){
                id = $(this).attr('id')[13];
                $('#imagen-' + id).val('');
                $('#preview-imagen-' + id).removeAttr('src'); 
                $('#borrar-boton-' + id).hide();
            })


            $(window).on('load', function() {
                if(($('.categorias')[5].checked) || ($('.categorias')[6].checked) || ($('.categorias')[7].checked))
                {
                    $('#temporada').addClass('hidden');
                    $('#cuidados').addClass('hidden');
                }
            });


            //ocultar boton borrar
            
            $(window).on('load', function() {
                $('#borrar-boton-0').hide();
                $('#borrar-boton-1').hide();
                $('#borrar-boton-2').hide();
                $('#borrar-boton-3').hide();
            });

            $('input:file').on('change', function(){ 
            numero = $(this).attr('id')[7];
    
                var fileUpload = document.getElementById("imagen-"+numero);
                var reader = new FileReader();
            //  Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
            //  Initiate the JavaScript Image object.
                    var image = new Image();

                //  Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    
                //  Validate the File Height and Width.
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;
                        if(height/width == 4/3){
                            $('#alerta-1').hide();
                        }else{
                            $('#imagen-'+ numero).val('');
                            $('#preview-imagen-'+ numero).removeAttr('src');
                            $('#borrar-boton-'+ numero).hide();
                            $('#alerta-1').show();
                        }
                    };

                }
            });

            //saber tamaño de pantalla para ancho textarea
            $(window).on('load', function(){
                let tamaño;
                let mq = $('#mq');
                let mq2 = mq.children();
                let mq3 = mq2.length;
                for(var i=0;i<mq3;i++){
                    var hijo = mq2[i];
                    if($(hijo).css('display')!='none'){
                    tamaño = $(hijo).text();
                    }
                }
                if(tamaño == 1){
                   
                    $('#descripcion-text').removeAttr('cols');
                    $('#descripcion-text').attr('cols','35');
                    $('#caracteristicas-text').removeAttr('cols');
                    $('#caracteristicas-text').attr('cols','35');
                    $('#cuidados-text').removeAttr('cols');
                    $('#cuidados-text').attr('cols','70');
                }

                if(tamaño == 2){
                   
                    $('#descripcion-text').removeAttr('cols');
                    $('#descripcion-text').attr('cols','40');
                    $('#caracteristicas-text').removeAttr('cols');
                    $('#caracteristicas-text').attr('cols','40');
                    $('#cuidados-text').removeAttr('cols');
                    $('#cuidados-text').attr('cols','70');
                }
                if(tamaño == 3 || tamaño == 4){
                   
                    $('#descripcion-text').removeAttr('cols');
                    $('#descripcion-text').attr('cols','70');
                    $('#caracteristicas-text').removeAttr('cols');
                    $('#caracteristicas-text').attr('cols','70');
                    $('#cuidados-text').removeAttr('cols');
                    $('#cuidados-text').attr('cols','70');
                }
            });
      
            $(window).on('resize', function(){
                let tamaño;
                let mq = $('#mq');
                let mq2 = mq.children();
                let mq3 = mq2.length;
                for(var i=0;i<mq3;i++){
                    var hijo = mq2[i];
                    if($(hijo).css('display')!='none'){
                    tamaño = $(hijo).text();
                    }
                }

                if(tamaño == 1){
                   
                    $('#descripcion-text').removeAttr('cols');
                    $('#descripcion-text').attr('cols','35');
                }

                if(tamaño == 2){
                   
                    $('#descripcion-text').removeAttr('cols');
                    $('#descripcion-text').attr('cols','40');
                }
                if(tamaño == 3){
                   
                    $('#descripcion-text').removeAttr('cols');
                    $('#descripcion-text').attr('cols','70');
                }
                

            });

            
            
           

           



            
        </script>
    @endsection
@endsection

