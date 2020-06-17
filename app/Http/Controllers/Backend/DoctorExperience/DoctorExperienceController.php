<?php

namespace App\Http\Controllers\Backend\DoctorExperience;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DoctorExperience;
use Session;

class DoctorExperienceController extends Controller
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
        $experience = DoctorExperience::where([
            'doctor_id' => session('doctor')->id
        ])->get();
        return view("backend.doctorexperience.index", ['experience' => $experience]); 
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
        return view("backend.doctorexperience.create"); 
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
            'field' => 'required',
            'institute' => 'required',
        ]);

        $experience = new DoctorExperience();
        $experience->field = $request->field;
        $experience->institute = $request->institute;
        $experience->doctor_id = session('doctor')->id;
        $experience->save();
        return redirect()->route('experience')->with(['success_msg' => 'Experience Added Successfully']);
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
        $experience = DoctorExperience::where('id', $id)->first();
        return view("backend.doctorexperience.edit", ['experience' => $experience]); 
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
            'field' => 'required',
            'institute' => 'required',
        ]);

        $experience = DoctorExperience::where('id', $id)->first();
        $experience->field = $request->field;
        $experience->institute = $request->institute;
        $experience->doctor_id = session('doctor')->id;
        $experience->save();
        return redirect()->route('experience')->with(['success_msg' => 'Experience Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorExperience::where('id',$id)->delete();
        return redirect()->route('experience')->with(['success_msg' => 'Experience Deleted Successfully']);
    }
}
