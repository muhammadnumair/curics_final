<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\BedCategory;
use Auth;
use App\LabTemplate;
use App\LabReport;

class LabReportController extends Controller
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
        $reports =  LabReport::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.lab_report.index", ['reports' => $reports]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates =  LabTemplate::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.lab_report.create", ['templates' => $templates]);
    }

    public function get_template_content(Request $request){
        $template_id = $request->template_id;
        
        $template = LabTemplate::where('id', $template_id)->first();
        return response()->json(array('template'=> $template->template), 200);
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
            'report' => 'required',
        ]);

        $report = new LabReport();
        $report->report = $request->report;
        $report->date = date('Y-m-d', strtotime($request->date));
        $report->patient_id = $request->patient_id;
        $report->clinic_id = Auth::user()->clinic->id;
        $report->save();
        return redirect()->route('lab_report')->with(['success_msg' => 'Lab Report Added Successfully']);
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
        $report = LabReport::where('id', $id)->first();
        return view("backend.hospital.lab_report.invoice", ['report' => $report]); 
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
        LabReport::where('id',$id)->delete();
        return redirect()->route('lab_report')->with(['success_msg' => 'Lab Report Deleted Successfully']);
    }
}
