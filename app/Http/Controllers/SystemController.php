<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    //
    protected PaymentService $paymentService;

    public function __construct(protected PaymentService $pay)
    {
        $this->paymentService = $pay;
    }

    public function index(){
        $this->paymentService->gatewayName();
    }
}
