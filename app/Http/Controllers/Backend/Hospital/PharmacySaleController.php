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
use App\HospitalMedicine;
use App\PharmacySale;
use App\PharmacySaleMedicine;

class PharmacySaleController extends Controller
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
        return view("backend.hospital.hospital_payment.index", ['payments' => $payments]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines =  HospitalMedicine::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.pharmacy_sale.create", ['medicines' => $medicines]);
    }

    public function sales()
    {
        $sales =  PharmacySale::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.pharmacy_sale.index", ['sales' => $sales]);
    }

    public function get_medicine_detail(Request $request){
        $medicine_id = $request->medicine_id;
        
        $medicine = HospitalMedicine::where('id', $medicine_id)->first();
        return response()->json(array('company'=> $medicine->company,'quantity'=> $medicine->quantity,'medicine_name'=> $medicine->name, 'sale_price' => $medicine->sale_price), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new PharmacySale();
        $sale->clinic_id = Auth::user()->clinic->id;
        $sale->sub_total = $request->sub_total;
        $sale->discount = $request->discount;
        $sale->gross_total = $request->gross_total;
        $sale->save();

        $i = 0;
        foreach($request->items as $item){
            $medicine = new PharmacySaleMedicine();
            $medicine->pharmacy_sale_id = $sale->id;
            $medicine->medicine_id = $item;
            $medicine->quantity = $request->quantity[$i];
            $medicine->save();
            $i++;
        }
        return redirect()->route('pharmacy_sales')->with(['success_msg' => 'Sale Generated Successfully']);
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
        $sale = PharmacySale::where('id', $id)->first();
        return view("backend.hospital.pharmacy_sale.invoice", ['sale' => $sale]); 
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
