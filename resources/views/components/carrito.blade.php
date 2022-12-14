<div>
    
        <div class="flex items-center">
            <div id="carrito" class="hover:cursor-pointer carro grid items-center mx-1 relative">
                <i class="hover:text-lime-500 carrito absolute top-0 right-0 fa fa-lg fa-shopping-cart md:hidden" aria-hidden="true"></i>
                <i class="hover:text-lime-500 carrito absolute top-0 right-0 fa fa-xl fa-shopping-cart hidden md:block" aria-hidden="true"></i>
                <div class="circulo hover:bg-black absolute bottom-0 left-0 rounded-full py-0.5
                    @if($carro['contador'] < 10)
                    px-1.5
                    @else
                    px-0.5
                    @endif
                bg-lime-500 text-2xs">
                    <p class="contador text-xs hover:text-white font-bold">
                        {{$carro['contador']}}
                    </p>
                </div>
            </div>
            &nbsp;
            &nbsp;
            &nbsp;
            <div class="items-center mx-1 lg:block hidden">
            <p class="font-black"> ${{number_format($carro['total'], 0, ',', '.')}}</p>
            </div>
        </div>
    
</div>