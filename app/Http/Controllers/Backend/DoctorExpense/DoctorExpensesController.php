<?php

namespace App\Http\Controllers\Backend\DoctorExpense;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\DoctorExpense;
class DoctorExpensesController extends Controller
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
        $expenses = DoctorExpense::where([
                'doctor_id' => session('doctor')->id,
                'clinic_id' => session('clinic')->id,
        ])->get();

        return view("backend.doctorexpense.index", ['expenses' => $expenses]); 
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
        return view("backend.doctorexpense.create"); 
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
            'amount' => 'required',
            'category' => 'required',
        ]);

        $expense = new DoctorExpense();
        $expense->doctor_id = session('doctor')->id;
        $expense->clinic_id = session('clinic')->id;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->category = $request->category;
        $expense->save();
        return redirect()->route('expenses');
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
        $expense = DoctorExpense::where('id', $id)->first();
        return view("backend.doctorexpense.edit", ['expense' => $expense]); 
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
            'amount' => 'required',
            'category' => 'required',
        ]);

        $expense = DoctorExpense::where('id', $id)->first();
        $expense->doctor_id = session('doctor')->id;
        $expense->clinic_id = session('clinic')->id;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->category = $request->category;
        $expense->save();
        return redirect()->route('expenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorExpense::where('id',$id)->delete();
        return redirect()->route('expenses');
    }
}
