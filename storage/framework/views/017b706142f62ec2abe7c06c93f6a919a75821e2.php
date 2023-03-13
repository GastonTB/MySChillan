<div class="flex-none">
    <div class="flex mb-5 md:ml-5 justify-center">
        <div class="flex ">
            <div clas="">
                <p class="text-xl font-black">Nuevos</p>
            </div>
            <div class="flex pr-1 md:pr-0">
                <div id="ultimos-izquierda" class="py-1 mx-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div id="ultimos-derecha" class="py-1 px-1 bg-gray-200 shadow-sm rounded-md hover:bg-lime-500">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper md:ml-5 " id="ultimos-slider">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $ultimos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ultimo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide flex justify-center">
                    <a href="<?php echo e(route('detalles', $ultimo->id)); ?>">
                        <div class="">
                            <img class="h-52" src="<?php echo e(asset('storage/imagenes/'.$ultimo->imagenes)); ?>" alt="">
                            <div class="">
                                <div class="flex justify-start">
                                    <div class="mt-3">
                                        <p class="font-semibold">
                                            <?php if(strlen($ultimo->nombre_producto) > 15): ?>
                                                <?php echo e(substr($ultimo->nombre_producto, 0, 15)); ?>...
                                            <?php else: ?>
                                                <?php echo e($ultimo->nombre_producto); ?>

                                            <?php endif; ?>
                                        </p>
                                        <div class="flex items-end">
                                            <p class="font-semibold">
                                                $<?php echo e(number_format($ultimo->precio, 0, ",", ".")); ?>

                                            </p>
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

<?php /**PATH C:\xampp\htdocs\MySPlantas\resources\views/components/slider-ultimos-productos.blade.php ENDPATH**/ ?>