<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\PaymentProcedure;
use Auth;

class PaymentProcedureController extends Controller
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
        $payment_procedure =  PaymentProcedure::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.payment_procedure.index", ['payment_procedure' => $payment_procedure]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.payment_procedure.create"); 
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
            'description' => 'required',
            'price' => 'required',
        ]);

        $payment_procedure = new PaymentProcedure();
        $payment_procedure->name = $request->name;
        $payment_procedure->description = $request->description;
        $payment_procedure->price = $request->price;
        $payment_procedure->comission_rate = $request->comission_rate;
        $payment_procedure->clinic_id = Auth::user()->clinic->id;
        $payment_procedure->save();
        return redirect()->route('payment_procedure')->with(['success_msg' => 'Payment Category Added Successfully']);
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
        $payment_procedure = PaymentProcedure::where('id', $id)->first();
        return view("backend.hospital.payment_procedure.edit", ['payment_procedure' => $payment_procedure]); 
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
            'description' => 'required',
            'price' => 'required',
        ]);

        $payment_procedure = PaymentProcedure::where('id', $id)->first();
        $payment_procedure->name = $request->name;
        $payment_procedure->description = $request->description;
        $payment_procedure->price = $request->price;
        $payment_procedure->comission_rate = $request->comission_rate;
        $payment_procedure->clinic_id = Auth::user()->clinic->id;
        $payment_procedure->save();
        return redirect()->route('payment_procedure')->with(['success_msg' => 'Payment Category Added Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentProcedure::where('id',$id)->delete();
        return redirect()->route('payment_procedure')->with(['success_msg' => 'Payment Category Deleted Successfully']);
    }
}
