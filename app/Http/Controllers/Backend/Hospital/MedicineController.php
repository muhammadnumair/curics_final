<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\ExpenseCategory;
use App\MedicineCategory;
use App\HospitalMedicine;
use Auth;

class MedicineController extends Controller
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
        $medicines =  HospitalMedicine::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.medicine.index", ['medicines' => $medicines]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  MedicineCategory::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.medicine.create", ['categories' => $categories]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicines = new HospitalMedicine();
        $medicines->name = $request->name;
        $medicines->medicine_category_id = $request->medicine_category_id;
        $medicines->purchase_price = $request->purchase_price;
        $medicines->sale_price = $request->sale_price;
        $medicines->store_box = $request->store_box;
        $medicines->quantity = $request->quantity;
        $medicines->generic_name = $request->generic_name;
        $medicines->company = $request->company;
        $medicines->effects = $request->effects;
        $medicines->expiry_date = date('Y-m-d', strtotime($request->effects));
        $medicines->clinic_id = Auth::user()->clinic->id;
        $medicines->save();
        return redirect()->route('hospital_medicine')->with(['success_msg' => 'Medicine Added Successfully']);
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
        $categories =  MedicineCategory::where('clinic_id', Auth::user()->clinic->id)->get();
        $medicine = HospitalMedicine::where('id', $id)->first();
        return view("backend.hospital.medicine.edit", ['medicine' => $medicine, 'categories' => $categories]); 
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
        $medicines = HospitalMedicine::where('id', $id)->first();
        $medicines->name = $request->name;
        $medicines->medicine_category_id = $request->medicine_category_id;
        $medicines->purchase_price = $request->purchase_price;
        $medicines->sale_price = $request->sale_price;
        $medicines->store_box = $request->store_box;
        $medicines->quantity = $request->quantity;
        $medicines->generic_name = $request->generic_name;
        $medicines->company = $request->company;
        $medicines->effects = $request->effects;
        $medicines->expiry_date = date('Y-m-d', strtotime($request->effects));
        $medicines->clinic_id = Auth::user()->clinic->id;
        $medicines->save();
        return redirect()->route('hospital_medicine')->with(['success_msg' => 'Medicine Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HospitalMedicine::where('id',$id)->delete();
        return redirect()->route('hospital_medicine')->with(['success_msg' => 'Medicine Deleted Successfully']);
    }
}
