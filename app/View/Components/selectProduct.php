<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\StaticAsset;
use Illuminate\View\Component;

class selectProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
    public $offer_type;
    public function __construct()
    {
        //
        $this->categories = Category::all();
        $this->offer_type = StaticAsset::getAssetsByTitle("offer_type");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-product');
    }
}
