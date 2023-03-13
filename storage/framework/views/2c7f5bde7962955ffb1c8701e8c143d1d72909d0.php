
<?php $__env->startSection('css'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="lg:hidden">
        <div class="md:hidden">
            <div class="mt-5"></div>
        </div>
        <div class="hidden md:block my-10 text-center flex-justify-center"
            style="background-image: url('<?php echo e(asset('img/banner/close-up-macro-of-green-leaf-1641721.jpg')); ?>')">
            <p class="titulo font-black uppercase text-black bg-white text-4xl md:text-5xl mix-blend-lighten">
                <?php if(isset($titulo)): ?>
                    <?php echo e($titulo); ?>

                <?php else: ?>
                    Tienda
                <?php endif; ?>
            </p>
        </div>
        <?php
            $contador = 0;
            if (count($ofertas) > 0) {
                $contador++;
            }
            if (count($calificados) > 1) {
                $contador++;
            }
            if (count($ultimos) > 1) {
                $contador++;
            }
        ?>
        <div class="md:grid md:grid-cols-7 gap-1">
            <div class="md:col-span-3">
                <div class="mb-5 px-5 md:pt-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filtro-categorias-movil','data' => ['orden' => $orden,'minimo' => $minimo,'maximo' => $maximo,'categoria' => $categoria]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filtro-categorias-movil'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['orden' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orden),'minimo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($minimo),'maximo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($maximo),'categoria' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categoria)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <?php if(count($ofertas) > 0): ?>
                    <div class="mb-5 hidden md:block">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-ofertas','data' => ['ofertas' => $ofertas]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-ofertas'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ofertas' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ofertas)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="mb-5 hidden md:block">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-ultimos-productos','data' => ['ultimos' => $ultimos]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-ultimos-productos'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ultimos' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ultimos)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <?php if(count($calificados) > 0): ?>
                    <div class="mb-5 hidden md:block">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-mejor-calificados','data' => ['calificados' => $calificados]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-mejor-calificados'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['calificados' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($calificados)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="md:hidden grid grid-cols-2 px-5 gap-3">
                    <?php if($contador == 2): ?>
                        <?php if(count($ofertas) > 0): ?>
                            <div class="">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-ofertas','data' => ['ofertas' => $ofertas]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-ofertas'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ofertas' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ofertas)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(count($calificados) > 0): ?>
                            <div class="">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-mejor-calificados','data' => ['calificados' => $calificados]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-mejor-calificados'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['calificados' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($calificados)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-ultimos-productos','data' => ['ultimos' => $ultimos]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-ultimos-productos'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ultimos' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ultimos)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if($contador == 3): ?>
                        <?php if(count($ofertas) > 0): ?>
                            <div class="">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-ofertas','data' => ['ofertas' => $ofertas]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-ofertas'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ofertas' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ofertas)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(count($calificados) > 0): ?>
                            <div class="">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-mejor-calificados','data' => ['calificados' => $calificados]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-mejor-calificados'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['calificados' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($calificados)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-span-2 mt-5">
                            <div class="w-full">
                                <div class="block mx-auto w-1/2">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-ultimos-productos','data' => ['ultimos' => $ultimos]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-ultimos-productos'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ultimos' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ultimos)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="md:hidden my-10 text-center flex-justify-center"
                style="background-image: url('<?php echo e(asset('img/banner/close-up-macro-of-green-leaf-1641721.jpg')); ?>')">
                <p class="titulo font-black uppercase text-black bg-white text-4xl md:text-5xl mix-blend-lighten">
                    <?php if(isset($titulo)): ?>
                        <?php echo e($titulo); ?>

                    <?php else: ?>
                        Tienda
                    <?php endif; ?>
                </p>
            </div>
            <div class="col-span-4 p-4">
                <div class="grid grid-cols-2 gap-4">
                    <?php if(count($productos) > 0): ?>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-span-1">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-producto','data' => ['contador' => $i,'categoria' => $categoria,'minimo' => $minimo,'maximo' => $maximo,'producto' => $producto]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card-producto'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['contador' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($i),'categoria' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categoria),'minimo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($minimo),'maximo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($maximo),'producto' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($producto)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                            <?php
                                $i++;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-span-2 mb-10">
                            <p class="text-center text-gray-700 font-bold text-2xl">Lo sentimos hay productos en esta
                                categoría</p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php echo e($productos->links()); ?>

            </div>
        </div>
    </div>

    <div class="hidden lg:block xl:block mb-10">

        <div class="my-5 text-center flex-justify-center"
            style="background-image: url('<?php echo e(asset('img/banner/close-up-macro-of-green-leaf-1641721.jpg')); ?>')">
            <p class="select-none font-black uppercase text-black bg-white text-8xl mix-blend-lighten">
                <?php if(isset($titulo)): ?>
                    <?php echo e($titulo); ?>

                <?php else: ?>
                    Tienda
                <?php endif; ?>
            </p>
        </div>
        <div class="grid xl:grid-cols-5 lg:grid-cols-7 w-full mt-5">
            <div class="col-start-2 col-span-1 pt-5">
                <div class="hidden lg:block">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filtro-categorias','data' => ['orden' => $orden,'minimo' => $minimo,'maximo' => $maximo,'categoria' => $categoria]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filtro-categorias'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['orden' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orden),'minimo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($minimo),'maximo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($maximo),'categoria' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categoria)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <div class="-ml-20">
                    <?php if(count($ofertas) > 0): ?>
                        <div class="mt-10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-ofertas','data' => ['ofertas' => $ofertas]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-ofertas'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ofertas' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ofertas)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="mt-10">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-ultimos-productos','data' => ['ultimos' => $ultimos]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-ultimos-productos'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ultimos' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ultimos)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    <?php if(count($calificados) > 0): ?>
                        <div class="mt-10">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider-mejor-calificados','data' => ['calificados' => $calificados]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider-mejor-calificados'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['calificados' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($calificados)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="lg:col-span-4 xl:col-span-2 lg:px-3">
                <div class="grid xl:grid-cols-3 p-5 lg:grid-cols-3 gap-4 lg:px-5">
                    <?php if(count($productos) > 0): ?>
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-producto','data' => ['categoria' => $categoria,'minimo' => $minimo,'maximo' => $maximo,'contador' => 0,'producto' => $producto]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card-producto'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['categoria' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categoria),'minimo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($minimo),'maximo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($maximo),'contador' => 0,'producto' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($producto)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-span-2 mb-20 flex items-center">
                            <p class="text-center text-gray-700 font-bold text-3xl">
                                <?php if(isset($buscar)): ?>
                                    No se encontraron resultados para la busqueda: <?php echo e($buscar); ?>

                                <?php else: ?>
                                    Lo sentimos hay productos en esta categoría
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endif; ?>

                </div>
                <?php echo e($productos->links()); ?>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {
            $('#buscador_movil').on('keyup', function() {
                var busqueda = $('#buscador_movil').val();
                $('#buscador').val(busqueda);
                if (busqueda == '') {
                    $('#nombre_busqueda').val('');
                    $('#nombre_busqueda_movil').val('');
                } else {
                    $('#nombre_busqueda').val(busqueda);
                    $('#nombre_busqueda_movil').val(busqueda);
                }
            });
            $('#buscador').on('keyup', function() {
                var busqueda = $('#buscador').val();
                $('#buscador_movil').val(busqueda);
                if (busqueda == '') {
                    $('#nombre_busqueda').val('');
                    $('#nombre_busqueda_movil').val('');
                } else {
                    $('#nombre_busqueda').val(busqueda);
                    $('#nombre_busqueda_movil').val(busqueda);
                }
            });
        });

        $(document).ready(function() {
            if ($('#buscador').val() != '' || $('#buscador_movil').val() != '') {
                $('#nombre_busqueda').val($('#buscador').val());
                $('#nombre_busqueda_movil').val($('#buscador_movil').val());

            } else {
                $('#nombre_busqueda').val('');
                $('#nombre_busqueda_movil').val('');
            }
        });


        $(document).ready(function() {



            $('#filtro-abajo').on('click', function() {
                $('#filtro-arriba').removeClass('hidden');
                $('#lista-filtros').removeClass('rounded-md');
                $('#lista-filtros').addClass('rounded-t-md');
                $('#filtro-abajo').addClass('hidden');
                $('#filtros').show('slow');
            });

            $('#filtro-arriba').on('click', function() {
                $('#filtro-arriba').addClass('hidden');
                $('#lista-filtros').removeClass('rounded-t-md');
                $('#lista-filtros').addClass('rounded-md');
                $('#filtro-abajo').removeClass('hidden');
                $('#filtros').hide('slow');
            });
            var maximo1 = $('.maximo').val();
            var minimo1 = $('.minimo').val();
            var maximo2 = $('.maximo2').val();
            var minimo2 = $('.minimo2').val();
            var maximo1 = maximo1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            var minimo1 = minimo1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            var maximo2 = maximo2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            var minimo2 = minimo2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            $('.precio_minimo').text(' $' + minimo1);
            $('.precio_maximo').text(' $' + maximo1);

            $('.minimo').on('change', function() {
                comparar();

            });

            $('.maximo').on('change', function() {
                comparar();
            });


            function comparar() {
                var minimo = $('.minimo').val();
                minimo = parseInt(minimo);
                var maximo = $('.maximo').val();
                maximo = parseInt(maximo);
                if (minimo >= maximo) {
                    if (maximo == 100000) {
                        minimo = minimo - 10000;
                    }
                    if (minimo == 0 && maximo != 0) {
                        maximo = maximo + 10000;
                    }
                    if (minimo != 0 && maximo != 100000) {
                        maximo = minimo + 10000;
                    }
                }
                if (maximo <= minimo) {
                    if (maximo == 100000) {
                        minimo = minimo - 10000;
                    }
                    if (minimo == 0 && maximo != 0) {
                        maximo = maximo + 10000;
                    }
                    if (minimo != 0 && maximo != 100000) {
                        minimo = maximo - 10000;
                    }
                }
                if (minimo == 0 && maximo == minimo) {
                    maximo = maximo + 10000;
                }
                if (minimo == 100000 && maximo == minimo) {
                    minimo = minimo - 10000;
                }
                if (maximo > 100000) {
                    maximo = 100000;
                }
                $('.minimo').val(minimo);
                $('.maximo').val(maximo);
                var minimo = minimo.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                $('.precio_minimo').text(' $' + minimo);
                var maximo = maximo.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                $('.precio_maximo').text(' $' + maximo);
            }


            $('.precio_minimo2').text(' $' + minimo2);
            $('.precio_maximo2').text(' $' + maximo2);

            $('.minimo2').on('change', function() {
                comparar2();

            });

            $('.maximo2').on('change', function() {
                comparar2();
            });

            function comparar2() {
                var minimo2 = $('.minimo2').val();
                minimo2 = parseInt(minimo2);
                var maximo2 = $('.maximo2').val();
                maximo2 = parseInt(maximo2);
                if (minimo2 >= maximo2) {
                    if (maximo2 == 100000) {
                        minimo2 = minimo2 - 10000;
                    }
                    if (minimo2 == 0 && maximo2 != 0) {
                        maximo2 = maximo2 + 10000;
                    }
                    if (minimo2 != 0 && maximo2 != 100000) {
                        maximo2 = minimo2 + 10000;
                    }
                }
                if (maximo2 <= minimo2) {
                    if (maximo2 == 100000) {
                        minimo2 = minimo2 - 10000;
                    }
                    if (minimo2 == 0 && maximo2 != 0) {
                        maximo2 = maximo2 + 10000;
                    }
                    if (minimo2 != 0 && maximo2 != 100000) {
                        minimo2 = maximo2 - 10000;
                    }
                }
                if (minimo2 == 0 && maximo2 == minimo2) {
                    maximo2 = maximo2 + 10000;
                }
                if (minimo2 == 100000 && maximo2 == minimo2) {
                    minimo2 = minimo2 - 10000;
                }
                if (maximo2 > 100000) {
                    maximo2 = 100000;
                }
                $('.minimo2').val(minimo2);
                $('.maximo2').val(maximo2);
                var minimo2 = minimo2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                $('.precio_minimo2').text(' $' + minimo2);
                var maximo2 = maximo2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                $('.precio_maximo2').text(' $' + maximo2);
            }

            $('.categoria').on('change', function() {
                if ($(this).prop('checked') == true) {
                    $('.categoria').not(this).prop('checked', false);
                }
            });

            var swiper5 = new Swiper("#ultimos-slider", {
                slidesPerView: 1,
                spaceBetween: 0,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                navigation: {
                    nextEl: "#ultimos-derecha",
                    prevEl: "#ultimos-izquierda",
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: true,
                }
            });

            var swiper6 = new Swiper("#ofertas-slider", {
                slidesPerView: 1,
                spaceBetween: 0,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                navigation: {
                    nextEl: "#oferta-derecha",
                    prevEl: "#oferta-izquierda",
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: true,
                }
            });

            var swiper7 = new Swiper("#calificados-slider", {
                slidesPerView: 1,
                spaceBetween: 0,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                navigation: {
                    nextEl: "#calificados-derecha",
                    prevEl: "#calificados-izquierda",
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: true,
                }
            });

            $('.carrito').on('click', function() {
                $('#sidebar-carro').removeClass('hidden');

            });
            $('.circulo').on('click', function() {
                $('#sidebar-carro').removeClass('hidden');
            });

            $('#overlay-carro').on('click', function() {
                $('#sidebar-carro').addClass('hidden');
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layaouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MySPlantas\resources\views/tienda.blade.php ENDPATH**/ ?>