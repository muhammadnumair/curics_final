<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Clinic;
use Carbon\Carbon;
use App\AppointmentPayment;
use App\DoctorAppointment;
use App\DoctorClinic;
use App\DoctorPatient;
use App\HospitalDepartment;

class DashboardController extends Controller
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
        $clinic_id = Auth::user()->clinic->id;
        $doctors_count = DoctorClinic::where('clinic_id', $clinic_id)->get()->count();
        $appointments_count = DoctorAppointment::where('clinic_id', $clinic_id)->get()->count();
        $patients_count = DoctorPatient::where('clinic_id', $clinic_id)->get()->count();
        $departments_count = HospitalDepartment::where('clinic_id', $clinic_id)->get()->count();
        return view("backend.hospital.dashboard.index", ['doctors_count' => $doctors_count, 'appointments_count' => $appointments_count, 'patients_count' => $patients_count, 'departments_count' => $departments_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
