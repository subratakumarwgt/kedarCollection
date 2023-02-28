<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AuthenticationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }
    private function validator($request)
{
 // dd($request->all());
   $validator = Validator::make($request->all(), [       
        'contact' => 'required|string|min:10|exists:users',
        'password'  => 'required'
    ]);
  // dd($validator->fails());
    if ($validator->fails())
    {
       // dd($validator->errors());
        return $validator->errors();
    }
    else
    return false;
}
private function loginFailed(){
 
    return redirect()
        ->back()
        ->withInput()
        //->with('error','Login failed, please try again!');
       ->withErrors(['contact'=>'contact or password did not match!']);
}
    public function login(Request $request)
    {
     $errors =  $this->validator($request);
     if ($errors) {
         return
        redirect()
        ->back()
        ->withInput()
        //->with('error','Login failed, please try again!');
       ->withErrors($errors);
     }
    $credentials = $request->only('contact', 'password');
 //  dd($request->all());
     if(Auth::attempt($credentials)){
        //Authentication passed...
    // dd(Auth::User());
    $role = Auth::User()->role;
    if(isset($request->redirect_url))
    return redirect($request->redirect_url);
    switch ($role) {
        case 'user':
            return redirect()->route('product-dashboard');
            break;
            case 'admin':
            return redirect()->route('admin-dashboard');

        default:
            # code...
            break;
    }
   
       
            
            
    }
    return
    redirect()
    ->back()
    ->withInput()
    //->with('error','Login failed, please try again!');
   ->withErrors(['password'=>"Contact & Password combination did not match!"]);
    //Authentication failed...
 //   return $this->loginFailed();
}
   
}
