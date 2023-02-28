<?php

namespace App\Http\Controllers;

use App\Events\NewBooking;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Centre;
use App\Models\Collection;
use App\Models\Doctor;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slots;
use App\Models\StaticAsset;
use App\Models\Visits;
use App\View\Components\Product as ComponentsProduct;
use App\View\Components\userpanel\cartRows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserDashboardController extends Controller
{
    //

    public function index(Request $request){
        $data['ice_creams'] = Product::where("category","ice cream")->get();
        
        $data['fast_foods'] = Product::where("category","fast food")->get();
        
        
      return view('userpanel.home-page',$data);
    }
     public function loginView()
    {
        return view('userpanel.login');
    }
    public function registerView()
    {
        return view('userpanel.register');
    }
    public function dashboardView()
    {
        return view('userpanel.dashboard');
    }

    public function doctorView()
    {
        $doctor_list = Slots::groupBy('doctor_id')->get()->pluck('doctor_id');
        $doctors = [];
        $doctors = Doctor::whereIn('id',$doctor_list)->paginate(5);
        return view('userpanel.doctor-list',['doctors'=>$doctors]);
    }
    public function doctorProfile($doctor_id){       
        $doctor = Doctor::find($doctor_id);
        return view('userpanel.doctor-profile',['doctor'=>$doctor]);
    }
    public function profileEdit()
    {
        $user = Auth::User();
     //   $user = User::find($id);
        $profile_checked = "";
        $address_checked = "";
        if (!empty($user->profile())) {
            $profile_checked = "checked";
        }
        if (!empty($user->address())) {
            $address_checked = "checked";
        }
      //  $booking = Booking::find(1);
       
        return view("userpanel.profilepassword",['user'=>$user,'profile_checked'=>$profile_checked,'address_checked'=>$address_checked]);
    }
    public function productView(Request $request=null){
        $user_id = null;
        if(Auth::check()){
            $user_id = Auth::User()->id;
        }
        else{
            $user_id = Session::getId();
        }
       $categories = StaticAsset::getAssetsByTitle("product_categories");
       $subcategories =  StaticAsset::getAssetsByTitle("product_sub_categories");
        $products = Product::where('status',"1");
        if (isset($request->search) && !empty($request->search)) {
           $products = $products->where("title","LIKE","%".$request->search."%")->orWhere("tags_json","LIKE","%".$request->search."%");
        }
        if (isset($request->category) && !empty($request->category)) 
        $products = $products->where("category",$request->category);

        $products = $products->paginate(16);
        return view('userpanel.product-list',['products'=>$products,'categories'=>$categories,'subcategories'=>$subcategories,'user_id'=>$user_id]);
    }
    public function myBookingList()
    {
        $bookings = Booking::where('user_id',Auth::User()->id)->orderBy('id','desc')->get();
        foreach ($bookings as $key => $booking) {
           $booking->doctor = Doctor::find($booking->doctor_id);
           $booking->centre = Centre::find($booking->centre_id);

        }
        return view('userpanel.booking_list',['bookings'=>$bookings]);
    }
    public function cartView()
    {
        if (Auth::check()) {
           $user_id = Auth::User()->id;
        }
        else 
        $user_id = Session::getId();
        $items = Cart::where('user_id',$user_id)->get();

        $cart = new cartRows();
        $subtotal = 0;
        $subtotal_total = 0;
        $discount = 0;
        foreach ($items as $key => $value) {
            $subtotal_total += ($value->product->pre_price * $value->quantity);
            $discount += ((!empty($value->product->on_offer) ?( $value->product->pre_price-$value->product->price) : 0 )* $value->quantity);      
            $subtotal += ((!empty($value->product->on_offer) ? $value->product->price : $value->product->pre_price )* $value->quantity);
        }
        $order = new OrderController();
        $charges = $order->chargesApplicable($items);
        return view('userpanel.cart',['items'=>$cart->cart_rows,'subtotal'=>$cart->cart_total,"subtotal_total" =>$cart->cart_total, "discount" => $cart->cart_discount,"charges"=>$charges]);
    }
    public function checkout($subtotal=0){
        if (Auth::check()) {
               $user_id=Auth::User()->id;   
                       
          }
          else{
            $user_id = Session::getId();
          }
         
              if (Cart::where('user_id',$user_id)->count() > 0) {
                  # code...
              //  $user = \App\User::find($user_id);
              $cart = new cartRows;
    
              $items = Cart::where('user_id',$user_id)->get();
              $order = new OrderController();
              $subtotal = 0;
              $subtotal_total = 0;
              $discount = 0;
              foreach ($items as $key => $value) {
                  $subtotal_total += ($value->product->pre_price * $value->quantity);
                  $discount += ((!empty($value->product->on_offer) ?( $value->product->pre_price-$value->product->price) : 0 )* $value->quantity);      
                  $subtotal += ((!empty($value->product->on_offer) ? $value->product->price : $value->product->pre_price )* $value->quantity);
              }
            $item_html = view('userpanel.components.checkoutcart',['cart_items'=>$items])->render();
           //  $charges = \App\charges::find(1);
    
            return view('userpanel.newcheckout',[
                "user" => Auth::check() ? Auth::User() : [],
                'user_id' => $user_id,
                'address' => Auth::check() ? Auth::User()->address : null,
                'subtotal' => $cart->cart_total,
                "subtotal_total" => $subtotal_total,
                "discount" => $cart->cart_discount,
                'charges' => $order->chargesApplicable($items) ?? "",
                'item_html'=>$cart->render()->render()
            ]);
              }
              
        }
    public function myBookingView($booking_id){
        $booking_id = Booking::where('booking_id',$booking_id)->first()->id;
        $appointment = new AppointmentController($booking_id);
        // $appointment = $appointment->appointment;
        //  dd($appointment);
        return view('userpanel.mybookings',['app_log'=>$appointment]);
    }
    public function orderTrackView($order_id){
        $order = Order::where('order_id',$order_id)->first();
        if(Auth::check())
        {
            $user = Auth::User();
            $user_id = $user->id;
        }
        else{
            $user_id = Session::getId();
        }
        // dd($user_id);
        if($order->user_id == $user_id)
        { 
            
            $order->orderDetails = $order->orderDetails;
            foreach ($order->orderDetails as $key => $detail) {
            $detail->product = $detail->product;
            }
            $appointment = new OrderController($order->id);
            return view('userpanel.trackOrder',['order_log'=>$appointment,"order" => $order ])->with("message","Access denied for current action");
    
             }
       else{
        return view('userpanel.access-denied');
    
       }
    }
    public function customPage($slug){
        $data["page"] = Page::where("slug",$slug)->where("status","1")->first();
        if(Auth::check())
        {
            $user = Auth::User();
            $data["user_id"] = $user->id;
        }
        else{
            $data["user_id"] = Session::getId();
        }
        if(empty($data["page"]))
        return view('userpanel.access-denied');
        return view("userpanel.custom_page",$data);
    }

    public function shopByCategory($id = null,Request $request){
        if(!empty($id) && $request->ajax())
        {
            $products = Category::find($id)->products;
            $items_html = [];
            foreach ($products as $key => $product) {
                $html = new ComponentsProduct($product);
                $item_html[]  = '<div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6">'.$html->render()->render().'</div>';
            }
            return response($item_html,200);
        }
        $categories = Category::where("status","1");
        if(!empty($id)){
         $categories = $categories->where("id",$id);   
        }
        $data["categories"] = $categories->get();
        $data["shop_by"] = "categories";
        if(Auth::check())
        {
            $user = Auth::User();
            $data["user_id"] = $user->id;
        }
        else{
            $data["user_id"] = Session::getId();
        }
        return view("userpanel.newshop",$data);
    }
    public function shopByCollection($id = null,Request $request){
        if(!empty($id) && $request->ajax())
        {
            $products = Collection::find($id)->products;
            $items_html = [];
            foreach ($products as $key => $product) {
                $html = new ComponentsProduct($product->product);
                $item_html[]  = '<div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6">'.$html->render()->render().'</div>';
            }
            return response($item_html,200);
        }
        $collections = Collection::where("status","1");
        if(!empty($id)){
        $collections = $collections->where("id",$id);   
        }
       
        $data["collections"] = $collections->get();

        $data["shop_by"] = "collections";
        if(Auth::check())
        {
            $user = Auth::User();
            $data["user_id"] = $user->id;
        }
        else{
            $data["user_id"] = Session::getId();
        }
        return view("userpanel.newshop",$data);
    }
    public function shopByOffer($id = null,Request $request){
        if(!empty($id) && $request->ajax())
        {
            $products = Offer::find($id)->products;
            $items_html = [];
            foreach ($products as $key => $product) {
                $html = new ComponentsProduct($product->product);
                $item_html[]  = '<div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6">'.$html->render()->render().'</div>';
            }
            return response($item_html,200);
        }
      
        $offers = Offer::where("status","2");
        if(!empty($id)){
         $offers = $offers->where("id",$id);   
        }
        $data["offers"] = $offers->get();
        $data["shop_by"] = "offers";
        if(Auth::check())
        {
            $user = Auth::User();
            $data["user_id"] = $user->id;
        }
        else{
            $data["user_id"] = Session::getId();
        }
        return view("userpanel.newshop",$data);
    }
    public function shopByItem($id){
        if(Auth::check())
        {
            $user = Auth::User();
            $data["user_id"] = $user->id;
        }
        else{
            $data["user_id"] = Session::getId();
        }
        $data["product"] = Product::find($id);
        return view("userpanel.singleproduct",$data);

    }

}
