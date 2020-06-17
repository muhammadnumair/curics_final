<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Request;
use App\Doctor;
use Session;
use App\Patient;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user){
        $user = Auth::user();

        if($user->userrole == "doctor"){
            $doctor = Doctor::where('user_id', $user->id)->first();
            Session(['doctor'=> $doctor]);
        }

        //dd($user->userrole);
        if($user->userrole == "patient"){
            $patient = Patient::where('user_id', $user->id)->first();
            Session(['patient'=> $patient]);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        Session(['patient'=> null]);
        Session(['doctor'=> null]);
        return redirect('/login');
    }
}
