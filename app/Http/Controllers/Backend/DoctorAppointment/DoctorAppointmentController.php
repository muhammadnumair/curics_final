<?php

namespace App\Http\Controllers\Backend\DoctorAppointment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DoctorAppointment;
use App\DoctorSchedule;
use Session;
use App\Patient;
use App\AppointmentPayment;
use App\AppointmentInvoice;
use App\DoctorPrescription;
use Auth;
use App\DoctorPatient;

class DoctorAppointmentController extends Controller
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
    public function index()
    {
        if(session::get('clinic') == NULL){
        
            return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
        }

        $filter = request()->filter;

        if($filter == "previous"){
            $appointment = DoctorAppointment::where([
                'doctor_id' => session('doctor')->id,
                'clinic_id' => session('clinic')->clinic->id,
            ])->where('appointment_date', '<', date("m/d/Y"))->orderBy('created_at', 'DESC')->get();
        }else if($filter == "all"){
            $appointment = DoctorAppointment::where([
                'doctor_id' => session('doctor')->id,
                'clinic_id' => session('clinic')->clinic->id,
            ])->orderBy('created_at', 'DESC')->get();
        }else{
            $appointment = DoctorAppointment::where([
                'doctor_id' => session('doctor')->id,
                'clinic_id' => session('clinic')->clinic->id,
            ])->where('appointment_date', '>=', date("m/d/Y"))->orderBy('created_at', 'DESC')->get();
        }
        
        return view("backend.doctorappointments.index", ['appointment' => $appointment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        if(session::get('clinic') == NULL){
        
            return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
        }
        return view("backend.doctorappointments.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->cashback);
        $appointment = new DoctorAppointment();
        $appointment->appointment_date = $request->appointment_date;
        
        $appointment->doctor_id=session('doctor')->id;
        $appointment->clinic_id=session('clinic')->clinic->id;
        $appointment->time_slot = $request->timeslot;
        $appointment->patient_name = $request->patient_name;
        $appointment->patient_number = $request->patient_number;
        $appointment->status = $request->status;
        $appointment->payable_amount = $request->payable_amount;
        if($request->patient_id != null){
            $appointment->patient_id = $request->patient_id;
        }
        
        $appointment->save();
        $invoice_status = "Unpaid";

        $payment = new AppointmentPayment();
        if($request->paid_amount){
            $payment->appointment_id = $appointment->id;
            if($request->payable_amount != null){
                $payment->payable_amount = $request->payable_amount;
            }
            
            if($request->paid_amount){
                $payment->paid_amount = $request->paid_amount;
            }
            
            if($request->cashback != null){
                $payment->cashback = $request->cashback;
            }
            
            $payment->doctor_id = session('doctor')->id;
            $payment->clinic_id = session('clinic')->clinic->id;
            $payment->patient_id = $request->patient_id;
            $payment->save();
            $invoice_status = "Paid";
        }

        $invoice = new AppointmentInvoice();
        $invoice->appointment_id = $appointment->id;
        $invoice->invoice_amount = $request->payable_amount;
        $invoice->invoice_status = $invoice_status;
        $invoice->doctor_id = session('doctor')->id;
        $invoice->patient_id = $request->patient_id;
        $invoice->clinic_id = session('clinic')->clinic->id;
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
            $dp->doctor_id = session('doctor')->id;
            $dp->patient_id = $patient->id;
            $dp->clinic_id = session('clinic')->clinic->id;
            $dp->save();
            if($request->paid_amount){
                $payment->patient_id = $patient->id;
                $payment->save();
            }
            
            $invoice->patient_id = $patient->id;
            $invoice->save();
        }

        return redirect()->route('appointments')->with(['success' => 'Appointment Booked Successfully']);;
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
    public function gettimeslots(Request $request)
    {
        $date = $request->date;
        $doctor_id = $request->doctor_id;
        $clinic_id = $request->clinic_id;
        $schedule = DoctorSchedule::where('date', date('Y-m-d', strtotime($date)))->where('doctor_id', $doctor_id)->where('doctor_clinic_id', $clinic_id)->first();
        //dd($schedule);
        if($schedule == null){
            $schedule = DoctorSchedule::where('day', date('l', strtotime($date)))->where('doctor_id', $doctor_id)->where('doctor_clinic_id', $clinic_id)->where('open', 1)->first();
        }

        
        $ReturnArray = "";
        //dd($clinic_id);

        //dd($date);
        if($date < date('m/d/Y')){
            $ReturnArray .= "<p style='color:red; margin-left: 8px;'><b>Please Select Correct Date</b></p>";
        }else if($schedule == null){
            $ReturnArray .= "<p style='color:red; margin-left: 8px;'><b>Doctor do not sit on this day</b></p>";
        }else if($schedule->open == 0){
            $ReturnArray .= "<p style='color:red; margin-left: 8px;'><b>Clinic is off for today</b></p>";
        }else{
            $StartTime    = strtotime ($schedule->start_time); //Get Timestamp
            $EndTime      = strtotime ($schedule->end_time); //Get Timestamp
    
            $AddMins  = 15 * 60;
            $num = 1;
    
            while ($StartTime <= $EndTime) //Run loop
            {
                $alreadyBooked = DoctorAppointment::where([
                    'time_slot' => date ("G:i:s", $StartTime ),
                    'appointment_date' => date('m/d/Y', strtotime($date)),
                    'doctor_id' => $doctor_id,
                    'clinic_id' =>  $clinic_id
                ])->first();
                //dd($alreadyBooked);
    
                if($alreadyBooked == null){
                    $ReturnArray .= '<input class="hidden radio-label" type="radio" value="'.date ("G:i", $StartTime).'" name="timeslot" id="yes-button-'.$num.'" class="yes-button"/> <label class="button-label yes-button" for="yes-button-'.$num.'"> <h1>'.date ("g:i a", $StartTime).'</h1> </label>';
                }else{
                    $ReturnArray .= '<input class="hidden radio-label" disabled type="radio" value="'.date ("G:i", $StartTime).'" name="timeslot" id="no-button-'.$num.'" class="no-button"/> <label class="button-label no-button" for="no-button-'.$num.'" style="pointer-events: none;"> <h1>'.date ("g:i a", $StartTime).'</h1> </label>';
                }
                $StartTime += $AddMins; //Endtime check
                $num++;
            }
        }
        
        return response()->json(array('slots'=> $ReturnArray), 200);
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

        if(Auth::user()->userrole == "hospital"){
            return redirect('/account/hospital/appointments/'.$appointment->doctor_id);
        }

        return redirect()->route('appointments')->with(['success_msg' => 'Settings Changed Successfully']);
    }

    public function invoice($id){

        if(Auth::user()->userole === "doctor"){
            if(session::get('clinic') == NULL){
                return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
            }
        }
        
        $invoice = AppointmentInvoice::where('id', $id)->first();
        
        return view("backend.doctorappointments.invoice", ['invoice' => $invoice]);
    }

    public function settings($id){

        //dd(Auth::user()->userrole);
        if(Auth::user()->userrole === "doctor"){
            if(session::get('clinic') == NULL){
                return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
            }
        }
        
        $appointment = DoctorAppointment::where('id', $id)->first();
        $appointment_payment = AppointmentPayment::where('appointment_id', $id)->first();
        return view("backend.doctorappointments.settings", ['appointment' => $appointment, 'appointment_payment' => $appointment_payment]);
    }
}
