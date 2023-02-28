<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;  

    public function logger($key,$value){
    	return \App\Models\Log::create(array("title"=>$key,"details_json"=>json_encode($value)));
    }
    public $weekdays = array(
        ['no'=>1,'day'=>"Sunday"],
        ['no'=>2,'day'=>"Monday"],
        ['no'=>3,'day'=>"Tuesday"],
        ['no'=>4,'day'=>"Wednesday"],
        ['no'=>5,'day'=>"Thursday"],
        ['no'=>6,'day'=>"Friday"],
        ['no'=>7,'day'=>"Saturday"],
    );
    function get_guard(){
        if(Auth::guard('admin')->check())
            {return "admin";}
        elseif(Auth::guard('user')->check())
            {return "user";}
        elseif(Auth::guard('client')->check())
            {return "client";}
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
