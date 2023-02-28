<?php

namespace App\Http\Controllers;

use App\Events\NewBooking;
use App\Events\NewOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\AppointmentController;
use App\Models\Address;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Centre;
use App\Models\Charge;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Slots;
use App\Models\Item;
use App\Models\StaticAsset;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\DailyExpense;
use App\Models\OrderCharge;
use App\Models\Components\Element;
use App\Models\Components\compElement;
use App\Models\Components\compModels;
use App\Models\Components\compMain;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Razorpay\Api\Api;

class HomeController extends Controller
{
    //
      private $models_insertable ;
      public function __construct(){
        $this->models_insertable = ["Product","Item","Element","compElement","compModels","compMain"];
      }
      public function createFormView($model){
        if(in_array($model,$this->models_insertable));
        return view("userpanel.access-denied");
     

      }

}
