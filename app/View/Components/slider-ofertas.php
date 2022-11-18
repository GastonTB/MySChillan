<?php

namespace App\View\Components;

use Illuminate\View\Component;

class slider-ofertas extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ofertas;
    public function __construct($ofertas)
    {
        $this->ofertas = $ofertas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider-ofertas');
    }
}
