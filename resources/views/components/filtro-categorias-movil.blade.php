<div>
    <div class="border-1 rounded-md md:rounded-none bg-gray-100 shadow-md mb-10 md:mb-0 border-1">
        <div id="lista-filtros" class="grid grid-cols-2 px-5 py-3 mb-5 bg-lime-500 rounded-md md:rounded-t-md md:rounded-b-none">
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
            <div id="filtros" class="pb-5 hidden md:block">
                <p class="ml-5 mb-5 font-black text-gray-700">Filtrar por Categorias</p>
                
                <ul class="mx-5 border-1 rounded-md px-5 pb-5 bg-white" id="categorias2">
                    <li class="py-2 hover:text-lime-500">
                        <div class="form-check">
                            <input name="categorias[]" 
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
                            <input name="categorias[]" value="2" 
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
                            <input name="categorias[]" value="3" 
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
                            <input name="categorias[]" value="4" 
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
                            <input name="categorias[]" value="5" 
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
                            <input name="categorias[]" value="6" 
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
                            <input name="categorias[]" value="7" 
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
                            <input name="categorias[]" value="8" 
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
                            <input name="categorias[]" value="9" 
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
                        <input name="minimo" type="range" min="0" max="100000" value="0" step="10000" class="minimo w-full h-2 rounded-lg appearance-none cursor-pointer bg-gray-700">
                    </div>
                    <label class="mb-2 font-black text-gray-700 flex">Precio Máximo: <p class="precio_maximo text-lime-500 ml-1"></p></label>
                    <div class="p-5 bg-white rounded-md">
                        <input name="maximo" type="range" min="0" max="100000" value="100000" step="10000" class="maximo w-full h-2 rounded-lg appearance-none cursor-pointer bg-gray-700">
                    </div>
                </div>
            <div class="flex justify-center lg:justify-start lg:ml-5">
                <button type="submit" class="btn-primary">
                    <p>Filtrar</p>
                </button>
            </div>
            </div>
        </form>
    </div>
</div>