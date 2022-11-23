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
    public $image;
    public $oferta;

    public function __construct($producto, $imagen, $oferta)
    {
        $this->producto = $producto;
        $this->image = $producto->imagenes;
        $this->oferta = $oferta;
    }

    public function customFunction(): string
    {
        return "string from a custom function component";
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
