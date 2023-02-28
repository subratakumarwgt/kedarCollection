<?php

namespace App\Providers;

use App\Services\PaymentService;
use App\Services\RazorPay;
use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Creating the razorPay class with automatic credentials inserted
        $this->app->singleton(RazorPay::class,function(){
            $key_pair = [
                "api_key" => "rzp_test_zyjdsYczp0XCJh",
                "secret_key" => "tWkIxUcqup9ohJc7GnweJxHo"
            ];
            return  new RazorPay($key_pair);
        });

        
        $this->app->bind(PaymentService::class,$this->getPaymentMethod());                   
   
    }

    /**
     * Get default payment method selected by Admin.
     *
     * @return void
     */
    public function getPaymentMethod()
    {
        //
        
       return RazorPay::class;
   
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
       
                   
    }


    public function provides()
    {
        return [PaymentService::class];
    }
}
