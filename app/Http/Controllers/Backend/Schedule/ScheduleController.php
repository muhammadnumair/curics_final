<?php

namespace App\Http\Controllers\Backend\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DoctorSchedule;
use Auth;
use Session;

class ScheduleController extends Controller
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
    public function index(){
        if(session::get('clinic') == NULL){
        
            return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
        }
        $schedule = DoctorSchedule::where([
            'doctor_id' => session('doctor')->id,
            'doctor_clinic_id' => session('clinic')->clinic->id,
        ])->get();
        
        return view("backend.schedule.index", ['schedule' => $schedule]); 
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
        return view("backend.schedule.create"); 
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
            'day' => 'required',
            'per_patient_time' => 'required|numeric',
        ]);

        //dd($request);
        $schedule = new DoctorSchedule();
        $schedule->day = $request->day;

        if($request->date != null){
            $schedule->date = date('Y-m-d', strtotime($request->date));
        }

        $schedule->start_time = date("H:i", strtotime($request->start_time));
        $schedule->end_time = date("H:i", strtotime($request->end_time));

        $schedule->per_patient_time = $request->per_patient_time;

        if($request->open == 1){
            $schedule->open = 1;
        }else{
            $schedule->open = 0;
        }

        $schedule->doctor_id = session('doctor')->id;
        $schedule->doctor_clinic_id = session('clinic')->clinic->id;
        $schedule->save();
        return redirect()->route('schedule');
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
        $schedule = DoctorSchedule::where('id', $id)->first();
        return view("backend.schedule.edit", ['schedule' => $schedule]); 
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
            'day' => 'required',
            'per_patient_time' => 'required|numeric',
        ]);

        //dd($request);
        $schedule = DoctorSchedule::where('id', $id)->first();
        $schedule->day = $request->day;

        if($request->date != null){
            $schedule->date = date('Y-m-d', strtotime($request->date));
        }

        $schedule->start_time = date("H:i", strtotime($request->start_time));
        $schedule->end_time = date("H:i", strtotime($request->end_time));

        $schedule->per_patient_time = $request->per_patient_time;

        if($request->open == 1){
            $schedule->open = 1;
        }else{
            $schedule->open = 0;
        }

        $schedule->doctor_id = session('doctor')->id;
        $schedule->doctor_clinic_id = session('clinic')->clinic->id;
        $schedule->save();
        return redirect()->route('schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorSchedule::where('id',$id)->delete();
        return redirect()->route('schedule');
    }
}
