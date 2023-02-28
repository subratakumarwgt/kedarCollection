<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }
     public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        if (\App\User::where('email',$user->email)->count() == 1) {
            $authUser = \App\User::where('email',$user->email)->first();
            Auth::login($authUser, true);
            return redirect('/?login='.$authUser->contact);
        }
        else
          return redirect('/login?login=unauthorized');

        // $user->token;
    }



    private function validator(Request $request)
{
    //validation rules.
    $rules = [
        'contact'    => 'required|exists:users|min:5|max:191',
        'password' => 'required|string|min:4|max:255',
    ];

    //custom validation error messages.
    $messages = [
        'contact.exists' => 'These credentials do not match our records.',
    ];

    //validate the request.
    $request->validate($rules,$messages);
}
private function loginFailed(){
    Session::flash('error', 'Login failed! There was an error, please try again'); 
    return redirect()
        ->back()
        ->withInput()
        ->with('error','Login failed, please try again!');
}
    public function login(Request $request)
    {
         $rules = [
        'contact'    => 'required|exists:users|min:5|max:191',
        'password' => 'required|string|min:4|max:255',
    ];

    //custom validation error messages.
    $messages = [
        'contact.exists' => 'These credentials do not match our records.',
    ];

    //validate the request.
    $request->validate($rules,$messages);
    $credentials = $request->only('contact', 'password');

   
if(Auth::attempt($credentials)){
    
        //Authentication passed...
        $role = Auth::User()->role;
    switch ($role) {
        case 'user':
            return redirect()->route('user-dashboard');
            break;
        case 'admin':
        return redirect()->route('admin-dashboard');

        default:
            # code...
            break;
    }          
                }

    //Authentication failed...
    return $this->loginFailed();
}
        // Redirect home page
       
    
    
}
