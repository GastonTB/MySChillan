<div>
    <div id="modal-login" class="hidden">
        <div id="overlay-modal-login" class="z-40 fixed h-screen w-screen bg-black opacity-40"></div>
        <div class="flex justify-center">
            <div class="top-1/12 z-50 w-4/5 md:w-5/10 lg:w-2/10 bg-white fixed rounded-md">
                
                <form action="<?php echo e(route('ingresar')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class=""> 
                        <div class="absolute top-2 right-3 hover:cursor-pointer">
                            <i id="cerrar-login" class="fa fa-x hover:text-lime-500 active:text-lime-500"></i>
                        </div>
                        <div class="flex justify-center mt-2 py-3">
                            <img class="object-scale-down h-16" src="<?php echo e(asset('img/logos/logo.png')); ?>" alt="">
                        </div>
                        <div class="space-y-7 my-10">
                            <div class="">
                                <div class="mx-3">
                                    <div>
                                        <div class="">
                                            <label class="relative">
                                                <input name="correo" value="<?php echo e(old('correo')); ?>" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                    Correo
                                                </span>
                                            </label>
                                            <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['correo'];
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
                            <div class="">
                                <div class="mx-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="contraseña" type="password" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                                <span class="text-opacity-30 text-black absolute left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                                    Contraseña
                                                </span>
                                            </label>
                                            <span class="text-sm" style="color:red"><small><?php $__errorArgs = ['contraseña'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></small></span>
                                            <span class="text-sm" style="color:red"><small><?php if(session()->get('credenciales') == 'error-credenciales'): ?><?php echo e($credenciales); ?><?php endif; ?></small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div id="olvidar-contraseña" class="mx-3">
                                <p class="text-sm text-gray-500 cursor-pointer hover:text-lime-500">
                                    <a href="<?php echo e(route('password.request')); ?>">¿Olvidó su contraseña?</a>
                                </p>
                            </div>
                            <div id="no-tiene-cuenta" class="mx-3 cursor-pointer hover:text-lime-500">
                                <p class="text-sm text-gray-500 hover:cursor-pointer hover:text-lime-500">¿No tiene una cuenta? Registrarse</p>
                            </div>
                        </div>
                        <div>
                            <div class="justify-center flex pb-10 mt-5">
                                <button type="submit" class="btn-primary">Ingresar</button>
                            </div>
                        </div>
                    </div>
                </form>     
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\MySPlantas\resources\views/components/modal-login.blade.php ENDPATH**/ ?>