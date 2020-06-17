<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\BloodDonor;
use Auth;

class DonorController extends Controller
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
        $donors =  BloodDonor::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.donor.index", ['donors' => $donors]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.donor.create"); 
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
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'sex' => 'required',
        ]);

        $donor = new BloodDonor();
        $donor->name = $request->name;
        $donor->blood_group = $request->blood_group;
        $donor->age = $request->age;
        $donor->last_donation_date = date('Y-m-d', strtotime($request->last_donation_date));
        $donor->phone = $request->phone;
        $donor->sex = $request->sex;
        $donor->email = $request->email;
        $donor->clinic_id = Auth::user()->clinic->id;
        $donor->save();
        return redirect()->route('donors')->with(['success_msg' => 'Donor Added Successfully']);
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
        $donor = BloodDonor::where('id', $id)->first();
        return view("backend.hospital.donor.edit", ['donor' => $donor]); 
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
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'sex' => 'required',
        ]);

        $donor = BloodDonor::where('id', $id)->first();
        $donor->name = $request->name;
        $donor->blood_group = $request->blood_group;
        $donor->age = $request->age;
        $donor->last_donation_date = date('Y-m-d', strtotime($request->last_donation_date));
        $donor->phone = $request->phone;
        $donor->sex = $request->sex;
        $donor->email = $request->email;
        $donor->save();
        return redirect()->route('donors')->with(['success_msg' => 'Donor Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BloodDonor::where('id',$id)->delete();
        return redirect()->route('donors')->with(['success_msg' => 'Donor Deleted Successfully']);
    }
}
