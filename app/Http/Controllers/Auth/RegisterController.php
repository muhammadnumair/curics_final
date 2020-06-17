<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Patient;
use App\Doctor;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required'],
            'office_phone' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'office_phone' => $data['office_phone'],
            'email' => $data['email'],
            'userrole' => $data['userrole'],
            'password' => Hash::make($data['password']),
        ]);

        $id = $user->id;
        if($data['userrole'] == "doctor"){
            $alias = str_replace(' ', '_', strtolower($data['name']));
            $doctor = new Doctor();
            $doctor->name = $data['name'];
            $doctor->user_id = $id;
            $doctor->alias = $alias;
            $doctor->save();
        }else if($data['userrole'] == "patient"){
            $create_new = 1;
            $patient = Patient::where('email', $data['email'])->first();
            if($patient != null){
                $patient->user_id = $id;
                $patient->save();
                $create_new = 0;
            }
            $patient = Patient::where('phonenum', $data['mobile'])->first();
            if($patient != null){
                $patient->user_id = $id;
                $patient->save();
                $create_new = 0;
            }

            if($create_new == 1){
                $patient = new Patient();
                $patient->name = $data['name'];
                $patient->user_id = $id;
                $patient->save();
            }
        }
        return $user;
    }
}
