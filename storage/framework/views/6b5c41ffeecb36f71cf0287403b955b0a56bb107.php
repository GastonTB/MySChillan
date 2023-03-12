<div>
    
        <div class="flex items-center">
            <div id="carrito" class="hover:cursor-pointer carro grid items-center mx-1 relative">
                <i class="hover:text-lime-500 carrito absolute top-0 right-0 fa fa-lg fa-shopping-cart md:hidden" aria-hidden="true"></i>
                <i class="hover:text-lime-500 carrito absolute top-0 right-0 fa fa-xl fa-shopping-cart hidden md:block" aria-hidden="true"></i>
                <div class="circulo hover:bg-black absolute bottom-0 left-0 rounded-full py-0.5
                    <?php if($carro['contador'] < 10): ?>
                    px-1.5
                    <?php else: ?>
                    px-0.5
                    <?php endif; ?>
                bg-lime-500 text-2xs">
                    <p class="contador text-xs hover:text-white font-bold">
                        <?php echo e($carro['contador']); ?>

                    </p>
                </div>
            </div>
            &nbsp;
            &nbsp;
            &nbsp;
            <div class="items-center mx-1 lg:block hidden">
            <p class="font-black"> $<?php echo e(number_format($carro['total'], 0, ',', '.')); ?></p>
            </div>
        </div>
    
</div><?php /**PATH C:\xampp\htdocs\MySPlantas\resources\views/components/carrito.blade.php ENDPATH**/ ?>