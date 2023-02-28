<?php

namespace App\View\Components\userpanel;

use App\View\Components\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class cartRows extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $cart_rows;

    public $cart_total;

    public $cart_discount;

    public $cart_items_count;

    public $cart_price;
  
    public function __construct()    
    {
        $this->cart_total = 0;
        $this->cart_discount = 0;
        $this->cart_price = 0;
    if(Auth::check())
    $this->cart_rows = \App\Models\Cart::where('user_id',Auth::User()->id)->get();
    else
    $this->cart_rows = \App\Models\Cart::where('user_id',Session::getId())->get();  
    
    $this->cart_items_count = $this->cart_rows->count();
        foreach ($this->cart_rows as $cart ){
            $product = new Product($cart->product);
            $cart->onOffer = $product->onOffer;
            if( $cart->onOffer)
            {           
                $cart->offer = $product->offer;
                $cart->price = $cart->offer->detail->type == 2 ? ceil($cart->product->price - ( $cart->product->price * $cart->offer->detail->value/100) ) : ($cart->product->price -  $cart->offer->detail->value) ;       
            }  
            else{
                $cart->price = $cart->product->price;
                
            }    
            $cart->pre_price = $cart->product->price;    
            $cart->discount = 0;
            if(!empty($cart->product_details) && !empty(json_decode($cart->product_details,true))){
                $cart->variants = isset(json_decode($cart->product_details,true)["variants"]) ? json_decode($cart->product_details,true)["variants"] : false;
                $cart->setOf = isset(json_decode($cart->product_details,true)["set"]) ? json_decode($cart->product_details,true)["set"]["quantity"] : 1;
                $cart->price = isset(json_decode($cart->product_details,true)["set"]) ? json_decode($cart->product_details,true)["set"]["price"] : $product->price;
                $cart->pre_price = $cart->price;        
            }
            if($cart->onOffer){
                $cart->price = $cart->offer->detail->type == 2 ? ceil($cart->price - ( $cart->price * $cart->offer->detail->value/100) ) : ($cart->price -  $cart->offer->detail->value) ;
                $cart->discount = $cart->pre_price - $cart->price;
                $this->cart_discount += $cart->discount;
            }
            $cart->subtotal = $cart->price * $cart->quantity;
            $this->cart_total += $cart->subtotal;
            // $this->cart_price+=
            

        }
    }
       
   

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.userpanel.cart-rows',["cart_rows" => $this->cart_rows,"cart_total" => $this->cart_total,"cart_discount" => $this->cart_discount,"cart_items_count" => $this->cart_items_count]);
    }
}
