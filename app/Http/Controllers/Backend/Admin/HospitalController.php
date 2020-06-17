<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clinic;
use App\User;
use App\Package;

use Hash;

class HospitalController extends Controller
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
        $hospitals = Clinic::orderBy('id', 'DESC')->get();
        return view("backend.admin.hospitals.index", ['hospitals' => $hospitals]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::all();
        return view("backend.admin.hospitals.create", ['packages' => $packages]); 
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->userrole = "hospital";
        $user->mobile = $request->phone;
        $user->save();

        $clinic = new Clinic();
        $clinic->package_id = $request->package_id;
        $clinic->name = $request->name;
        $clinic->phone = $request->phone;
        $clinic->email = $request->email;
        $clinic->address = $request->address;
        $clinic->user_id = $user->id;
        if ($request->has('status')) {
            $clinic->status = $request->status;
        }else{
            $clinic->status = 0;
        }
        $clinic->alias = str_replace(' ', '-', strtolower($request->name));
        $clinic->save();
        return redirect()->route('admin_hospitals')->with(['success' => 'Hospital Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status($id)
    {
        $hospital = Clinic::where('id', $id)->first();
        if($hospital->status == 0){
            $hospital->status = 1;
        }else{
            $hospital->status = 0;
        }
        //dd($hospital);
        $hospital->save();
        return redirect()->route('admin_hospitals');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Clinic::where('id', $id)->first();
        $packages = Package::all();
        return view("backend.admin.hospitals.edit", ['hospital' => $hospital, 'packages' => $packages]); 
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
            'email' => 'required',
            'password' => 'required',
        ]);

        $clinic = Clinic::where('id', $id)->first();
        $clinic->name = $request->name;
        $clinic->phone = $request->phone;
        $clinic->email = $request->email;
        $clinic->address = $request->address;
        $clinic->package_id = $request->package_id;
        if ($request->has('status')) {
            $clinic->status = $request->status;
        }else{
            $clinic->status = 0;
        }
        $clinic->alias = str_replace(' ', '-', strtolower($request->name));
        $clinic->save();

        $user = User::where('id', $clinic->user_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->password = Hash::make($request->password);
        $user->mobile = $request->phone;
        $user->save();

        return redirect()->route('admin_hospitals')->with(['success' => 'Hospital Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Clinic::where('id',$id)->first();
        User::where('id', $hospital->user_id)->delete();
        Clinic::where('id',$id)->delete();
        return redirect()->route('admin_hospitals')->with(['success' => 'Hospital Deleted Successfully']);
    }
}
