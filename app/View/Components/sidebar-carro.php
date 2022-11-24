<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sidebar-carro extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $carrito;
    public $id_carrito;

    public function __construct($carrito)
    {
        $this->carrito = $carrito;
        $this->id_carrito = $id_carrito;

    }
  
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-carro');
    }
}
