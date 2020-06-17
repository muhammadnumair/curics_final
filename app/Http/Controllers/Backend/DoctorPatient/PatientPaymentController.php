<?php

namespace App\Http\Controllers\Backend\DoctorPatient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DoctorPatient;
use Auth;
use App\Patient;
class PatientPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //dd();
        if(Auth::user()->userrole === "hospital"){
            $patients = DoctorPatient::where([
                'clinic_id' => Auth::user()->clinic->id,
            ])->get();
        }else{
            $patients = DoctorPatient::where([
                'clinic_id' => Session('clinic')->clinic->id, 
                'doctor_id' => Session('doctor')->id
            ])->get();
        }

        //dd($patients[0]->patient->payments);
        return view("backend.doctorpatients.patient_payments", ['patients' => $patients]); 
    }

    public function history($id)
    {
        $patient = Patient::where([
            'id' => $id,
        ])->first();

        //dd($patient);
        return view("backend.doctorpatients.patient_payment_history", ['patient' => $patient]); 
    }
}
