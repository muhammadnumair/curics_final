<?php

namespace App\Http\Controllers\Backend\Clinics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use Session;
use App\DoctorClinic;

class ClinicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $clinics = DoctorClinic::where('doctor_id', Session('doctor')->id)->get();
        //dd($clinics);
        //dd(Session('doctor')->clinics);
        $title = "All Clinics";
        //dd(session('doctor')[0]->clinics);
        return view("backend.clinics.index", ['clinics' => $clinics]);
    }

    public function chooseclinic($clinic){
        $dclinic = DoctorClinic::where('id', $clinic)->first();
        Session(['clinic'=> $dclinic]);
        //dd(session('clinic'));
        return redirect()->route('dashboard');
    }
}
