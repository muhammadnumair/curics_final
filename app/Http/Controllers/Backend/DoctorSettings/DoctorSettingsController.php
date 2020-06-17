<?php

namespace App\Http\Controllers\Backend\DoctorSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Doctor;
use App\DoctorClinic;
use App\City;
use App\Specialization;
use App\DoctorsSpecialization;
use Auth;

class DoctorSettingsController extends Controller
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

        $cities = City::all();
        $doctor = Doctor::where('id', Session::get('doctor')->id)->first();
        $clinic = DoctorClinic::where('id', Session::get('clinic')->id)->first();
        $specializations = Specialization::all();

        return view("backend.doctorsettings.settings", ['doctor' => $doctor, 'clinic' => $clinic, 'cities' => $cities, 'specializations' => $specializations]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function general_settings(Request $request)
    {
        //dd($request);
        $settings = Doctor::where('id', Session::get('doctor')->id)->first();
        //dd($settings);
        $settings->name = $request->name;
        $settings->about = $request->about;
        if($request->has('online_presense')){
            $settings->online_presense = $request->online_presense;
        }else{
            $settings->online_presense = 1;
        }
        $settings->experience_years = $request->experience_years;
        $settings->designation = $request->designation;
        $settings->city_id = $request->city;
        $settings->gender = $request->gender;
        $settings->doctor_address = $request->doctor_address;
        $settings->doctor_address_latitude = $request->doctor_address_latitude;
        $settings->doctor_address_longitude = $request->doctor_address_longitude;
        $settings->save();
        $user = Auth::user();
        if($request->has('profile_picture')){
            $filePath = $request->profile_picture->store('profiles', 'public');
            $user->profile_picture = $filePath;
            Auth::user()->profile_picture = $filePath;
        }
        $user->save();
        return redirect()->route('settings');
    }

    public function clinic_settings(Request $request)
    {
        //dd($request);
        //dd($request);
        $clinic = DoctorClinic::where('id', Session::get('clinic')->id)->first();
        //dd($settings);
        $clinic->doctor_fee = $request->doctor_fee;
        
        if($request->has('clinic_active')){
            $clinic->clinic_active = $request->clinic_active;
        }else{
            $clinic->clinic_active = 0;
        }

        $clinic->save();
        return redirect()->route('settings');
    }

    public function add_specialization(Request $request)
    {
        $doctor_specialization = DoctorsSpecialization::firstOrNew(
            ['specialization_id' => $request->specialization, 'doctor_id' => Session::get('doctor')->id]
        );
        if ($doctor_specialization->exists) {
            echo "already";
        } else {
            $doctor_specialization->save();
            echo $doctor_specialization->specialization->name_english;
        }
    }

    public function remove_specialization(Request $request)
    {
        $doctor_specialization = DoctorsSpecialization::where(['specialization_id' => $request->specialization, 'doctor_id' => Session::get('doctor')->id])->delete();
        echo "success";
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
