<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Centre;
use App\Models\Doctor;
use App\Models\orderLog;
use Illuminate\Http\Request;
use stdClass;

class handleOrder
{
    //
    public $order;
    public $steps;

    private $current_status;

    private $errorMessage;

    private $current_step;


    public function __construct(Order $order){
        $this->order = $order;
        $this->steps =  $this->order->logs;
        $this->current_status = @$this->order->logs->last()->status_name;
        $this->current_step = @$this->order->logs->last()->step_no;   
    }
    public function setOrder(Order $order){
        $this->order = $order;
        $this->steps =  $this->order->logs;
        $this->current_status = @$this->order->logs->last()->status_name;
        $this->current_step = @$this->order->logs->last()->step_no;
    }
    public function logger($key,$value){
    	return \App\Models\Log::create(array("title"=>$key,"details_json"=>json_encode($value)));
    }
    public function getCurrentStatus(){
        try {
           
            return @$this->order->logs->last();
        } catch (\Throwable $th) {
            $this->logger("get_order_current_status_error",json_encode(["error"=>$th->getMessage(),"data"=>$this->order]));
            return false;
        }      

    }
    public function getDetailsByStep($step_no){
        $log =  $this->order->logs->where('step_no',$step_no)->first();
        if(!empty($log))
        $log->details = json_decode($log->section_content_json);
        return $log;
    }
  

    public function setOrderDetails(){
        try {
           
            $log = new orderLog();
            $log->order_id = $this->order->id;
            $log->update_message = "Order has been recieved.";
            $log->status_name = "pending";
            $log->section_title = "Order Details";
            $log->section_content_json = json_encode([
                'order_id' => $this->order->order_id,
                'order_type'=>$this->order->order_type,
                'order_details'=>json_decode(json_encode($this->order->orderDetails),true),
                'order_charges'=>json_decode(json_encode($this->order->chargeDetails),true),
                'recieved_on'=>date("H:i, d M",strtotime($this->order->created_at))
            ]);
            $log->step_no = 1;
            $log->icon = 'fa fa-pencil';
            $log->class = 'success';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_order_details_error",json_encode(["error"=>$th->getMessage(),"data"=>$this->order]));
            return false;
        }
      
    }
    public function getOrderDetails(){
        try {
         return $this->order->logs->where('step_no',1)->first();
           
        } catch (\Throwable $th) {
            $this->logger("get_order_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function setConfirmation(Int $delivery_time = 7){
        try {
           
            $log = new orderLog();
            $log->order_id = $this->order->id;
            $log->update_message = "Order has been confirmed.";
            $log->status_name = "confirmed";
            $log->section_title = "Confirmation";
            $log->section_content_json = json_encode([
                'order_id' => $this->order->order_id,
                'confirmed_on'=>date("Y-m-d H:i:s"),
                'estimated_delivery'=> $this->getEstimatedDeliveryTime($delivery_time,null,"days"),
                'delivery_address' => $this->order->user_address
            ]);
            $log->step_no = 2;
            $log->icon = 'fa fa-check';
            $log->class = 'success';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_order_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function setCancel(){
        try {
            $log = new orderLog();
            $log->order_id = $this->order->id;
            $log->update_message = "order has been cancelled.";
            $log->status_name = "cancelled";
            $log->section_title = "Confirmation";
            $log->section_content_json = json_encode([
                'order_id' => $this->order->order_id,
                'cancelled_on'=>date("Y-m-d H:i:s"),
                'refund'=>'processing'
            ]);
            $log->step_no = 2;
            $log->icon = 'fa fa-close';
            $log->class = 'danger';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_order_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function setReadyInfo(){
        try {
          
            $log = new orderLog();
            $log->order_id = $this->order->id;
            $log->update_message = "Order is ready and being packed.";
            $log->status_name = "order_ready";
            $log->section_title = "Order Ready";
            $log->section_content_json = json_encode([
                'order_id' => $this->order->order_id,
                'ready_on'=> date("H:i:s Y-m-d"),              
            ]);
            $log->step_no = 3;
            $log->icon = 'fa fa-calendar';
            $log->class = 'success';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_order_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function setPackInfo(){
        try {
          
            $log = new orderLog();
            $log->order_id = $this->order->id;
            $log->update_message = "Order packed and being handed over to courier Service.";
            $log->status_name = "packed";
            $log->section_title = "Order Packed";
            $log->section_content_json = json_encode([
                'order_id' => $this->order->order_id,
                'packed_on'=> date("H:i:s Y-m-d"),              
            ]);
            $log->step_no = 4;
            $log->icon = 'fa fa-calendar';
            $log->class = 'success';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_order_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function setDeliveryInfo($user = null){
        try {
          
            $log = new orderLog();
            $log->order_id = $this->order->id;
            $log->update_message = "Order delivered successfully.";
            $log->status_name = "delivered";
            $log->section_title = "Order Delivered";
            $log->section_content_json = json_encode([
                'order_id' => $this->order->order_id,
                'delivered_on'=> date("H:i:s Y-m-d"),   
                "delivered_by_name" => !empty($user) ? $user->name : "",  
                "delivered_by_id" => !empty($user) ? $user->id : "",         
            ]);
            $log->step_no = 5;
            $log->icon = 'fa fa-calendar';
            $log->class = 'success';
            if ($log->save()) {
                $this->order->status = "completed";
                $this->order->save();
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_order_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function setRecieved(){
        try {
          
            $log = new orderLog();
            $log->order_id = $this->order->id;
            $log->update_message = "Thank you for ordering from ROLLSWALLAH";
            $log->status_name = "order_recieved";
            $log->section_title = "Order Recieved";
            $log->section_content_json = json_encode([
                'order_id' => $this->order->order_id,
                'time'=> date("H:i, d M"),
                'duration' => floor((strtotime("now") - strtotime($this->order->created_at))/60),                
            ]);
            $log->step_no = 3;
            $log->icon = 'fa fa-calendar';
            $log->class = 'success';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_order_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
     public function setFeedback($feedback=""){
        try {
            $log = new orderLog();
            $log->order_id = $this->order->id;
            $log->update_message = "Feedback submited.";
            $log->status_name = "feedback";
            $log->section_title = "Get well soon!";
            $log->section_content_json = json_encode([
                'order_id' => $this->order->order_id,
                'placed_on'=>date("H:i:s, d M,Y ",strtotime($this->order->created_at)),
                'feedback'=>$feedback
            ]);
            $log->step_no = 4;
            $log->icon = 'fa fa fa-comments-o';
            $log->class = 'success';
            if ($log->save()) {
                $this->order->review = $feedback;
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_order_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function getFeedback(){
        try {
            return $this->order->logs->where('step_no',4)->first();
              
           } 
        catch (\Throwable $th) {
               $this->logger("get_feed_details_error",json_encode(["error"=>$th->getMessage()]));
               return false;
           }
      
    }
    public function getConfirmation(){
        try {
            return $this->order->logs->where('step_no',2)->first();
              
           } 
        catch (\Throwable $th) {
               $this->logger("get_confirm_details_error",json_encode(["error"=>$th->getMessage()]));
               return false;
           }
      
    }
    public function getVisitInfo(){
        try {
            return $this->order->logs->where('step_no',3)->first();
              
           } 
        catch (\Throwable $th) {
               $this->logger("get_visit_details_error",json_encode(["error"=>$th->getMessage()]));
               return false;
           }
      
    }
    private function getEstimatedDeliveryTime($minutes = 40,$placed_at = null,$unit="minutes"){
        if(empty($placed_at))
        return date("Y-m-d H:i:s",strtotime("+".$minutes." ".$unit));
        return date("Y-m-d H:i:s",strtotime("+".$minutes." ".$unit,$placed_at));
    }

    private function getMinimumOrderValue(){
        return 250;
    }

    public function chargesApplicable($cart_items){
        $packing_charge = $this->getChargesByKey("packing_charge");
        $delivery_charge = $this->getChargesByKey("delivery_charge");
        $items = $cart_items;
        $packing_charge_amount = 0;
        $total = 0;
        foreach ($items as  $item) {
           if (!empty($item->product->include_packing_charge)) {
           $packing_charge_amount += ($item->product->packing_volume_type == "each" ? ( $item->quantity* $packing_charge->amount) :$packing_charge->amount );
           }
           $total += $item->subtotal;
        }
        if(!empty($packing_charge))
        $charges[] = [
            "charge_id" => $packing_charge->id,
            "amount"    => $packing_charge_amount,
            "charge_label" => $packing_charge->title,
            "charge_title" => $packing_charge->key_name,
            "order_id" => $this->order->order_id ?? null
        ];
        if ($total <= $this->getMinimumOrderValue()) 
        $charges[] = [
            "charge_id" => $delivery_charge->id,
            "amount"    => $delivery_charge->amount,
            "charge_label" => $delivery_charge->title,
            "charge_title" => $delivery_charge->key_name,
            "order_id" => $this->order->order_id ?? null
        ]; 
        return $charges;

    }


    public function getOrderCouponsHTML($order_id_array = []){
         if(empty($order_id_array)){
            return [];
         }
           $orders = Order::whereIn("order_id",$order_id_array)->orderBy("id","DESC")->get();
           $orderHTML = [];
           if(empty($orders))
           return "<li>No orders found with filter</li>";
         foreach ($orders as $key => $order) {    
           $this->__construct($order->id);           
           $order->current_status = $this->current_status;
           $html_order = view("adminpanel.expenses.components.order_coupon",["order"=>$order])->render();
           $orderHTML[] = $html_order;
         }
         return $orderHTML;

    }
    public function getOrderTimelineHTML(){
        $order = $this->order;
        $order->step_one =   $this->getDetailsByStep(1);
        $order->step_two =   $this->getDetailsByStep(2);
        $order->step_three = $this->getDetailsByStep(3);
        $order->step_four = $this->getDetailsByStep(4);
        $order->step_five = $this->getDetailsByStep(5) ?? new stdClass;
        $this->order->logs();
        $this->order->orderDetails();
        // dd($this->order);
        $order->step_five->expected_delivery = $this->getEstimatedDeliveryTime(null,strtotime($order->step_one->created_at),"days");
        $timelineHTML = view("adminpanel.expenses.components.order_timeline",["order"=>$order]);
        return $timelineHTML;
    }
    public function getOrderDetailsHTML(){
        
        $detailsHTML = view("adminpanel.expenses.components.order_details",["order"=>$this->order]);
        return $detailsHTML;
    }
    public function getOrderInfoHTML(){
        $this->order->current_status = $this->current_status;
        $this->order->step_one =   $this->getDetailsByStep("1");
        $this->order->step_two =   $this->getDetailsByStep(2) ?? new stdClass;
        $this->order->step_three = $this->getDetailsByStep(3) ?? new stdClass;
        $this->order->step_four = $this->getDetailsByStep(4) ?? new stdClass;
        $this->order->step_five = $this->getDetailsByStep(5) ?? new stdClass;
        $infoHTML = view("adminpanel.expenses.components.order_info",["order"=>$this->order]);
        return $infoHTML;
    }
    public function getChargesByKey($key){
        try {
            return \App\Models\Charge::where("key_name",$key)->first();
        } catch (\Throwable $th) {
           $this->logger($key."_getCharges",$key);
           return null;
        }
    }

}
