<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\BedCategory;
use Auth;
use App\LabTemplate;

class LabTemplateController extends Controller
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
        $templates =  LabTemplate::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.lab_template.index", ['templates' => $templates]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.lab_template.create"); 
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
            'template' => 'required',
        ]);

        $template = new LabTemplate();
        $template->name = $request->name;
        $template->template = $request->template;
        $template->clinic_id = Auth::user()->clinic->id;
        $template->save();
        return redirect()->route('lab_template')->with(['success_msg' => 'Lab Template Added Successfully']);
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
        $template = LabTemplate::where('id', $id)->first();
        return view("backend.hospital.lab_template.edit", ['template' => $template]); 
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
            'template' => 'required',
        ]);

        $template = LabTemplate::where('id', $id)->first();
        $template->name = $request->name;
        $template->template = $request->template;
        $template->clinic_id = Auth::user()->clinic->id;
        $template->save();
        return redirect()->route('lab_template')->with(['success_msg' => 'Lab Template Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LabTemplate::where('id',$id)->delete();
        return redirect()->route('lab_template')->with(['success_msg' => 'Lab Template Deleted Successfully']);
    }
}
