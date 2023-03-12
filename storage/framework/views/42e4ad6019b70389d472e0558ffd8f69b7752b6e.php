<div class="flex-none">
    <div class="flex mb-5 md:ml-5 justify-center">
        <div class="flex ">
            <div clas="">
                <p class="text-xl font-black">Calificados</p>
            </div>
            <div class="flex pr-1 md:pr-0">
                <div id="calificados-izquierda" class="py-1 mx-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div id="calificados-derecha" class="py-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper md:ml-5" id="calificados-slider">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $calificados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calificado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide flex justify-center">
                    <a href="<?php echo e(route('detalles', $calificado->id)); ?>">
                        <div class="">
                            <img class="h-52" src="<?php echo e(asset('storage/imagenes/' . $calificado->imagenes)); ?>"
                                alt="">
                            <div class="">
                                <div class="flex justify-start">
                                    <div class="mt-3">
                                        <p class="font-semibold">
                                            <?php if(strlen($calificado->nombre_producto) > 15): ?>
                                                <?php echo e(substr($calificado->nombre_producto, 0, 15)); ?>...
                                            <?php else: ?>
                                                <?php echo e($calificado->nombre_producto); ?>

                                            <?php endif; ?>
                                        </p>
                                        <div class="flex items-center">
                                            <p class="font-semibold">
                                                $<?php echo e(number_format($calificado->precio, 0, ',', '.')); ?>

                                            </p>

                                            <div class="flex items-center ml-3 space-x-1">
                                                <?php if(gettype($calificado->promedio_puntuacion) == 'integer'): ?>
                                                    <p class="font-semibold"> <?php echo e($calificado->promedio_puntuacion); ?></p>
                                                    <i class="fa fa-star fa-sm pb-1 text-yellow-500"></i>
                                                <?php else: ?>
                                                    <p class="font-semibold">
                                                        <?php echo e($promedio_formateado = number_format($calificado->promedio_puntuacion, 1, ',', '')); ?>

                                                    </p><i class="fa fa-star fa-sm pb-1 text-yellow-500"></i>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\MySPlantas\resources\views/components/slider-mejor-calificados.blade.php ENDPATH**/ ?>