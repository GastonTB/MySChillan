@extends('layaouts.master')

@section('content')
<form action="{{route('crearproducto2')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-5 gap-4 pb-10">
        {{-- <div class="bg-gradient-to-r from-green-400">adsda</div> --}}

        <div class="col-start-2 col-span-3 mt-10">
            <div class="grid grid-cols-5">
                <div class="col-span-2">
                    <div class="grid grid-cols-5 gap-4">                        
                        <div class="col-start-2 col-span-3 galeria">
                            <div class="flex justify-center items-center">
                                <img id="preview-imagen-0" class="object-cover" src="" alt="">
                            </div>
                        </div>      
                    </div>
                    <div class="flex justify-center items-center mt-10">
                        <div class="flex space-x-2">
                            <div id ="imagen-boton-0" class="btn-primary boton">
                                SUBIR IMAGEN 1
                            </div>
                            <div id ="borrar-boton-0" class="btn-red">
                                <i class="fa fa-trash-can"></i>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-4">                        
                        <div class="col-start-2 col-span-3 galeria">
                            <div class="flex justify-center items-center">
                                <img id="preview-imagen-1" class="object-cover mb-5 mt-10" src="" alt="">
                            </div>
                        </div>      
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="flex space-x-2">
                            <div id ="imagen-boton-1" class="btn-primary boton">
                                SUBIR IMAGEN 2
                            </div>
                            <div id ="borrar-boton-1" class="btn-red">
                                <i class="fa fa-trash-can"></i>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-4">                        
                        <div class="col-start-2 col-span-3 galeria">
                            <div class="flex justify-center items-center">
                                <img id="preview-imagen-2" class="object-cover  mb-5 mt-10" src="" alt="">
                            </div>
                        </div>      
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="flex space-x-2">
                            <div id ="imagen-boton-2" class="btn-primary boton">
                                SUBIR IMAGEN 3
                            </div>
                            <div id ="borrar-boton-2" class="btn-red">
                                <i class="fa fa-trash-can"></i>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-4">                        
                        <div class="col-start-2 col-span-3 galeria">
                            <div class="flex justify-center items-center">
                                <img id="preview-imagen-3" class="object-cover mb-5 mt-10" src="" alt="">
                            </div>
                        </div>      
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="flex space-x-2">
                            <div id ="imagen-boton-3" class="btn-primary boton">
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
                        <span id="alerta-1" hidden class=" text-red-500"><small>Por favor suba una imagen con una proporción de 4:3 o 1:1 </small></span>
                        <span id="alerta-1" class=" text-red-500"><small>{{session()->get('message')}} </small></span>
                    </div>

                    
                    
                </div>
                <div class="col-span-3">
                    <div class="pl-10 mt-5">
                        <label class="mb-2 font-medium text-gray-900">Nombre del Producto</label>
                        <input value="{{old('nombre')}}" name="nombre" type="text" class=" border text-black rounded-sm block w-3/4 p-2.5 border-gray-300 placeholder-gray-400" placeholder="Nombre del Producto" >
                        <span class="text-sm" style="color:red"><small>@error('nombre'){{$message}}@enderror</small></span>
                    </div>
                    <div class="flex">
                        <div class="pl-10 mt-5">
                            <labelclass="mb-2 font-medium text-gray-900">Precio del Producto</label>
                            <input value="{{old('precio')}}" id="precio" name="precio" type="number" class=" border text-black rounded-sm block w-3/4 p-2.5 border-gray-300 placeholder-gray-400" placeholder="$Precio">
                            <span class="text-sm" style="color:red"><small>@error('precio'){{$message}}@enderror</small></span>
                        </div>
                        <div class="pl-10 mt-5">
                            <labelclass="mb-2 font-medium text-gray-900">Stock</label>
                            <input value="{{old('cantidad')}}" id="cantidad" name="cantidad" type="number" class=" border text-black rounded-sm block w-3/4 p-2.5 border-gray-300 placeholder-gray-400" placeholder="Cantidad">
                            <span class="text-sm" style="color:red"><small>@error('cantidad'){{$message}}@enderror</small></span>
                        </div>
                    </div>
                    <div class="pl-10 mt-5">
                        @foreach ($categorias as $categoria)
                            <div>
                                <input id="{{$categoria->id}}" name="categorias[]" value="{{$categoria->id}} " @if(is_array(old('categorias')) && in_array($categoria->id, old('categorias'))) checked @endif class="categorias form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                <label for="">{{$categoria->nombre_categoria}}</label>
                            </div>
                        @endforeach
                        <span class="text-sm" style="color:red"><small>@error('categorias'){{$message}}@enderror</small></span>
                    </div>
    
                    <div class="pl-10 mt-5">
                        <ul class="pestañas flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                            <li id="descripcion" class="mr-2 inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active">
                                <a href="#" aria-current="page">Descripción</a>
                            </li>
                            <li id="temporada" class="mr-2 inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-100">
                                <a href="#">Temporada</a>
                            </li>
                            <li id="caracteristicas" class="mr-2 inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-100">
                                <a href="#" >Caracteristicas</a>
                            </li>
                            <li id="cuidados" class="mr-2 inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-100">
                                <a href="#" >Cuidados</a>
                            </li>
                        </ul>
                        <div class="text mb-10">
                            <textarea id="descripcion-text" class="border-2 texto" name="descripcion_text" id="" cols="70" rows="7">{{old('descripcion_text')}}</textarea>
                            <div id="temporada-text" class="texto hidden">
                                <div>
                                    <input name="temporada_text[]" value="1" @if(is_array(old('temporada_text')) && in_array(1, old('temporada_text'))) checked @endif class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                <label for="">Otoño</label>
                                </div>
                                <div>
                                    <input name="temporada_text[]" value="2" @if(is_array(old('temporada_text')) && in_array(2, old('temporada_text'))) checked @endif class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                <label for="">Invierno</label>
                                </div>
                                <div>
                                    <input name="temporada_text[]" value="3" @if(is_array(old('temporada_text')) && in_array(3, old('temporada_text'))) checked @endif class=" form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                    <label for="">Primavera</label>
                                </div>
                                <div>
                                    <input name="temporada_text[]" value="4" @if(is_array(old('temporada_text')) && in_array(4, old('temporada_text'))) checked @endif class=" form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                    <label for="">Verano</label>
                                </div>
                            </div>
                            <textarea id="caracteristicas-text" class="border-2 texto hidden" name="caracteristicas_text" id="" cols="70" rows="7">{{old('caracteristicas_text')}}</textarea>
                            
                            <textarea id="cuidados-text" class="border-2 texto hidden" name="cuidados_text" id="" cols="70" rows="7">{{old('cuidados_text')}}</textarea>
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
            <div class="col-span-5 mt-10">
                <div class="flex justify-center">
                    <button type="submit" class="btn-primary">
                        Crear Producto
                    </button>
                </div>
            </div> 
        </div>
    </div>
</form>
    @section('js')
        <script>
            //cambiar pestañas en descripcion
            $('.pestañas > li').on('click', function(){
                var id = $(this).attr('id');
                $(this).siblings().removeClass('bg-gray-100');
                $(this).addClass('bg-gray-100');
                $('.texto').addClass('hidden');
                $('#'+ id + '-text').removeClass('hidden');
            });

            //ocultar ciertas pestañas de descripcion cuando no sea una planta/arbol/suculenta
            $('.categorias').on('change', function(){
                if($('.categorias')[5].checked || $('.categorias')[6].checked || $('.categorias')[7].checked){
                    $('#temporada').addClass('hidden');
                    $('#cuidados').addClass('hidden');
                    $('.categorias')[0].checked = false;
                    $('.categorias')[1].checked = false;
                    $('.categorias')[2].checked = false;
                    $('.categorias')[3].checked = false;
                    $('.categorias')[4].checked = false;
                }else{
                    $('#temporada').removeClass('hidden');
                    $('#cuidados').removeClass('hidden');
                    $('.categorias')[5].checked = false;
                    $('.categorias')[6].checked = false;
                    $('.categorias')[7].checked = false;
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


            //en caso de volver desde el controlador con errores ocultar ciertas pestañas si no es planta
            $(window).on('load', function() {
                if(($('.categorias')[5].checked) || ($('.categorias')[6].checked) || ($('.categorias')[7].checked))
                {
                    console.log('fasdasd');
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
                console.log(numero);
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
                         if(((height/width).toFixed(2) > 1.3 && (height/width).toFixed(2) < 1.4) || height/width == 1){
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
            
           

           



            
        </script>
    @endsection
@endsection

