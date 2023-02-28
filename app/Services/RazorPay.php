<?php 


namespace App\Services;

use Razorpay\Api\Api;
use App\Models\Payment;

class RazorPay implements PaymentService {

    private $api_key;
    private $secret_key;

    private $client;

    private $errorMessage;

    public function __construct(Array $key_pair)
    {
        $this->api_key = $key_pair["api_key"] ;//'rzp_test_zyjdsYczp0XCJh';
		$this->secret_key = $key_pair["secret_key"] ;//'tWkIxUcqup9ohJc7GnweJxHo';

        $this->client = new Api(
            $this->api_key,
            $this->secret_key            
        );

        $this->errorMessage = "Sorry! Some thing went wrong";
       
    }
    private function setErrorMessage($message):void{
        $this->errorMessage = $message;
    }
    public function getErrorMessage(){
        return $this->errorMessage;
    }
  
    public function initiatePayment(Array $payment_details=[
        "receipt" => "",
        "amount" => "",
        "currency" => ""
    ]): string
    {   
        try {
            $order = $this->client->order->create([
                "receipt" => $payment_details["receipt"],
                "amount" => $payment_details["amount"],
                "currency" => $payment_details["currency"]
                ]);
            return $order->id;

        } catch (\Throwable $th) {
            $this->setErrorMessage($th->getMessage());
            return 0;
        }
        
        
        return 0;
        
    }

    public function savePaymentDetails(Array $payment_details): bool
    {
        try {
            $payment = new Payment();
            $payment->user_id = $payment_details["user_id"];
            $payment->payment_id = $payment_details["payment_id"];
            $payment->order_id = $payment_details["order_id"];
            $payment->status = $payment_details["status"];
            $payment->amount = $payment_details["amount"];
            $payment->type = $payment_details["type"];
            $payment->type_id = $payment_details["type_id"];
            $payment->details_json = $payment_details["details_json"];
            $payment->user_contact = $payment_details["user_contact"];
            $payment->user_email = $payment_details["user_email"];
            $payment->user_address = $payment_details["user_address"];
            return $payment->save();
        } catch (\Throwable $th) {
            return false;
        }
        
    }
    public static function razorPay(){
         $instance = new RazorPay([]);
         return $instance;
    }


    public function gatewayName():void{
     echo "RazorPay";
    }
}