<?php

namespace App\View\Components;

use Illuminate\View\Component;

class slider-mejor-calificados extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $calificados;

    public function __construct($calificados)
    {
        $this->calificados = $calificados;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider-mejor-calificados');
    }
}
