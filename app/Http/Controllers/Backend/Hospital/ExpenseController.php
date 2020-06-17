<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Expense;
use App\ExpenseCategory;
use Auth;

class ExpenseController extends Controller
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
        $expenses =  Expense::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.expense.index", ['expenses' => $expenses]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  ExpenseCategory::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.expense.create", ['categories' => $categories]); 
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
            'amount' => 'required',
            'description' => 'required',
        ]);

        $expense = new Expense();
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->category_id = $request->category_id;
        $expense->clinic_id = Auth::user()->clinic->id;
        $expense->save();
        return redirect()->route('expenses')->with(['success_msg' => 'Expense Added Successfully']);
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
        $categories =  ExpenseCategory::where('clinic_id', Auth::user()->clinic->id)->get();
        $expense = Expense::where('id', $id)->first();
        return view("backend.hospital.expense.edit", ['expense' => $expense, 'categories' => $categories]); 
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
            'amount' => 'required',
            'description' => 'required',
        ]);

        $expense = Expense::where('id', $id)->first();
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->category_id = $request->category_id;
        $expense->clinic_id = Auth::user()->clinic->id;
        $expense->save();
        return redirect()->route('expenses')->with(['success_msg' => 'Expense Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::where('id',$id)->delete();
        return redirect()->route('expenses')->with(['success_msg' => 'Expense Deleted Successfully']);
    }
}
