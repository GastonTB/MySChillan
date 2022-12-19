<?php

namespace App\View\Components;

use Illuminate\View\Component;

class filtro-categorias extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categoria;
    public $minimo;
    public $maximo;
    public function __construct($categoria, $minimo, $maximo, $orden)
    {
        $this->categoria = $categoria;
        $this->minimo = $minimo;
        $this->maximo = $maximo;
        $this->orden = $orden;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filtro-categorias');
    }
}
