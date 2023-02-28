<?php

namespace App\View\Components;
use App\Models\Product as ModelsProduct;
use Illuminate\View\Component;

class singleProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $product;
     public $onOffer;
     public $offer;
     public $productArray;
     public function __construct(ModelsProduct $product)
     {
         //
         $this->product = $product;
         $this->onOffer = $this->isOnOffer();
         if($this->onOffer){
             $this->offerDetails();
             $this->product->offer_price = $this->offer->detail->type == 2 ? ceil($this->product->price - ( $this->product->price * $this->offer->detail->value/100) ) : ($this->product->price -  $this->offer->detail->value) ;
         }
         $this->productArray = ModelsProduct::getProductById($product->id);
         // dd($this->productArray);
         
         
     }
 
     private function isOnOffer(){
         try {
             return !empty(@$this->product->offer) && !empty( $this->product->offer->offer->detail) && ( $this->product->offer->offer->status == "2");
         } catch (\Throwable $th) {
            return false; 
         }
     
     }
     private function offerDetails(){
         if($this->onOffer)
         {
           $this->offer = $this->product->offer->offer;
         }
         else{
             return null;
         }
     }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.single-product',["product" => $this->product,"onOffer" => $this->onOffer , "productArray" => $this->productArray, "offer" => $this->offer ]);
    }
}
