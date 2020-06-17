<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\BedCategory;
use Auth;
use App\LabTemplate;
use App\LabReport;
use App\HospitalReport;

class HospitalReportController extends Controller
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
    public function birth()
    {
        $reports =  HospitalReport::where([
            'clinic_id' => Auth::user()->clinic->id,
            'type' => 'birth',
        ])->get();
        return view("backend.hospital.hospital_report.index", ['reports' => $reports, 'Type' => 'Birth']); 
    }

    public function expire()
    {
        $reports =  HospitalReport::where([
            'clinic_id' => Auth::user()->clinic->id,
            'type' => 'expire',
        ])->get();
        return view("backend.hospital.hospital_report.index", ['reports' => $reports, 'Type' => 'Expire']); 
    }

    public function operation()
    {
        $reports =  HospitalReport::where([
            'clinic_id' => Auth::user()->clinic->id,
            'type' => 'operation',
        ])->get();
        return view("backend.hospital.hospital_report.index", ['reports' => $reports, 'Type' => 'Operation']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.hospital_report.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new HospitalReport();
        $report->type = $request->type;
        $report->description = $request->description;
        $report->date = date('Y-m-d', strtotime($request->date));
        $report->patient_id = $request->patient_id;
        $report->doctor_id = $request->doctor_id;
        $report->clinic_id = Auth::user()->clinic->id;
        $report->save();
        if($request->type == "Birth"){
            return redirect()->route('birth_report')->with(['success_msg' => 'Report Added Successfully']);
        }else if($request->type == "Operation"){
            return redirect()->route('operation_report')->with(['success_msg' => 'Report Added Successfully']);
        }else if($request->type == "Expire"){
            return redirect()->route('expire_report')->with(['success_msg' => 'Report Added Successfully']);
        }
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
        $report = HospitalReport::where('id', $id)->first();
        return view("backend.hospital.hospital_report.edit", ['report' => $report]); 
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
        $report = HospitalReport::where('id', $id)->first();
        $report->type = $request->type;
        $report->description = $request->description;
        $report->date = date('Y-m-d', strtotime($request->date));
        $report->doctor_id = $request->doctor_id;
        $report->save();
        if($request->type == "Birth"){
            return redirect()->route('birth_report')->with(['success_msg' => 'Report Updated Successfully']);
        }else if($request->type == "Operation"){
            return redirect()->route('operation_report')->with(['success_msg' => 'Report Updated Successfully']);
        }else if($request->type == "Expire"){
            return redirect()->route('expire_report')->with(['success_msg' => 'Report Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = HospitalReport::where('id',$id)->first();
        HospitalReport::where('id',$id)->delete();
        if($report->type == "Birth"){
            return redirect()->route('birth_report')->with(['success_msg' => 'Report Updated Successfully']);
        }else if($report->type == "Operation"){
            return redirect()->route('operation_report')->with(['success_msg' => 'Report Updated Successfully']);
        }else if($report->type == "Expire"){
            return redirect()->route('expire_report')->with(['success_msg' => 'Report Updated Successfully']);
        }
    }
}
