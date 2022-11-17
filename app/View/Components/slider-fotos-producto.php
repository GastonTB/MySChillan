<?php

namespace App\View\Components;

use Illuminate\View\Component;

class slider-fotos-producto extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $producto;
    public function __construct($producto)
    {
        $this->producto = $producto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider-fotos-producto');
    }
}
