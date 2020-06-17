<?php

namespace App\Http\Controllers\Backend\DoctorPatient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DoctorPatient;
use App\Patient;
use Auth;
use Session; 
class DoctorPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        if(Auth::user()->userrole == "hospital"){
            $patient = DoctorPatient::where(['clinic_id' => Auth::user()->clinic->id])->paginate(100);
        }else{
            if(session::get('clinic') == NULL){
                return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
            }
            $patient = DoctorPatient::where(['clinic_id' => Session('clinic')->clinic->id, 'doctor_id' => Session('doctor')->id])->paginate(100);
        }
        //dd($patient);
        return view("backend.doctorpatients.index", ['patient'=>$patient]); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->userrole == "doctor"){
            if(session::get('clinic') == NULL){
            
                return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
            }
        }
        return view("backend.doctorpatients.create"); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phonenum' => 'required',
        ]);

        //dd($request);
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->fathername = $request->fathername;
        $patient->email = $request->email;
        $patient->gender = $request->gender;
        $patient->presentaddress = $request->presentaddress;
        $patient->permanentaddress = $request->permanentaddress;
        $patient->phonenum = $request->phonenum;
        $patient->dateofbirth = date('Y-m-d', strtotime($request->dateofbirth));
        $patient->bloodgroup = $request->bloodgroup;

        $patient->save();

        //dd($patient->id);
        $doctorpatient = new DoctorPatient();
        if(Auth::user()->userrole == "hospital"){
            $doctorpatient->clinic_id = Auth::user()->clinic->id;
        }else{
            if(session::get('clinic') == NULL){
                return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
            }
            $doctorpatient->doctor_id = session('doctor')->id;
            $doctorpatient->clinic_id = session('clinic')->clinic->id;
        }
        $doctorpatient->patient_id = $patient->id;
        $doctorpatient->save();
        return redirect()->route('doctorpatient')->with(['success_msg' => 'Patient Added Successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::where('id', $id)->first();
       
        return view("backend.doctorpatients.edit", ['patient' => $patient]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phonenum' => 'required',
        ]);

        //dd($request);
        $patient = Patient::where('id', $id)->first();
        $patient->name = $request->name;
        $patient->fathername = $request->fathername;
        $patient->email = $request->email;
        $patient->gender = $request->gender;
        $patient->presentaddress = $request->presentaddress;
        $patient->permanentaddress = $request->permanentaddress;
        $patient->phonenum = $request->phonenum;
        $patient->dateofbirth = date('Y-m-d', strtotime($request->dateofbirth));
        $patient->bloodgroup = $request->bloodgroup;
        $patient->save();
        return redirect()->route('doctorpatient')->with(['success_msg' => 'Patient Updated Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorPatient::where('id',$id)->delete();
        return redirect()->route('doctorpatient')->with(['success_msg' => 'Patient Deleted Successfully!']);
    }
}
