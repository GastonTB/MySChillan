<div class="relative">
    <div class="bg-lime-500 columns-2 md:text-lg lg:text-md">
        <div class="flex justify-start">
            <div class="mx-2 py-2 text-white">
                <i class="fa fa-bars"></i>
            </div>
            <p class="text-white font-black py-2">
                Categorias
            </p>
        </div>
        <div class="flex justify-end lg:hidden pr-2">
            <div id="abajo" class="mx-2 flecha py-2 text-white">
                <i class="fa fa-chevron-down"></i>
            </div>
            <div id="arriba" class="mx-2 hidden flecha py-2 text-white">
                <i class="fa fa-chevron-up"></i>
            </div>
        </div>
    </div>
    <div id="lista" class="border-2 md:text-lg lg:text-md bg-white hidden lg:block">
        <ul class="pl-2">
            <li class="py-1 xl:py-1 lg:py-1.5 mt-1 xl:mt-4 lg:mt-3 hover:text-lime-500 hover:text-xl"><a href="<?php echo e(route('filtrados', ['id' => 1, 'minimo' => 0, 'maximo' => 100000, 'orden' => 1, 'nombre' => '999'])); ?>">Ornamentales</a></li>
            <li class="py-1 xl:py-1 lg:py-1.5 hover:text-lime-500 hover:text-xl"><a href="<?php echo e(route('filtrados', ['id' => 2, 'minimo' => 0, 'maximo' => 100000, 'orden' => 1, 'nombre' => '999'])); ?>">Plantas de Interior</a></li>
            <li class="py-1 xl:py-1 lg:py-1.5 hover:text-lime-500 hover:text-xl"><a href="<?php echo e(route('filtrados', ['id' => 3, 'minimo' => 0, 'maximo' => 100000, 'orden' => 1, 'nombre' => '999'])); ?>">Plantas de Exterior</a></li>
            <li class="py-1 xl:py-1 lg:py-1.5 hover:text-lime-500 hover:text-xl"><a href="<?php echo e(route('filtrados', ['id' => 4, 'minimo' => 0, 'maximo' => 100000, 'orden' => 1, 'nombre' => '999'])); ?>">Suculentas</a></li>
            <li class="py-1 xl:py-1 lg:py-1.5 hover:text-lime-500 hover:text-xl"><a href="<?php echo e(route('filtrados', ['id' => 5, 'minimo' => 0, 'maximo' => 100000, 'orden' => 1, 'nombre' => '999'])); ?>">Arboles Frutales</a></li>
            <li class="py-1 xl:py-1 lg:py-1.5 hover:text-lime-500 hover:text-xl"><a href="<?php echo e(route('filtrados', ['id' => 6, 'minimo' => 0, 'maximo' => 100000, 'orden' => 1, 'nombre' => '999'])); ?>">Maceteros</a></li>
            <li class="py-1 xl:py-1 lg:py-1.5 hover:text-lime-500 hover:text-xl"><a href="<?php echo e(route('filtrados', ['id' => 7, 'minimo' => 0, 'maximo' => 100000, 'orden' => 1, 'nombre' => '999'])); ?>">Tierra de Hojas</a></li>
            <li class="py-1 xl:py-1 lg:py-1.5 mb-1 lg:mb-3 xl:mb-4 hover:text-lime-500 hover:text-xl"><a href="<?php echo e(route('filtrados', ['id' => 8, 'minimo' => 0, 'maximo' => 100000, 'orden' => 1, 'nombre' => '999'])); ?>">Accesorios</a></li>
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\MySPlantas\resources\views/components/lista-categorias.blade.php ENDPATH**/ ?>