<?php

namespace App\View\Components;

use Illuminate\View\Component;

class filtro-categorias-movil extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categoria;

    public function __construct($categoria)
    {
        $this->$categoria = $categoria;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filtro-categorias-movil');
    }
}
