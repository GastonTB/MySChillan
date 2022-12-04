<div>
    <div class="border-1 rounded-md bg-gray-100 shadow-md mb-10 md:mb-0">
        <form action="{{route('filtrar')}}" method="POST">
            @csrf
            <div class="py-5">
                <p class="text-xl ml-5 mb-5 font-black text-lime-500">Filtrar por Categorias</p>
                
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
                    <div class="p-5 bg-white mb-3">
                        <input name="minimo" type="range" min="0" max="100000" value="0" step="10000" class="minimo w-full h-2 rounded-lg appearance-none cursor-pointer bg-gray-700">
                    </div>
                    <label class="mb-2 font-black text-gray-700 flex">Precio Máximo: <p class="precio_maximo text-lime-500 ml-1"></p></label>
                    <div class="p-5 bg-white">
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