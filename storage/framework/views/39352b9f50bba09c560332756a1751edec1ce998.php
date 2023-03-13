
<?php $__env->startSection('css'); ?>
    <style>
        /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="grid md:grid-cols-4 lg:grid-cols-8 xl:grid-cols-6 mt-5">
    <div class="lg:col-start-3 md:col-start-1 ml-5 md:ml-10 lg:ml-0 col-span-full">
        <a class="text-lime-500" href="<?php echo e(route('backoffice')); ?>">Back Office</a> / 
        <a class="text-lime-500" href="<?php echo e(route('crearproducto')); ?>">Crear Producto</a>
    </div>
    <div class="col-start-1 col-span-full">
        <div class="flex justify-center px-3 md:px-0">
            <p class="text-3xl font-semibold mt-3 mb-10">
                Crear Nuevo Producto
            </p>
        </div>
    </div>
</div>
<form action="<?php echo e(route('crearproducto2')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="grid md:grid-cols-4 lg:grid-cols-8 xl:grid-cols-6">
        <div class="md:col-span-2 md:col-start-1 lg:col-start-3 xl:col-start-3 lg:col-span-2 xl:col-span-1 md:pl-5 lg:pl-0 mb-10 md:mb-0 order-1 md:order-1">
            <div class="mt-5 px-5">
                <label class="relative">
                    <input name="nombre" value="<?php echo e(old('nombre')); ?>" type="text" class="border-2 text-gray-700 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" " id="nombre">
                    <span class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                        Nombre del Producto
                    </span>
                </label>
                <div class="">
                    <span class="xl:text-sm md:text-md" style="color:red"><small><?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                </div>
            </div>
            <div class="mt-5 px-5">
                <div class="flex space-x-5">
                    <div>
                        <label class="relative">
                            <input name="precio" value="<?php echo e(old('precio')); ?>" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" " id="precio">
                            <span class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                Precio
                            </span>
                        </label>
                        <div class="">
                            <span class="xl:text-sm md:text-md" style="color:red"><small><?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                        </div>
                    </div>

                    <div>
                        <label class="relative">
                            <input name="cantidad" value="<?php echo e(old('cantidad')); ?>" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" " id="cantidad">
                            <span class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                Cantidad
                            </span>
                        </label>
                        <div class="">
                            <span class="xl:text-sm md:text-md" style="color:red"><small><?php $__errorArgs = ['cantidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5 mt-10 px-5">
                <div class="mt-5">
                    <label for="">
                        <p id="titulo" class="text-lg text-gray-700 mb-2">
                            Categorias:
                        </p>
                    </label>
                    <div class="pl-5">
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <input id="<?php echo e($categoria->id); ?>" name="categorias[]" value="<?php echo e($categoria->id); ?> " <?php if(is_array(old('categorias')) && in_array($categoria->id, old('categorias'))): ?> checked <?php endif; ?> class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">

                            <label class="text-gray-700" for=""><?php echo e($categoria->nombre_categoria); ?></label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <span class="text-sm md:text-md" style="color:red"><small><?php $__errorArgs = ['categorias'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                </div>
            </div>
           
        </div>
        <div class="md:col-span-2 md:col-start-3 g:col-start-5 lg:col-span-2 xl:col-start-4 xl:col-span-1 md:pl-10 lg:pl-0 order-3 md:order-2">
            <div class="flex justify-center space-x-5 px-5 mt-5">     
                <div>
                    <div>
                        <img id="preview-imagen-1" src="" alt="">
                    </div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Imagen 1</label>
                    <input accept="image/png, image/jpeg, image/jpeg"  name="imagen_0" id="imagen-1" class="block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file">
                    <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['imagen_0'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                </div>
    
                    
           
                <div class="flex items-end">
                    <i id="borrar-boton-1" class="fa fa-trash borrar hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400 hidden pb-2"></i>
                </div>
            </div>
            <div id="alerta-1" class="px-5 hidden">
                <span class="text-sm md:text-md" style="color:red"><small>La imagen debe tener una proporcion de 3:4 (ancho:alto)</small></span>
            </div>
            <div id="formato-1" class="px-5 hidden">
                <span class="text-sm md:text-md" style="color:red"><small>Formato de archivo no soportado, formatos soportados 'jpg', 'png', 'jpeg'</small></span>
            </div>
            <div class="flex justify-center space-x-5 px-5 mt-5">
                
                <div>
                    <div>
                        <img id="preview-imagen-2" src="" alt="">
                    </div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Imagen 2</label>
                    <input accept="image/png, image/jpeg, image/jpeg" name="imagen_1" id="imagen-2" class="block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file">
                    <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['imagen_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>

                </div>
                <div class="flex items-end">
                    <i id="borrar-boton-2" class="fa fa-trash borrar hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400 hidden pb-2"></i>
                </div>
            </div>
            <div id="alerta-2" class="px-5 hidden">
                <span class="text-sm md:text-md" style="color:red"><small>La imagen debe tener una proporcion de 3:4 (ancho:alto)</small></span>
            </div>
            <div id="formato-2" class="px-5 hidden">
                <span class="text-sm md:text-md" style="color:red"><small>Formato de archivo no soportado, formatos soportados 'jpg', 'png', 'jpeg'</small></span>
            </div>
            <div class="flex justify-center space-x-5 px-5 mt-5">
                
                <div>
                    <div>
                        <img id="preview-imagen-3" src="" alt="">
                    </div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Imagen 3</label>
                    <input accept="image/png, image/jpeg, image/jpeg" name="imagen_2" id="imagen-3" class="block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file">
                    <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['imagen_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>

                </div>
                <div class="flex items-end">
                    <i id="borrar-boton-3" class="fa fa-trash borrar hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400 hidden pb-2"></i>
                </div>
            </div>
            <div id="alerta-3" class="px-5 hidden">
                <span class="text-sm md:text-md" style="color:red"><small>La imagen debe tener una proporcion de 3:4 (ancho:alto)</small></span>
            </div>
            <div id="formato-3" class="px-5 hidden">
                <span class="text-sm md:text-md" style="color:red"><small>Formato de archivo no soportado, formatos soportados 'jpg', 'png', 'jpeg'</small></span>
            </div>
            <div class="flex justify-center space-x-5 px-5 mt-5">
                
                <div>
                    <div>
                        <img id="preview-imagen-4" src="" alt="">
                    </div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Imagen 4</label>
                    <input accept="image/png, image/jpeg, image/jpeg" name="imagen_3" id="imagen-4" class="block w-full text-sm text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file">
                    <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['imagen_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>

                </div>
                <div class="flex items-end">
                    <i id="borrar-boton-4" class="fa fa-trash borrar hover:animate-pulse text-lime-500 hover:text-gray-500 active:text-red-400 hidden pb-2"></i>
                </div>
            </div>
            <div id="alerta-4" class="px-5 hidden">
                <span class="text-sm md:text-md" style="color:red"><small>La imagen debe tener una proporcion de 3:4 (ancho:alto)</small></span>
            </div>
            <div id="formato-4" class="px-5 hidden">
                <span class="text-sm md:text-md" style="color:red"><small>Formato de archivo no soportado, formatos soportados 'jpg', 'png', 'jpeg'</small></span>
            </div>
        </div>
        <div class="md:col-start-2 lg:col-start-3 xl:col-start-3 md:col-span-2 lg:col-span-4 xl:col-span-2 order-2 md:oder-3 px-5 md:px-0">
            <div class="flex justify-center">
                <div class="mt-0 md:mt-5">
                    <ul class="pestañas flex flex-wrap text-xs md:font-medium text-center text-gray-500 border-b border-gray-200">
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
                        <textarea id="descripcion-text" class="border-2 texto" name="descripcion_text" id="" cols="49" rows="7"><?php echo e(old('descripcion_text')); ?></textarea>
                        <div id="temporada-text" class="texto hidden">
                            <div class="mt-5">
                                <input name="temporada_text[]" value="1" <?php if(is_array(old('temporada_text')) && in_array(1, old('temporada_text'))): ?> checked <?php endif; ?> class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                            <label for="">Otoño</label>
                            </div>
                            <div>
                                <input name="temporada_text[]" value="2" <?php if(is_array(old('temporada_text')) && in_array(2, old('temporada_text'))): ?> checked <?php endif; ?> class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                            <label for="">Invierno</label>
                            </div>
                            <div>
                                <input name="temporada_text[]" value="3" <?php if(is_array(old('temporada_text')) && in_array(3, old('temporada_text'))): ?> checked <?php endif; ?> class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                <label for="">Primavera</label>
                            </div>
                            <div>
                                <input name="temporada_text[]" value="4" <?php if(is_array(old('temporada_text')) && in_array(4, old('temporada_text'))): ?> checked <?php endif; ?> class="rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                                <label for="">Verano</label>
                            </div>
                        </div>
                        <textarea id="caracteristicas-text" class="border-2 texto hidden" name="caracteristicas_text" id="" cols="49" rows="7"><?php echo e(old('caracteristicas_text')); ?></textarea>
                        
                        <textarea id="cuidados-text" class="border-2 texto hidden" name="cuidados_text" id="" cols="49" rows="7"><?php echo e(old('cuidados_text')); ?></textarea>
                        <div>
                            <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['cuidados_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                        </div>
                        <div>
                            <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['descripcion_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                        </div>
                        <div>
                            <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['temporada_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                        </div>
                        <div>
                            <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['caracteristicas_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="flex justify-center pb-10 pt-10 md:pt-0">
        <button class="btn-tienda">
            crear producto
        </button>
    </div>
    <div id="regla" class="text-white select-none">
        <div id="regla-1" class="regla md:hidden">
            1
        </div>
        <div id="regla-2" class="regla marker:hidden md:block lg:hidden">
            2
        </div>
        <div id="regla-3" class="regla hidden lg:block xl:hidden">
            3
        </div>
        <div id="regla-4" class="regla hidden xl:block">
            4
        </div>
    </div>
</form>

    <?php $__env->startSection('js'); ?>
        <script>     
            
            $(document).ready(function(){
            
                if ($('#regla-1').is(':visible')) {
                $('#descripcion-text').attr('cols', 38);
                $('#caracteristicas-text').attr('cols', 38);
                $('#cuidados-text').attr('cols', 38);
            } else if ($('#regla-2').is(':visible')) {
                $('#descripcion-text').attr('cols', 70);
                $('#caracteristicas-text').attr('cols', 70);
                $('#cuidados-text').attr('cols', 70);
            } else if ($('#regla-3').is(':visible')) {
                $('#descripcion-text').attr('cols', 100);
                $('#caracteristicas-text').attr('cols', 100);
                $('#cuidados-text').attr('cols', 100);
            } else if ($('#regla-4').is(':visible')) {
                $('#descripcion-text').attr('cols', 100);
                $('#caracteristicas-text').attr('cols', 100);
                $('#cuidados-text').attr('cols', 100);
            }
                
            });


            $(document).ready(function(){
                $('.categoria').on('change', function(){
                    //if is checked 
                    if($(this).is(':checked')){
                        $('#temporada').addClass('hidden');
                        $('#temporada').removeClass('bg-gray-100');
                        $('#temporada').removeClass('text-lime-500');
                        $('#temporada-text').addClass('hidden');
                        $('#cuidados').addClass('hidden');
                        $('#cuidados').removeClass('bg-gray-100');
                        $('#cuidados').removeClass('text-lime-500');
                        $('#cuidados-text').addClass('hidden');
                        $('#descripcion-text').removeClass('hidden');
                        $('#descripcion').addClass('bg-gray-100');
                        $('#descripcion').addClass('text-lime-500');
                        $('#caracteristicas-text').addClass('hidden');
                        $('#caracteristicas').removeClass('bg-gray-100');
                        $('#caracteristicas').removeClass('text-lime-500');
                    }else{
                        $('#titulo').removeClass('text-lime-500');
                        $('#titulo').addClass('text-gray-700');
                    }
                });
            });

            $(document).ready(function(){
                $('.pestañas > li').on('click', function(){
                    $('.pestañas > li').not(this).removeClass('text-lime-500');
                    $('.pestañas > li').not(this).removeClass('bg-gray-100');
                    //add active to this
                    $(this).addClass('text-lime-500');
                    $(this).addClass('bg-gray-100');
                    //show forms
                    var id = $(this).attr('id');
                    $('.texto').addClass('hidden');
                    $('#'+id+'-text').removeClass('hidden');
                    if($('#regla-1').is(':visible') || $('#regla-2').is(':visible')){
                        //focus id titulo
                        $('#titulo').focus();
                    }else{
                        //focus on footer
                        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
                        return false;
                    }

                });
            });

            $(document).ready(function(){
                $('input:file').on('change', function(){
                    var numero = $(this).attr('id').split('-')[1];
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match = ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                        //append mensaje
                        $('#formato-'+numero).removeClass('hidden');
                        $('#preview-imagen-'+numero).attr('src', '');
                        $('#borrar-boton-'+numero).addClass('hidden');
                        $(this).val('');
                        return false;
                    }else{
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                        function imageIsLoaded(e) {
                            var img = new Image();
                            img.src = e.target.result;
                            img.onload = function () {
                                var width = this.width;
                                var height = this.height;
                                if(width/height != 0.75){
                                    // alert('La imagen debe tener una proporcion de 3:4 (ancho:alto)');
                                    var alerta = '#alerta-'+numero;
                                    $(alerta).removeClass('hidden');
                                    $('#imagen-'+ numero).val('');
                                    return false;
                                }else{                                   
                                    var preview = '#preview-imagen-'+numero;
                                    $(preview).attr('src', e.target.result);
                                    $(preview).attr('width', '100%');
                                    $(preview).attr('height', '100%');
                                    var borrar = '#borrar-boton-'+numero;
                                    $(borrar).removeClass('hidden');
                                    var alerta = '#alerta-'+numero;
                                    $(alerta).addClass('hidden');
                                    $('#formato-'+numero).addClass('hidden');
                                }
                            };
                        };
                    }
                });
            });

            $(document).ready(function(){
                $('.borrar').on('click', function(){
                    var numero = $(this).attr('id').split('-')[2];
                    var preview = '#preview-imagen-'+numero;
                    $(preview).attr('src', '');
                    var borrar = '#borrar-boton-'+numero;
                    $(borrar).addClass('hidden');
                    // var alerta = '#alerta-'+numero;
                    // $(alerta).removeClass('hidden');
                    var input = '#imagen-'+numero;
                    $(input).val('');         
                });
            });

            $(document).ready(function(){
                $('#nombre').on('change', function(){
                    //capitalize first letter
                    var nombre = $('#nombre').val();
                    var nombre = nombre.charAt(0).toUpperCase() + nombre.slice(1);
                    var nombre = nombre.replace(/[^a-zA-Z\u00C0-\u00FF ]/g, "");

                    $('#nombre').val(nombre);

                });

            });

            $(document).ready(function(){
                //if categoria is checked no other can be cheked
                $('.categoria').on('change', function(){
                    if($(this).prop('checked') == true){
                    $('.categoria').not(this).prop('checked', false);
                    }
                    if($('.categoria')[5].checked || $('.categoria')[6].checked || $('.categoria')[7].checked){
                        $('#temporada').addClass('hidden');
                        $('#temporada').removeClass('bg-gray-100');
                        $('#temporada').removeClass('text-lime-500');
                        $('#temporada-text').addClass('hidden');
                        $('#cuidados').addClass('hidden');
                        $('#cuidados').removeClass('bg-gray-100');
                        $('#cuidados').removeClass('text-lime-500');
                        $('#cuidados-text').addClass('hidden');
                        $('#descripcion-text').removeClass('hidden');
                        $('#descripcion').addClass('bg-gray-100');
                        $('#descripcion').addClass('text-lime-500');
                        $('#caracteristicas-text').addClass('hidden');
                        $('#caracteristicas').removeClass('bg-gray-100');
                        $('#caracteristicas').removeClass('text-lime-500');
                    }else{
                        $('#temporada').removeClass('hidden');
                        $('#cuidados').removeClass('hidden');
                    }
                });
            });

            $(document).ready(function(){

                $('#precio').on('keyup', function(e){
                    let precio = $(this).val();
                    //remove dollar
                    precio = precio.replace('$', '');
                    let precio2 = precio.replace(/[^0-9]/g, '');
                    
                    if(precio2 == NaN){
                        precio2 = 1;
                    }
                    if(precio2<0){
                        precio2 = 0;
                    }
                    if(precio2>100000){
                        precio2 = 100000;
                    }
                    let precio3 = precio2.toString();
                    precio3 = precio3.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
                    if(precio3.charAt(0) == '0'){
                        precio3 = precio3.substring(1);
                    }
                    //add dollar
                    precio3 = '$'+precio3;
                    $(this).val(precio3);
                });
               
            });

            $('#cantidad').on('keyup', function(){
                
                let cantidad = $(this).val();
                //if array[0] == 0 delete it
                if(cantidad[0] == 0){
                    cantidad = cantidad.slice(1);
                }
                let cantidad2 = cantidad.replace(/[^0-9]/g, '');
                if(cantidad2 == NaN){
                    cantidad2 = 1;
                }
                if(cantidad2<0){
                    cantidad2 = 0;
                }
                if(cantidad2>1000){
                    cantidad2 = 1000;
                }
                if(cantidad2 == ''){
                    cantidad2 = 0;
                }
                $(this).val(cantidad2);
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layaouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MySPlantas\resources\views/productos/create.blade.php ENDPATH**/ ?>