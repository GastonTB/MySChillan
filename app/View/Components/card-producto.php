<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card-producto extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $producto;
    public $contador;

    public function __construct($producto, $contador)
    {
        $this->producto = $producto;
        $this->contador = $contador;
        
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-producto');
    }
}
