<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    //
    private PaymentService $paymentService;
    public function __construct(PaymentService $service)
    {
     $this->paymentService =  $service;     
    }

    public function getOrderId(Request $request){
        $log_slug = "razor_pay_order_error_";
        try {
            if (!isset($request->amount) || !isset($request->order_type) || empty($request->amount) || empty($request->order_type) ) {
                $this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> "Razor pay order issue due to insufficient inputs"]);
                return response(['status' => false, "errors" => "Invalid parameters","message"=>"Something went wrong!"], 400);
            }
            $id = Payment::whereNotNull('id')->count();
            ++$id;
            $receipt_id = $request->order_type.date('His').$id;
            $paymentDetails = [ 
            "receipt" =>$receipt_id,
            "amount" => $request->amount*100,
            "currency" => $request->currency ?? "INR"];
             $orderId = $this->paymentService->initiatePayment($paymentDetails);
             return response(['status' => true, "data" => ['order_id'=> $orderId ,'receipt_id'=>$receipt_id],"message"=>"Razorpay Order created successfully"], 200);
        
        } catch (\Throwable $th) {
            $this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> $th->getMessage()]);
            return response(['status' => false, "errors" => $th->getMessage(),"message"=>"Something went wrong!"], 400);
    
        }       	
    }

    public function savePaymentDetails(Request $request){
        $log_slug = "save_online_order_error_";
        try {
            $validator_password = Validator::make($request->all(), [
                "type"=>"required",
                "amount" => "required",
                "user_contact" => "required",
                "user_email"=>"required",
                "payment_id" => "exists:payments,id"	
            ]);        
            if ($validator_password->fails()) {
                $this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $validator_password->errors()]);
                return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Invalid request"], 400);
            }
            $paymentDetails = array(
                "user_id"=>"",
                "payment_id"=>"",
                "order_id"=>"",
                "status"=>"",
                "amount"=>"",
                "type"=>"",
                "type_id"=>"",
                "details_json"=>"",
                "user_contact"=>"",
                "user_email"=>"",
                "user_address"=>""
            );   // just to remind all fields
            $paymentDetails = $request->all();
            $this->paymentService->savePaymentDetails($paymentDetails);
        } catch (\Throwable $th) {
            $this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $th->getMessage()]);         
            return response(['status' => false, "errors" => $th->getMessage(),"message"=> $th->getMessage()], 500);      
        }
 
    }

}
