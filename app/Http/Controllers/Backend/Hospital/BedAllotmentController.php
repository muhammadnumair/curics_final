<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Bed;
use App\BedAllotment;

use Auth;

class BedAllotmentController extends Controller
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
        $allotments =  BedAllotment::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.bed_allotment.index", ['allotments' => $allotments]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beds = Bed::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.bed_allotment.create", ['beds'=> $beds]);
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
        $allotment = new BedAllotment();
        $allotment->allocated_time = date('Y-m-d', strtotime($request->allocation_time));
        $allotment->discharge_time = date('Y-m-d', strtotime($request->discharge_time));
        $allotment->bed_id = $request->bed_id;
        $allotment->patient_id = $request->patient_id;
        $allotment->clinic_id = Auth::user()->clinic->id;
        $allotment->save();
        return redirect()->route('bedAllotment')->with(['success_msg' => 'Allotment Added Successfully']);
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
        $allotment = BedAllotment::where('id', $id)->first();
        $beds = Bed::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.bed_allotment.edit", ['beds' => $beds, 'allotment' => $allotment]); 
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
        $allotment = BedAllotment::where('id', $id)->first();
        $allotment->allocated_time = date('Y-m-d', strtotime($request->allocation_time));
        $allotment->discharge_time = date('Y-m-d', strtotime($request->discharge_time));
        $allotment->bed_id = $request->bed_id;
        $allotment->clinic_id = Auth::user()->clinic->id;
        $allotment->save();
        return redirect()->route('bedAllotment')->with(['success_msg' => 'Allotment Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BedAllotment::where('id',$id)->delete();
        return redirect()->route('bed')->with(['success_msg' => 'Bed Deleted Successfully']);
    }
}
