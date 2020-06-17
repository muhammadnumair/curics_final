<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\BedCategory;
use Auth;
use App\LabTemplate;
use App\LabReport;
use App\PaymentProcedure;
use App\HospitalPayment;
use App\HospitalPaymentItem;

class PaymentController extends Controller
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
        $payments =  HospitalPayment::where('clinic_id', Auth::user()->clinic->id)->get();
        //dd($payments);
        return view("backend.hospital.hospital_payment.index", ['payments' => $payments]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procedures =  PaymentProcedure::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.hospital_payment.create", ['procedures' => $procedures]);
    }

    public function get_procedure_detail(Request $request){
        $procedure_id = $request->procedure_id;
        
        $procedure = PaymentProcedure::where('id', $procedure_id)->first();
        return response()->json(array('procedure_name'=> $procedure->name, 'price' => $procedure->price), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //dd($request->items[0]);
        $payment = new HospitalPayment();
        $payment->patient_id = $request->patient_id;
        $payment->doctor_id = $request->doctor_id;
        $payment->clinic_id = Auth::user()->clinic->id;
        $payment->sub_total = $request->sub_total;
        $payment->discount = $request->discount;
        $payment->gross_total = $request->gross_total;
        $payment->deposited_amount = $request->deposited_amount;
        $payment->save();

        $i = 0;
        foreach($request->items as $item){
            $item1 = new HospitalPaymentItem();
            $item1->hospital_payment_id = $payment->id;
            $item1->procedure_id = $item;
            $item1->quantity = $request->quantity[$i];
            $item1->save();
            $i++;
        }
        return redirect()->route('hospital_payments')->with(['success_msg' => 'Payment Added Successfully']);
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
        $templates =  LabTemplate::where('clinic_id', Auth::user()->clinic->id)->get();
        $report = LabReport::where('id', $id)->first();
        return view("backend.hospital.lab_report.edit", ['report' => $report, 'templates' => $templates]); 
    }

    public function invoice($id)
    {
        $payment = HospitalPayment::where('id',$id)->first();
        //dd($payment);
        return view("backend.hospital.hospital_payment.invoice", ['payment' => $payment]); 
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
            'report' => 'required',
        ]);

        $report = LabReport::where('id', $id)->first();
        $report->report = $request->report;
        $report->date = date('Y-m-d', strtotime($request->date));
        $report->clinic_id = Auth::user()->clinic->id;
        $report->save();
        return redirect()->route('lab_report')->with(['success_msg' => 'Lab Report Added Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HospitalPayment::where('id',$id)->delete();
        return redirect()->route('hospital_payments')->with(['success_msg' => 'Payment Deleted Successfully']);
    }
}
