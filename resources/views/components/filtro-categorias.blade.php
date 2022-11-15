<div>
    <form action="" method="POST">
        @csrf
            <p class="text-xl ml-5 mb-5 font-black">Filtrar por Categorias</p>
            
            <ul class="ml-5">
                <li class="py-2 hover:text-green-500">
                    <div class="form-check">
                        <input name="categorias[]" value="1" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="ornamentales">
                        <label class="form-check-label inline-block text-gray-800">
                          Ornamentales
                        </label>
                    </div>
                </li>
                <li class="py-2 hover:text-green-500">
                    <div class="form-check">
                        <input name="categorias[]" value="2" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="interior">
                        <label class="form-check-label inline-block text-gray-800">
                          Plantas de Interior
                        </label>
                    </div>
                </li>
                <li class="py-2 hover:text-green-500">
                    <div class="form-check">
                        <input name="categorias[]" value="3" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="exterior">
                        <label class="form-check-label inline-block text-gray-800">
                          Plantas de Exterior
                        </label>
                    </div>
                </li>
                <li class="py-2 hover:text-green-500">
                    <div class="form-check">
                        <input name="categorias[]" value="4" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="suculentas">
                        <label class="form-check-label inline-block text-gray-800">
                          Suculentas
                        </label>
                    </div>
                </li>
                <li class="py-2 hover:text-green-500">
                    <div class="form-check">
                        <input name="categorias[]" value="5" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="arboles">
                        <label class="form-check-label inline-block text-gray-800">
                          Árboles Frutales
                        </label>
                    </div>
                </li>
                <li class="py-2 hover:text-green-500">
                    <div class="form-check">
                        <input name="categorias[]" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="maceteros">
                        <label class="form-check-label inline-block text-gray-800">
                          Maceteros
                        </label>
                    </div>
                </li>
                <li class="py-2 hover:text-green-500">
                    <div class="form-check">
                        <input name="categorias[]" value="6" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="tierra">
                        <label class="form-check-label inline-block text-gray-800">
                          Tierra de Hojas
                        </label>
                    </div>
                </li>
                <li class="py-2 hover:text-green-500">
                    <div class="form-check">
                        <input name="categorias[]" value="7" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-black focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="accesorios">
                        <label class="form-check-label inline-block text-gray-800">
                          Accesorios
                        </label>
                    </div>
                </li>
            </ul>
        
        <div class="flex justify-center mt-5 mb-5 lg:justify-start lg:ml-5">
            <button type="submit" class="text-xl mr-5 font-bold px-6 py-2.5 bg-green-500 text-white leading-tight uppercase rounded shadow-md hover:shadow-lg  hover:bg-white hover:text-green-500 focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-150 ease-in-out">
                <p>Filtrar</p>
            </button>
        </div>
    </form>
</div>