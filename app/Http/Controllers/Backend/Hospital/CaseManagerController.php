<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\BedCategory;
use Auth;
use App\LabTemplate;
use App\LabReport;
use App\PatientCaseManager;

class CaseManagerController extends Controller
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
        $cases =  PatientCaseManager::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.case_manager.index", ['cases' => $cases]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.case_manager.create");
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
        $request->validate([
            'title' => 'required',
            'case_description' => 'required',
        ]);

        $case = new PatientCaseManager();
        $case->case_description = $request->case_description;
        $case->date = date('Y-m-d', strtotime($request->date));
        $case->title = $request->title;
        $case->clinic_id = Auth::user()->clinic->id;
        $case->patient_id = $request->patient_id;
        $case->save();
        return redirect()->route('case_manager')->with(['success_msg' => 'Case Added Successfully']);
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
        $case =  PatientCaseManager::where('id', $id)->first();
        return view("backend.hospital.case_manager.edit", ['case' => $case]); 
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
            'title' => 'required',
            'case_description' => 'required',
        ]);

        $case = PatientCaseManager::where('id', $id)->first();
        $case->case_description = $request->case_description;
        $case->date = date('Y-m-d', strtotime($request->date));
        $case->title = $request->title;
        $case->save();
        return redirect()->route('case_manager')->with(['success_msg' => 'Case Added Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PatientCaseManager::where('id',$id)->delete();
        return redirect()->route('case_manager')->with(['success_msg' => 'Case Deleted Successfully']);
    }
}
