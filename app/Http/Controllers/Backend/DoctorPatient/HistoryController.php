<?php

namespace App\Http\Controllers\Backend\DoctorPatient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DoctorAppointment;
use App\DoctorPrescription;
use Auth;
use App\Patient;
use Session;
class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $patient = Patient::where('id', $id)->first();
        if(Auth::user()->userrole == "hospital"){
            $appointments = DoctorAppointment::where(['patient_id' => $id])->paginate(100);
            $prescriptions = DoctorPrescription::where(['patient_id' => $id])->paginate(100);
        }else{
            if(session::get('clinic') == NULL){
                return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
            }
            $prescriptions = DoctorPrescription::where(['patient_id' => $id, 'clinic_id' => Session('clinic')->clinic->id, 'doctor_id' => Session('doctor')->id])->paginate(100);
            $appointments = DoctorAppointment::where(['patient_id' => $id, 'clinic_id' => Session('clinic')->clinic->id, 'doctor_id' => Session('doctor')->id])->paginate(100);
        }
        
        return view("backend.doctorpatients.history", ['patient' => $patient, 'appointments' => $appointments, 'prescriptions' => $prescriptions]); 
        
    }
}
