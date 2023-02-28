<?php

namespace App\Providers;

use App\Services\RazorPay as ServicesRazorPay;
use Illuminate\Support\ServiceProvider;

class RazorPay extends ServiceProvider
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
        return [ServicesRazorPay::class];
    }
}
