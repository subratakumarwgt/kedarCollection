<?php 


namespace App\Services;


interface PaymentService {

    //to save the payment details
    public function savePaymentDetails(Array $payment_details):bool ;

    public function initiatePayment(Array $payment_details):string ;

    public function gatewayName():void;

}