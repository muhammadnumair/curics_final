<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\BloodBank;
use Auth;

class BloodBankController extends Controller
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
        $blood_bank =  BloodBank::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.blood_bank.index", ['blood_bank' => $blood_bank]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.blood_bank.create"); 
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
            'blood_group' => 'required|unique:blood_banks',
            'status' => 'required',
        ]);

        $blood_bank = new BloodBank();
        $blood_bank->blood_group = $request->blood_group;
        $blood_bank->status = $request->status;
        $blood_bank->clinic_id = Auth::user()->clinic->id;
        $blood_bank->save();
        return redirect()->route('bloodBank')->with(['success_msg' => 'Blood Bank Added Successfully']);
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
        $blood_bank = BloodBank::where('id', $id)->first();
        return view("backend.hospital.blood_bank.edit", ['blood_bank' => $blood_bank]); 
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
        //dd($request);
        $request->validate([
            'blood_group' => 'required',
            'status' => 'required',
        ]);

        $blood_bank = BloodBank::where('id', $id)->first();
        //dd($blood_bank);
        $blood_bank->blood_group = $request->blood_group;
        $blood_bank->status = $request->status;
        $blood_bank->save();
        return redirect()->route('bloodBank')->with(['success_msg' => 'Blood Bank Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BloodBank::where('id',$id)->delete();
        return redirect()->route('bloodBank')->with(['success_msg' => 'Blood Bank Deleted Successfully']);
    }
}
