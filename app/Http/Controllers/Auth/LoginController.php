<?php

namespace App\Http\Controllers\Auth;

use App\Business;
use App\Http\Controllers\Controller;
use App\Individual;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
            return redirect('/home');
        }
        else
            return back();
//        $business = Business::all();
//        foreach ($business as $busy) {
//            if (Hash::check(Input::get('password'), $busy->password)){
//
//            }
//        }
//        $individual = Individual::all();
//        foreach ($individual as $solo) {
//            if (Hash::check(Input::get('password'), $solo->password)){
//                //auth
//            }
//        }
    }
}
