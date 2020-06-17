<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Bed;
use App\BedCategory;

use Auth;

class BedController extends Controller
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
        $beds =  Bed::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.bed.index", ['beds' => $beds]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BedCategory::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.bed.create", ['categories'=> $categories]); 
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
            'bed_number' => 'required',
            'description' => 'required',
        ]);

        $bed = new Bed();
        $bed->bed_number = $request->bed_number;
        $bed->description = $request->description;
        $bed->category_id = $request->category_id;
        $bed->clinic_id = Auth::user()->clinic->id;
        $bed->save();
        return redirect()->route('bed')->with(['success_msg' => 'Bed Added Successfully']);
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
        $bed = Bed::where('id', $id)->first();
        $categories = BedCategory::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.bed.edit", ['bed' => $bed, 'categories' => $categories]); 
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
            'bed_number' => 'required',
            'description' => 'required',
        ]);

        $bed = Bed::where('id', $id)->first();
        $bed->bed_number = $request->bed_number;
        $bed->description = $request->description;
        $bed->clinic_id = Auth::user()->clinic->id;
        $bed->save();
        return redirect()->route('bed')->with(['success_msg' => 'Bed Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bed::where('id',$id)->delete();
        return redirect()->route('bed')->with(['success_msg' => 'Bed Deleted Successfully']);
    }
}
