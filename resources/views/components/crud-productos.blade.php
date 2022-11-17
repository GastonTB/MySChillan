<div>
    <div>
        <div class="bg-green-500 columns-2 md:text-lg lg:text-md">
            <div class="flex justify-start">
                <div class="mx-2 py-2 text-white">
                    <i class="fa fa-bars"></i>
                </div>
                <p class="text-white font-black py-2">
                    Productos
                </p>
            </div>
            <div class="flex justify-end">
                <p id="flecha-arriba" class="text-white text-sm font-black mr-2 py-2">
                    <i class="fa fa-chevron-up"></i>
                </p>
                <p id="flecha-abajo" class="text-white text-sm font-black mr-2 py-2">
                    <i class="fa fa-chevron-down"></i>
                </p> 
            </div>
        </div>
        <div id="categoria" class="border-2 md:text-lg lg:text-md">
            <ul class="pl-2">
                <li class="py-2 mt-2 hover:text-green-500 hover:text-xl"><a href="{{route('crearproducto')}}">Crear Productos</a></li>
                <li class="py-2 hover:text-green-500 hover:text-xl"><a href="{{route('listado-productos')}}">Ver Productos</a></li>
                <li class="py-2 hover:text-green-500 hover:text-xl"><a href="#">Modificar Productos</a></li>
                <li class="py-2 hover:text-green-500 hover:text-xl"><a href="#">Ver Productos Sin Stock</a></li>
                <li class="py-2 hover:text-green-500 hover:text-xl"><a href="#">Eliminar Productos</a></li>
            </ul>
        </div>
    </div>
</div>