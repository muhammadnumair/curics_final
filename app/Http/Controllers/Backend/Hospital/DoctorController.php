<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Doctor;
use App\DoctorClinic;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\HospitalDepartment;
use App\DoctorDepartments;

class DoctorController extends Controller
{
    public function index(){
        return view('backend.hospital.doctors.index');
    }

    public function treatment_history(){
        return view('backend.hospital.doctors.treatment_history');
    }

    public function create(){
        $departments = HospitalDepartment::where('clinic_id', Auth::user()->clinic->id)->get();
        return view('backend.hospital.doctors.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->department_id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->userrole = "doctor";
        if ($request->has('mobile')) {
            $user->mobile = $request->mobile;
        }
        $user->save();

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->user_id = $user->id;
        $doctor->alias =  str_replace(' ', '-', strtolower($request->name));
        $doctor->online_presense = 0;
        $doctor->save();
        
        $d_depart = new DoctorDepartments();
        $d_depart->doctor_id = $doctor->id;
        $d_depart->clinic_id = Auth::user()->clinic->id;
        $d_depart->department_id = $request->department_id;
        $d_depart->save();

        $d_depart->save();
        $dc = new DoctorClinic();
        $dc->doctor_id = $doctor->id;
        $dc->clinic_comission = $request->clinic_comission;
        $dc->clinic_id = Auth::user()->clinic->id;
        $dc->clinic_active = 1;
        $dc->doctor_fee = $request->doctor_fee;
        $dc->save();

        return redirect()->route('hospital_doctors');
    }

    public function destroy($id)
    {
        DoctorClinic::where('id',$id)->delete();
        return redirect()->route('hospital_doctors');
    }
}
