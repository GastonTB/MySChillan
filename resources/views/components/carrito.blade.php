<div>
    
        <div class="flex items-center">
            <div id="carrito" class="hover:cursor-pointer carro grid items-center mx-1 relative">
                <i class="hover:text-lime-500 carrito absolute top-0 right-0 fa fa-xl fa-shopping-cart" aria-hidden="true"></i>
                <div class="circulo hover:bg-black absolute bottom-0 left-0 rounded-full py-1
                    @if($carro['contador'] < 10)
                    px-2
                    @else
                    px-1
                    @endif
                bg-lime-500 text-xs">
                    <p class="contador hover:text-white font-bold">
                        {{$carro['contador']}}
                    </p>
                </div>
            </div>
            &nbsp;
            &nbsp;
            &nbsp;
            <div class="items-center mx-1">
            <p class="font-black"> ${{number_format($carro['total'], 0, ',', '.')}}</p>
            </div>
        </div>
    
</div>