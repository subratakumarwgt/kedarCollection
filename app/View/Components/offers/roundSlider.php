<?php

namespace App\View\Components\offers;

use Illuminate\View\Component;

class roundSlider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $item;
    public function __construct($item)
    {
       $this->item = $item;  
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.offers.round-slider');
    }
}
