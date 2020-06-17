<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HospitalDepartment;
use Auth;

class DepartmentController extends Controller
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
        $departments = HospitalDepartment::where('clinic_id', $clinic_id)->get();
        //dd($departments);
        return view("backend.hospital.departments.index", ['departments' => $departments, 'title' => "Departments"]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.departments.create"); 
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
            'department_name' => 'required',
            'department_description' => 'required',
        ]);

        $department = new HospitalDepartment();
        $department->department_name = $request->department_name;
        $department->department_description = $request->department_description;
        $department->clinic_id = Auth::user()->clinic->id;
        $department->save();
        return redirect()->route('hospital_departments')->with(['success' => 'Department Created Successfully']);
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
        $department = HospitalDepartment::where('id', $id)->first();
        return view("backend.hospital.departments.edit", ['department' => $department]); 
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
            'department_name' => 'required',
            'department_description' => 'required',
        ]);

        $department = HospitalDepartment::where('id', $id)->first();
        $department->department_name = $request->department_name;
        $department->department_description = $request->department_description;
        $department->save();
        return redirect()->route('hospital_departments')->with(['success' => 'Department Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HospitalDepartment::where('id',$id)->delete();
        return redirect()->route('hospital_departments')->with(['success' => 'Department Deleted Successfully']);
    }
}
