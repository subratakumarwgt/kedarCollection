<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class similarProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product;
    public $similar_products;
    public function __construct(Product $product)
    {
        //
        $this->product = $product;
        if($this->product->Category->products->where("id","!=",$this->product->id)->count() > 0)
        $this->similar_products = $this->product->Category->products->where("id","!=",$this->product->id)->take(8);
        elseif(!empty( $this->product->offer->products) && $this->product->offer->products->where("product_id","!=",$this->product->id)->count() > 0)
        {
            $products = $this->product->offer->products->where("product_id","!=",$this->product->id)->take(8);
            foreach ($products as $key => $product) {
                $this->similar_products[] = $product->product;
            }
        }
        elseif(!empty($this->product->Collection) && $this->product->Collection->products->where("product_id","!=",$this->product->id)->count() > 0)
        {
            $products = $this->product->Collection->products->where("id","!=",$this->product->id)->take(8);
            foreach ($products as $key => $product) {
                $this->similar_products[] = $product->product;
            }
        }
        else
        $this->similar_products = Product::orderBy("created_at")->where("id","!=",$this->product->id)->take(8);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.similar-product',["products" => $this->similar_products]);
    }
}
