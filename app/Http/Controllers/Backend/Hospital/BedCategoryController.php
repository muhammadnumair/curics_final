<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\BedCategory;
use Auth;

class BedCategoryController extends Controller
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
        $bed_category =  BedCategory::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.bed_category.index", ['bed_category' => $bed_category]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.bed_category.create"); 
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

        $bed_category = new BedCategory();
        $bed_category->name = $request->name;
        $bed_category->description = $request->description;
        $bed_category->clinic_id = Auth::user()->clinic->id;
        $bed_category->save();
        return redirect()->route('bed_category')->with(['success_msg' => 'Bed Category Added Successfully']);
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
        $bed_category = BedCategory::where('id', $id)->first();
        return view("backend.hospital.bed_category.edit", ['bed_category' => $bed_category]); 
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

        $bed_category = BedCategory::where('id', $id)->first();
        $bed_category->name = $request->name;
        $bed_category->description = $request->description;
        $bed_category->clinic_id = Auth::user()->clinic->id;
        $bed_category->save();
        return redirect()->route('bed_category')->with(['success_msg' => 'Bed Category Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BedCategory::where('id',$id)->delete();
        return redirect()->route('bed_category')->with(['success_msg' => 'Bed Category Deleted Successfully']);
    }
}
