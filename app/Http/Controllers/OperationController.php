<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Contact;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\Product;
use App\Models\StaticAsset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OperationController extends Controller
{
    //
 public function slotCreate()
    {
       $centres = Centre::whereIn('type',['clinic','chamber'])->get();
       return view('adminpanel.slots.slotcreate',['centres'=>$centres]);
    }
}
