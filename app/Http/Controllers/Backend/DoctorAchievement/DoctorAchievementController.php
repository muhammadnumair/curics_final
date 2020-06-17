<?php

namespace App\Http\Controllers\Backend\DoctorAchievement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DoctorAchievement;
use Session; 

class DoctorAchievementController extends Controller
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
    { if(session::get('clinic') == NULL){
        
        return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
    }
        $achievements = DoctorAchievement::where([
            'doctor_id' => session('doctor')->id
        ])->get();
        return view("backend.doctorachievements.index", ['achievements' => $achievements]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session::get('clinic') == NULL){
        
            return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
        }
        return view("backend.doctorachievements.create"); 
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
            'description' => 'required',
        ]);

        $achievement = new DoctorAchievement();
        $achievement->description = $request->description;
        $achievement->doctor_id = session('doctor')->id;
        $achievement->save();
        return redirect()->route('achievements')->with(['success_msg' => 'Acheivement Created Successfully']);
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
        $achievement = DoctorAchievement::where('id', $id)->first();
        return view("backend.doctorachievements.edit", ['achievement' => $achievement]); 
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
            'description' => 'required',
        ]);

        $achievement = DoctorAchievement::where('id', $id)->first();
        $achievement->description = $request->description;
        $achievement->doctor_id = session('doctor')->id;
        $achievement->save();
        return redirect()->route('achievements')->with(['success_msg' => 'Acheivement Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorAchievement::where('id',$id)->delete();
        return redirect()->route('achievements')->with(['success_msg' => 'Acheivement Deleted Successfully']);
    }
}
