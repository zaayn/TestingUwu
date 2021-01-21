<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
     use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    public function authenticated(){
        $user = \Auth::user();
        if(\Auth::check()){
            if ($user->isAdmin()) {
                return redirect('/admin/home');
            }
            else if ($user->isUser()) {
                return redirect('/softwaretester/home');
            }
            else{
                return redirect()->route('login');                
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
 
        $request->session()->flush();
 
        $request->session()->regenerate();
 
        return redirect('/login');
    }
}
