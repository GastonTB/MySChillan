<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modal-registro extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $regiones;
    public $comunas;
    public function __construct($regiones , $comunas)
    {
        $this->regiones = $regiones;
        $this->comunas = $comunas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-registro');
    }
}
