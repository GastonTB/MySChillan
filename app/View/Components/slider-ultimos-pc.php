<?php

namespace App\View\Components;

use Illuminate\View\Component;

class slider-ultimos-pc extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ultimos;
    public function __construct($ultimos)
    {
        $this->ultimos = $ultimos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider-ultimos-pc');
    }
}
