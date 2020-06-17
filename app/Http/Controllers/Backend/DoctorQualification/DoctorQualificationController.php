<?php

namespace App\Http\Controllers\Backend\DoctorQualification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DoctorQualification;
use Session; 
class DoctorQualificationController extends Controller
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
        $qualification = DoctorQualification::where([
            'doctor_id' => session('doctor')->id
        ])->get();
        return view("backend.doctorqualification.index", ['qualification' => $qualification]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session::get('clinic') == NULL){
        
            return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
        }
        return view("backend.doctorqualification.create"); 
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
            'degree' => 'required',
            'institute' => 'required',
        ]);

        $qualification = new DoctorQualification();
        $qualification->degree = $request->degree;
        $qualification->institute = $request->institute;
        $qualification->doctor_id = session('doctor')->id;
        $qualification->save();
        return redirect()->route('qualification')->with(['success_msg' => 'Qualification Added Successfully']);
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
        $qualification = DoctorQualification::where('id', $id)->first();
        return view("backend.doctorqualification.edit", ['qualification' => $qualification]); 
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
            'degree' => 'required',
            'institute' => 'required',
        ]);

        $qualification = DoctorQualification::where('id', $id)->first();
        $qualification->degree = $request->degree;
        $qualification->institute = $request->institute;
        $qualification->save();
        return redirect()->route('qualification')->with(['success_msg' => 'Qualification Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorQualification::where('id',$id)->delete();
        return redirect()->route('qualification')->with(['success_msg' => 'Qualification Deleted Successfully']);
    }
}
