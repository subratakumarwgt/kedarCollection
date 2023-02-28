<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\handleOrder;
use App\Models\Order;
use App\Models\User;

class HandleOrderController extends Controller
{
    //
    private $orderService;

    public function __construct(handleOrder $service)
    { 
        $order = Order::whereOrderId(request()->route("order_id"))->first();    
        $service->setOrder($order); 
        $this->orderService = $service;  
    }
    public function index(){
       echo $this->orderService->getOrderInfoHTML();
    }
    public function confirmOrder($id,Request $request){        
        if (empty($request->preparation_time)) {
            return response(['status'=>false,'message'=>"No data Provided"],400);
        }
        // $orderController = $this->orderService;

       if($this->orderService->setConfirmation($request->preparation_time)) 
        return response(['status'=>true,'message'=>"Order confirmed!","service" => $this->orderService],200);
        else{
            return response(['status'=>false,'message'=>"Order not confirmed!"],400);     
        }
    }
    public function readyOrder($id,Request $request){        			
        $orderController = $this->orderService;
        $orderController->setReadyInfo();
        return response(['status'=>true,'message'=>"Order confirmed!"],200);
    }
    public function packOrder($id,Request $request){        			
        $orderController = $this->orderService;
        $orderController->setPackInfo();
        return response(['status'=>true,'message'=>"Order packed and handed over!"],200);
    }
    public function deliverOrder($id,Request $request){        			
        $orderController = $this->orderService;
        if(isset($request->delivery_boy_id))
         $user = User::find($request->delivery_boy_id);
        else
        $user = [];
        $orderController->setDeliveryInfo($user);
        return response(['status'=>true,'message'=>"Order delivered!"],200);
    }
    public function getOrderLog($id){
        $order = Order::where("order_id",$id)->first();			
        $orderController = $this->orderService;		
        $order->orderDetails = $order->orderDetails;
        foreach ($order->orderDetails as $key => $value) {
            $value->product = $value->product;
        }
        return response(['status'=>true,'data'=>$orderController->steps,"order" => $order],200);
    }
}
