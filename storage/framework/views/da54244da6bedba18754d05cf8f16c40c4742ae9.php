
<div>
    <div id="modal-registro" class="hidden">
        <div id="overlay-modal-registro" class="z-40 bg-black h-screen w-screen opacity-40 fixed"></div>
        <div class="flex justify-center">
            <div class="top-17/400 rounded-md md:top-1/6 lg:top-17/400 xl:top-1/10 md:text-lg z-50 w-11/12  lg:w-1/2  xl:w-1/3 overflow-y-auto bg-white fixed outline-none overflow-x-hidden overflow-y-auto">
                <div class="lg:px-5">
                    <form action="<?php echo e(route('registro')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="grid h-full grid-cols-2 md:gap-3 gap-0">
                            <div class="absolute top-2 right-3 hover:cursor-pointer">
                                <i id="cerrar-registro" class="fa fa-x hover:text-lime-500 active:text-lime-500"></i>
                            </div>
                            <div class="flex justify-center col-span-2 mt-2 py-3">
                                <img class="object-scale-down h-16" src="<?php echo e(asset('img/logos/logo.png')); ?>" alt="">
                            </div>
                            <div class="col-span-1 order-1">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="nombre" value="<?php echo e(old('nombre')); ?>" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Nombre
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['nombre'];
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
                            <div class="col-span-1 order-2">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="apellido_paterno" value="<?php echo e(old('apellido_paterno')); ?>" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Apellido Paterno
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['apellido_paterno'];
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
                            <div class="col-span-1 order-3">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="apellido_materno" value="<?php echo e(old('apellido_materno')); ?>" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Apellido Materno
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['apellido_materno'];
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
                            <div class="col-span-1 order-4">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="direccion" value="<?php echo e(old('direccion')); ?>" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Direccion
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['direccion'];
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
                            <div class="md:col-span-1 col-span-2 order-5">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <select name="region" id="regiones" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2.5 px-5 transition duration-200">
                                                    <?php $__currentLoopData = $regiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($region->id); ?>">
                                                            <?php echo e($region->nombre_region); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                    Región
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['region'];
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
                           
                            <div class="col-span-2 md:col-span-1 order-6">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <select name="comuna" id="comunas" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2 px-5 transition duration-200">
                                                    <?php $__currentLoopData = $comunas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comuna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option data-region="<?php echo e($comuna->region_id); ?>" value="<?php echo e($comuna->id); ?>">
                                                            <?php echo e($comuna->nombre_comuna); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                    Comuna
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['comuna'];
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
                            <div class="col-span-1 order-7">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="email" value="<?php echo e(old('email')); ?>" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Correo
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['email'];
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
                            <div class="col-span-1 order-8">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="telefono" id="telefono_registro" value="<?php echo e(old('telefono')); ?>" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Teléfono
                                                </span>
                                            </label>
                                        </div>
                                        <div>
                                            <span id="error-telefono" class="text-sm hidden" style="color:red"><small>El Numero de Teléfono debe comenzar con un 9</small></span>
                                        </div>
                                        <div>
                                            <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['telefono'];
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
                            <div class="col-span-1 order-9">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="contraseña" type="password" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                                    Contraseña
                                                </span>
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['contraseña'];
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
                            
                            <div class="col-span-1 order-10">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <label class="relative">
                                            <input name="contraseña_confirmation" type="password" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                               Confirme Contraseña
                                            </span>
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 order-11">
                                <div class="flex justify-center">
                                    <div class="mx-auto col-span-2 py-5 mb-5">
                                        <button type="submit" class="btn-primary">Registrarse</button type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> </div>    
            </div>
        </div>

    </div>
</div>

<?php $__env->startSection('js'); ?>
   
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\MySPlantas\resources\views/components/modal-registro.blade.php ENDPATH**/ ?>