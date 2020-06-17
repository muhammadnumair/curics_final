<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DoctorAppointment;
use Auth;
use App\AppointmentInvoice;
use App\AppointmentPayment;
use App\DoctorPrescription;
use App\Doctor;
use App\ClinicCompany;
use App\Patient;
use App\DoctorPatient;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $doctor = Doctor::where('id', $id)->first();

        $filter = request()->filter;

        if($filter == "previous"){
            if($id == null){
                $appointment = DoctorAppointment::where([
                    'clinic_id' => Auth::user()->clinic->id,
                ])->where('appointment_date', '<', date("m/d/Y"))->orderBy('created_at', 'DESC')->get();
            }else{
                $appointment = DoctorAppointment::where([
                    'clinic_id' => Auth::user()->clinic->id,
                    'doctor_id' => $id,
                ])->where('appointment_date', '<', date("m/d/Y"))->orderBy('created_at', 'DESC')->get();
            }
        }else if($filter == "all"){
            if($id == null){
                $appointment = DoctorAppointment::where([
                    'clinic_id' => Auth::user()->clinic->id,
                ])->orderBy('created_at', 'DESC')->get();
            }else{
                $appointment = DoctorAppointment::where([
                    'clinic_id' => Auth::user()->clinic->id,
                    'doctor_id' => $id,
                ])->orderBy('created_at', 'DESC')->get();
                //dd($appointment);
            }
        }else{
            if($id == null){
                $appointment = DoctorAppointment::where([
                    'clinic_id' => Auth::user()->clinic->id,
                ])->where('appointment_date', '>=', date("m/d/Y"))->orderBy('created_at', 'DESC')->get();
            }else{
                $appointment = DoctorAppointment::where([
                    'clinic_id' => Auth::user()->clinic->id,
                    'doctor_id' => $id,
                ])->where('appointment_date', '>=', date("m/d/Y"))->orderBy('created_at', 'DESC')->get();
            }
        }
        return view("backend.hospital.appointments.index", ['appointment' => $appointment, 's_doctor' => $doctor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null){
        $companies = ClinicCompany::where('clinic_id', Auth::user()->clinic->id)->get();
        //dd($companies);

        if($id != null){
            $doctor = Doctor::where('id', $id)->first();
            return view("backend.hospital.appointments.create", ['s_doctor' => $doctor, 'companies' => $companies]);
        }

        return view("backend.hospital.appointments.create", ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('company_ref')){
            $company = ClinicCompany::where('id', $request->company_id)->first();
            $company_discount = $company->discount_percent;
        }

        $appointment = new DoctorAppointment();
        $appointment->appointment_date = $request->appointment_date;
        
        $appointment->doctor_id=$request->doctor_id;
        $appointment->company_id = $request->company_id;
        $appointment->company_employee_id = $request->employee_id;
        $appointment->company_employee_position = $request->employee_position;
        $appointment->clinic_id=Auth::user()->clinic->id;
        $appointment->time_slot = $request->timeslot;
        $appointment->patient_name = $request->patient_name;
        $appointment->patient_number = $request->patient_number;
        $appointment->status = $request->status;
        $appointment->payable_amount = $request->payable_amount;
        if($request->has('company_ref')){
            $appointment->discount = ((100 - $company_discount)/100) * $request->payable_amount;
        }
        if($request->patient_id != null){
            $appointment->patient_id = $request->patient_id;
        }
        
        $appointment->save();
        $invoice_status = "Unpaid";
        $payment = new AppointmentPayment();
        if($request->paid_amount){
            $payment->appointment_id = $appointment->id;
            if($request->payable_amount != null){
                if($request->has('company_ref')){
                    $payment->payable_amount = ((100 - $company_discount)/100) * $request->payable_amount;
                }else{
                    $payment->payable_amount = $request->payable_amount;
                }
                
            }
            
            if($request->paid_amount){
                $payment->paid_amount = $request->paid_amount;
            }
            
            if($request->cashback != null){
                $payment->cashback = $request->cashback;
            }
            
            $payment->doctor_id = $request->doctor_id;
            $payment->clinic_id = Auth::user()->clinic->id;
            $payment->patient_id = $request->patient_id;
            $payment->save();
            $invoice_status = "Paid";
        }

        $invoice = new AppointmentInvoice();
        $invoice->appointment_id = $appointment->id;
        if($request->has('company_ref')){
            $invoice->invoice_amount = ((100 - $company_discount)/100) * $request->payable_amount;
        }else{
            $invoice->invoice_amount = $request->payable_amount;
        }
        
        $invoice->invoice_status = $invoice_status;
        $invoice->doctor_id = $request->doctor_id;
        $invoice->patient_id = $request->patient_id;
        $invoice->clinic_id = Auth::user()->clinic->id;
        $invoice->save();

        //dd($payment);
        if($request->paid_amount){
            $payment->invoice_number = $invoice->id;
            $payment->save();
        }
        if($appointment->patient_id == null){
            $patient = new Patient();
            $patient->name = $request->patient_name;
            $patient->phonenum = $request->patient_number;
            $patient->save();
            $appointment->patient_id = $patient->id;
            $appointment->save();
            $dp = new DoctorPatient();
            $dp->doctor_id = $request->doctor_id;
            $dp->patient_id = $patient->id;
            $dp->clinic_id = Auth::user()->clinic->id;
            $dp->save();
            if($request->paid_amount){
                $payment->patient_id = $patient->id;
                $payment->save();
            }
            
            $invoice->patient_id = $patient->id;
            $invoice->save();
        }
        
        return redirect('/account/hospital/appointments/'.$request->doctor_id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorAppointment::where('id',$id)->delete();
        return redirect()->route('appointments');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function get_patient_record(Request $request){
        $patient_number = $request->patient_number;
        //dd($patient_number);
        $patient = Patient::where('phonenum', $patient_number)->first();
        $pname = "";
        if($patient != null){
            $pname = $patient->name;
        }
        $pid = "";
        if($patient != null){
            $pid = $patient->id;
        }
        return response()->json(array('patient_name'=> $pname, 'patient_id' => $pid), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function ChangeSettings(Request $request, $id){
        $appointment = DoctorAppointment::where('id', $id)->first();
        $appointment->status = $request->status;
        $appointment->weight = $request->weight;
        $appointment->blood_pressure = $request->blood_pressure;
        $appointment->diabetes = $request->diabetes;
        $appointment->save();

        if($request->paid_amount){
            $invoice = AppointmentInvoice::where('appointment_id', $appointment->id)->first();
            $invoice->invoice_status = "Paid";
            $invoice->save();

            $payment = AppointmentPayment::where('invoice_number', $invoice->id)->first();

            if($payment == null){
                $payment = new AppointmentPayment();
                $payment->appointment_id = $appointment->id;
                $payment->doctor_id = $appointment->doctor_id;
                $payment->clinic_id = $appointment->clinic_id;
                $payment->patient_id = $appointment->patient_id;
                $payment->invoice_number = $invoice->id;
            }
            
            if($request->payable_amount != null){
                $payment->payable_amount = $request->payable_amount;
            }
            
            if($request->paid_amount != null){
                $payment->paid_amount = $request->paid_amount;
            }
            
            if($request->cashback != null){
                $payment->cashback = $request->cashback;
            }
            
            $payment->save();
        }

        return redirect('/account/hospital/appointments/'.$appointment->doctor_id);
    }

    public function invoice($id){

        if(session::get('clinic') == NULL){
            return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
        }
        $appointment = DoctorAppointment::where('id', $id)->first();
        return view("backend.doctorappointments.invoice", ['appointment' => $appointment]);
    }

    public function settings($id){
        $appointment = DoctorAppointment::where('id', $id)->first();
        $appointment_payment = AppointmentPayment::where('appointment_id', $id)->first();

        return view("backend.hospital.appointments.settings", ['appointment' => $appointment, 'appointment_payment' => $appointment_payment]);
    }
}
