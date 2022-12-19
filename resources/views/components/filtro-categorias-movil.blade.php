<div>
    <div class="border-1 rounded-md md:rounded-none bg-gray-100 shadow-md mb-10 md:mb-0 border-1">
        <div id="lista-filtros" class="grid grid-cols-2 px-5 py-3 mb-5 bg-lime-500 rounded-sm md:rounded-t-sm md:rounded-b-none">
            <div class="flex justify-start">
                <p class="text-xl font-black text-white">
                    Filtros
                </p>
            </div>
            <div class="flex justify-end items-center md:hidden">
                <i id="filtro-abajo" class="fa fa-chevron-down text-white"></i>
                <i id="filtro-arriba" class="fa fa-chevron-up text-white hidden"></i>
            </div>
        </div>
        <form action="{{route('filtrar')}}" method="POST">
            @csrf
            <div id="filtros" class="pb-5 hidden  md:block">
                <p class="ml-5 mb-5 font-black text-gray-700">Filtrar por Categorias</p>
                
                <ul class="mx-5 border-1 rounded-md px-5 pb-5 pt-5 bg-white" id="categorias2">
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categoria[]" 
                            value="1" 
                            @if( ! empty($categoria))
                                @if($categoria == 1)
                                checked
                                @endif
                            @endif
                            class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" >
                            <label class="form-check-label inline-block text-gray-800">
                              Ornamentales
                            </label>
                        </div>
                    </li>
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categoria[]" value="2" 
                            @if( ! empty($categoria))
                                @if($categoria == 2)
                                    checked
                                @endif
                            @endif
                            class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" >
                            <label class="form-check-label inline-block text-gray-800">
                              Plantas de Interior
                            </label>
                        </div>
                    </li>
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categoria[]" value="3" 
                            @if( ! empty($categoria))
                                @if($categoria == 3)
                                    checked
                                @endif
                            @endif
                            class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" >
                            <label class="form-check-label inline-block text-gray-800">
                              Plantas de Exterior
                            </label>
                        </div>
                    </li>
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categoria[]" value="4" 
                            @if( ! empty($categoria))
                                @if($categoria == 4)
                                    checked
                                @endif
                            @endif
                            class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  >
                            <label class="form-check-label inline-block text-gray-800">
                              Suculentas
                            </label>
                        </div>
                    </li>
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categoria[]" value="5" 
                            @if( ! empty($categoria))
                                @if($categoria == 5)
                                    checked
                                @endif
                            @endif
                            class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                            <label class="form-check-label inline-block text-gray-800">
                              Árboles Frutales
                            </label>
                        </div>
                    </li>
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categoria[]" value="6" 
                            @if( ! empty($categoria))
                                @if($categoria == 6)
                                    checked
                                @endif
                            @endif
                            class="categoria form-check-input rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150  appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                            <label class="form-check-label inline-block text-gray-800">
                              Maceteros
                            </label>
                        </div>
                    </li>
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categoria[]" value="7" 
                            @if( ! empty($categoria))
                                @if($categoria == 7)
                                    checked
                                @endif
                            @endif
                            class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  >
                            <label class="form-check-label inline-block text-gray-800">
                              Tierra de Hojas
                            </label>
                        </div>
                    </li>
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categoria[]" value="8" 
                            @if( ! empty($categoria))
                                @if($categoria == 8)
                                    checked
                                @endif
                            @endif
                            class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  >
                            <label class="form-check-label inline-block text-gray-800">
                              Accesorios
                            </label>
                        </div>
                    </li>
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categoria[]" value="9" 
                            @if( ! empty($categoria))
                                @if($categoria == 9)
                                    checked
                                @endif
                            @endif
                            class="categoria rounded-md hover:bg-lime-500 hover:animate-ping ease-in-out delay-150 form-check-input appearance-none h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  >
                            <label class="form-check-label inline-block text-gray-800">
                              Todos
                            </label>
                        </div>
                    </li>
    
                </ul>
                <span class="text-sm ml-5 mt-10" style="color:red"><small>@error('categorias'){{$message}}@enderror</small></span>                                                           
                <div class="lg:hidden border-lg pb-5 px-5">
                    <label class="mb-2 font-black text-gray-700 flex">Precio Mínimo: <p class="precio_minimo text-lime-500 ml-1"></p></label>
                    <div class="p-5 bg-white rounded-md mb-3">
                        <input name="minimo" type="range" min="0" max="100000" value="{{$minimo}}" step="10000" class="minimo w-full h-2 rounded-lg appearance-none cursor-pointer bg-gray-700">
                    </div>
                    <label class="mb-2 font-black text-gray-700 flex">Precio Máximo: <p class="precio_maximo text-lime-500 ml-1"></p></label>
                    <div class="p-5 bg-white rounded-md">
                        <input name="maximo" type="range" min="0" max="100000" value="{{$maximo}}" step="10000" class="maximo w-full h-2 rounded-lg appearance-none cursor-pointer bg-gray-700">
                    </div>
                </div>
                
                <div class="px-5 mb-5">
                    <p class="mb-2 font-black text-gray-700">Orden:</p>
                        <select name="ordenar" id="ordenar" class="border-2 rounded-md px-5 border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2 transition duration-200">
                                <option 
                                @if(isset($orden))
                                    @if($orden == 1)
                                        selected
                                    @endif
                                @endif
                                value="1">
                                Más recientes primero
                                </option>
                                <option
                                @if(isset($orden))
                                    @if($orden == 2)
                                        selected
                                    @endif
                                @endif
                                value="2">
                                    Más antiguos primero
                                </option>
                                <option
                                @if(isset($orden))
                                    @if($orden == 3)
                                        selected
                                    @endif
                                @endif
                                value="3">
                                    Ordenar por Precio: Mayor a Menor
                                </option>
                                <option
                                @if(isset($orden))
                                    @if($orden == 4)
                                        selected
                                    @endif
                                @endif
                                value="4">
                                    Ordenar por Precio: Menor a Mayor
                                </option>
                                <option
                                @if(isset($orden))
                                    @if($orden == 5)
                                        selected
                                    @endif  
                                @endif
                                value="5">
                                    Ordenar por Nombre: A-Z
                                </option>
                                <option
                                @if(isset($orden))
                                    @if($orden == 6)
                                        selected
                                    @endif
                                @endif
                                value="6">
                                    Ordenar por Nombre: Z-A
                                </option>
                                
                            
                        </select>
                </div>
                <input type="hidden" name="nombre_busqueda" id="nombre_busqueda_movil">
            <div class="flex justify-center lg:justify-start lg:ml-5">
                <button type="submit" class="btn-primary">
                    <p>Filtrar</p>
                </button>
            </div>
            </div>
        </form>
    </div>
</div>