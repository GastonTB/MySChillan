

<?php $__env->startSection('content'); ?>

    <div class="lg:grid lg:grid-cols-7 mt-10 mb-10">
        <div class="lg:col-start-2 md:col-span-7 lg:col-span-5 md:px-5 lg:px-0">
            <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-4 justify-center mb-10">
                <div class="lg:col-span-2 md:col-span-1">
                    <div class="">
                        <div class="bg-lime-500 text-white text-lg font-semibold p-1 pl-3 uppercase">
                            Productos
                        </div>
                        <div class="p-1 pl-3 border-2">
                            <ul class="list-disc pl-4 space-y-3 mt-3">
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="<?php echo e(route('crearproducto')); ?>">Crear Nuevo Producto</a>
                                </li>
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="<?php echo e(route('listado-productos')); ?>">Ver Listado de Productos</a>
                                </li>
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="<?php echo e(route('sin-stock')); ?>">Ver Productos Sin Stock</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 md:col-span-1">
                    <div class="">
                        <div class="bg-lime-500 text-white text-lg font-semibold p-1 pl-3 uppercase">
                            Ofertas
                        </div>
                        <div class="p-1 pl-3 border-2">
                            <ul class="list-disc pl-4 space-y-3 mt-3">
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="<?php echo e(route('mostrarOfertas')); ?>">
                                        Ver Todas las Ofertas
                                    </a>
                                </li>
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="<?php echo e(route('mostrarOfertasActivas')); ?>">
                                        Ver Ofertas Activas
                                    </a>
                                </li>
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="<?php echo e(route('mostrarOfertasFuturas')); ?>">
                                        Ver Ofertas Futuras
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 md:col-span-1">
                    <div class="">
                        <div class="bg-lime-500 text-white text-lg font-semibold p-1 pl-3 uppercase">
                            Compras
                        </div>
                        <div class="p-1 pl-3 border-2">
                            <ul class="list-disc pl-4 space-y-3 mt-3">
                                <li class="hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="<?php echo e(route('verCompras')); ?>">Ver Compras Realizadas</a>
                                </li>
                                <li class="pendiente hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="<?php echo e(route('verComprasRetiro')); ?>">Compras con Retiro en Tienda</a>
                                </li>
                                <li class="pendiente hover:text-lime-500 hover:font-semibold cursor-pointer">
                                    <a href="<?php echo e(route('verComprasEnvio')); ?>">Compras con Envío a Domicilio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-6 gap-4 mt-15 mb-10">
                <div class="lg:col-span-3 md:col-span-1">
                    <div class="flex justify-center">
                        <p class="text-lg font-black">
                            Últimos Pedidos Por Enviar
                        </p>
                    </div>
                    <div class="flex justify-center mt-5 px-5 md:px-0">
                        <table class="overflow-x-auto">
                            <thead>
                                <tr class="bg-lime-500 text-white uppercase font-semibold">
                                    <th class="hidden">ID</th>
                                    <th class="px-4 py-1">Nombre</th>
                                    <th class="px-4 py-1">Fecha</th>
                                    <th class="px-4 py-1">Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $porEnviar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enviar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="<?php echo e($enviar->id); ?>" class="hover:font-semibold hover:text-lime-500 enviar">

                                        <td class="border px-4 py-1">
                                            <a href="<?php echo e(route('compra', $enviar->id)); ?>">
                                                <p>
                                                    <?php echo e($enviar->user->name); ?>

                                                </p>
                                                <p>
                                                    <?php echo e($enviar->user->metauser->apellido_paterno); ?>

                                                </p>
                                            </a>

                                        </td>

                                        <td class="border px-4 py-1">
                                            <?php echo e(date('d-m-Y', strtotime($enviar->created_at))); ?>

                                        </td>
                                        <td class="border px-4 py-1"><?php echo e($enviar->telefono); ?></td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($porEnviar) == 0): ?>
                                    <tr class="pt-5">
                                        <td colspan="7" class="text-center font-semibold">No hay productos por enviar
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-span-3 flex justify-center">
                        <?php echo e($porEnviar->links()); ?>

                    </div>
                </div>
                <div class="md:col-span-1 lg:col-span-3 mt-10 md:mt-0">
                    <div class="flex justify-center mb-5">
                        <p class="text-lg font-black">
                            Últimos Pedidos Para Retirar
                        </p>
                    </div>
                    <div class="flex justify-center overflow-x-auto">
                        <table class="overflow-x-auto">
                            <thead class="border">
                                <tr class="bg-lime-500 text-white uppercase font-semibold">
                                    <th class="px-4 py-1">Nombre</th>
                                    <th class="px-4 py-1">Fecha</th>
                                    <th class="px-4 py-1">Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $porRetirar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $retirar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:font-semibold hover:text-lime-500 enviar">
                                        <td class="border px-4 py-1">
                                            <a href="<?php echo e(route('compra', $retirar->id)); ?>">
                                                <p class="px-5">
                                                    <?php echo e($retirar->user->name); ?>

                                                </p>
                                                <p class="px-5">
                                                    <?php echo e($retirar->user->metauser->apellido_paterno); ?>

                                                </p>
                                            </a>
                                        </td>
                                        <td class="border px-4 py-1">
                                            <?php echo e(date('d-m-Y', strtotime($retirar->created_at))); ?>

                                        </td>
                                        <td class="border px-4 py-1"><?php echo e($retirar->telefono); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($porRetirar) == 0): ?>
                                    <tr class="pt-5">
                                        <td colspan="7" class="text-center font-semibold">No hay productos para retirar
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-span-3 flex justify-center">
                        <?php echo e($porRetirar->links()); ?>

                    </div>
                </div>
            </div>
            <div class="md:grid grid-cols-6 gap-4 mt-10">
                <div class="lg:col-span-2 md:col-span-3 mt-5 md:mt-0">
                    <p class="uppercase text-lg font-black flex justify-center">
                        Productos Por Categoría
                    </p>
                    
                    <div class="flex justify-center px-5">
                        <canvas id="myChart2" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="lg:col-span-2 md:col-span-3 mt-10 md:mt-0">
                    <div class="flex justify-center space-x-2">
                        <p class="uppercase text-lg font-black flex justify-center">
                            Ventas Por Mes
                        </p>
                        <form id="formularioventas" action="<?php echo e(route('ventasMensuales')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <select id="ventas" name="año"
                                class="border-2 rounded-md p-1 border-black border-opacity-20 outline-none focus:border-lime-500 w-full transition duration-200">>
                                <?php $__currentLoopData = $añosVenta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $año): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        <?php if(isset($id)): ?> <?php if($id == $año): ?>
                                selected <?php endif; ?>
                                        <?php endif; ?>
                                        value="<?php echo e($año); ?>"><?php echo e($año); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </form>
                    </div>
                    <div class="flex justify-center px-5">
                        <canvas id="myChart3" width="400" height="400"></canvas>
                    </div>
                    <div class="flex justify-center">
                        <p class="font-semibold">
                            Ventas Totales:
                        </p>
                        <p><?php echo e(count($ordenesCompra)); ?></p>
                    </div>
                    <?php if(isset($totalcomprasanual)): ?>
                        <div class="flex justify-center">
                            <p class="font-semibold">
                                Ventas durante al
                                <?php if(isset($id)): ?>
                                    <?php echo e($id); ?>

                                <?php elseif(isset($anio_actual)): ?>
                                    <?php echo e($anio_actual); ?>

                                <?php endif; ?>
                                :
                            </p>
                            <p><?php echo e($totalcomprasanual); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="lg:col-span-2 md:col-span-3 mt-10 md:mt-0">
                    <div class="flex justify-center space-x-2">
                        <p class="uppercase text-lg font-black flex justify-center">
                            Visitas Por Mes
                        </p>
                        <form id="formulariovisitas" action="<?php echo e(route('visitasMensuales')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <select id="visitas" name="año"
                                class="border-2 rounded-md p-1 border-black border-opacity-20 outline-none focus:border-lime-500 w-full transition duration-200">>
                                <?php $__currentLoopData = $añosVisita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $año): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        <?php if(isset($añoselect)): ?> <?php if($añoselect == $año): ?>
                                selected <?php endif; ?>
                                        <?php endif; ?>
                                        value="<?php echo e($año); ?>"><?php echo e($año); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </form>
                    </div>
                    <div class="flex justify-center px-5">
                        <canvas id="myChart4" width="400" height="400"></canvas>
                    </div>
                    <div class="flex justify-center">
                        <p class="font-semibold">
                            Visitas Totales:
                        </p>
                        <p><?php echo e(count($visita)); ?></p>
                    </div>
                    <?php if(isset($totalvisitasanual)): ?>
                        <div class="flex justify-center">
                            <p class="font-semibold">
                                Visitas durante al
                                <?php if(isset($id)): ?>
                                    <?php echo e($id); ?>

                                <?php elseif(isset($anio_actual)): ?>
                                    <?php echo e($anio_actual); ?>

                                <?php endif; ?>
                                :
                            </p>
                            <p><?php echo e($totalvisitasanual); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startSection('js'); ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                $('#ventas').on('change', function() {
                    $('#formularioventas').submit();
                });
            });
            $(document).ready(function() {
                $('#visitas').on('change', function() {
                    $('#formulariovisitas').submit();
                });
            });
        </script>
        <script>
            const ctx2 = document.getElementById('myChart2');
            var categorias = [];
            var cantidad2 = [];
            <?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                categorias.push("<?php echo e($categoria->nombre_categoria); ?>");
                cantidad2.push("<?php echo e($categoria->productos); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: categorias,
                    datasets: [{
                        label: 'Productos',
                        data: cantidad2,
                        borderWidth: 0
                    }]
                },
                options: {

                }
            });
        </script>
        <script>
            var ctx = document.getElementById('myChart3');
            var meses = [];
            var cantidad3 = [];
            <?php $__currentLoopData = $array6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                meses.push("<?php echo e($item['mes']); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $array6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                cantidad3.push("<?php echo e($item['cantidad']); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Cantidad de Ventas',
                        data: cantidad3,
                        borderWidth: 0
                    }]
                },
                options: {
                    scales: {
                        y: {
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        </script>
        <script>
            var ctx = document.getElementById('myChart4');
            var meses2 = [];
            var cantidad4 = [];
            <?php $__currentLoopData = $array7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                meses2.push("<?php echo e($item['mes']); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $array7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                cantidad4.push("<?php echo e($item['cantidad']); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: meses2,
                    datasets: [{
                        label: 'Cantidad de Visitas',
                        data: cantidad4,
                        borderWidth: 0
                    }]
                },
                options: {
                    scales: {
                        y: {
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layaouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MySPlantas\resources\views/back-office.blade.php ENDPATH**/ ?>