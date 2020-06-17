<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\ExpenseCategory;
use App\MedicineCategory;
use Auth;

class MedicineCategoryController extends Controller
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
        $categories =  MedicineCategory::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.medicine_category.index", ['categories' => $categories]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.medicine_category.create"); 
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
            'description' => 'required',
        ]);

        $medicine_category = new MedicineCategory();
        $medicine_category->name = $request->name;
        $medicine_category->description = $request->description;
        $medicine_category->clinic_id = Auth::user()->clinic->id;
        $medicine_category->save();
        return redirect()->route('medicine_category')->with(['success_msg' => 'Medicine Category Added Successfully']);
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
        $medicine_category = MedicineCategory::where('id', $id)->first();
        return view("backend.hospital.medicine_category.edit", ['medicine_category' => $medicine_category]); 
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
            'description' => 'required',
        ]);

        $medicine_category = MedicineCategory::where('id', $id)->first();
        $medicine_category->name = $request->name;
        $medicine_category->description = $request->description;
        $medicine_category->save();
        return redirect()->route('medicine_category')->with(['success_msg' => 'Medicine Category Added Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MedicineCategory::where('id',$id)->delete();
        return redirect()->route('medicine_category')->with(['success_msg' => 'Medicine Category Deleted Successfully']);
    }
}
