<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DoctorSchedule;
use App\Doctor;

use Auth;

class DoctorScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $schedule = DoctorSchedule::where([
            'doctor_id' => $id,
            'doctor_clinic_id' => Auth::user()->clinic->id,
        ])->get();

        $doctor = Doctor::where('id', $id)->first();
        
        return view("backend.hospital.doctor_schedule.index", ['schedule' => $schedule, 'doctor' => $doctor]); 
    }

    public function create($id)
    {
        $doctor = Doctor::where('id', $id)->first();
        return view("backend.hospital.doctor_schedule.create", ['doctor' => $doctor]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'day' => 'required',
            'per_patient_time' => 'required|numeric',
        ]);

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

        $schedule->doctor_id = $id;
        $schedule->doctor_clinic_id = Auth::user()->clinic->id;
        $schedule->save();
        return redirect('/account/hospital/doctor/schedule/'.$id);
    }

    public function edit($id)
    {
        $schedule = DoctorSchedule::where('id', $id)->first();
        return view("backend.hospital.doctor_schedule.edit", ['schedule' => $schedule]); 
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
        
        $schedule->save();
        //dd($schedule);
        return redirect('/account/hospital/doctor/schedule/'.$schedule->doctor_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = DoctorSchedule::where('id',$id)->first()->doctor_id;
        DoctorSchedule::where('id',$id)->delete();
        return redirect('/account/hospital/doctor/schedule/'.$doctor);
    }
}
