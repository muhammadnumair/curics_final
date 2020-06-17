<?php

namespace App\Http\Controllers\Backend\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\ExpenseCategory;
use Auth;

class ExpenseCategoryController extends Controller
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
        $expense_category =  ExpenseCategory::where('clinic_id', Auth::user()->clinic->id)->get();
        return view("backend.hospital.expense_category.index", ['expense_category' => $expense_category]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.hospital.expense_category.create"); 
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
            'category' => 'required',
            'description' => 'required',
        ]);

        $expense_category = new ExpenseCategory();
        $expense_category->category = $request->category;
        $expense_category->description = $request->description;
        $expense_category->clinic_id = Auth::user()->clinic->id;
        $expense_category->save();
        return redirect()->route('expense_category')->with(['success_msg' => 'Expense Category Added Successfully']);
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
        $expense_category = ExpenseCategory::where('id', $id)->first();
        return view("backend.hospital.expense_category.edit", ['expense_category' => $expense_category]); 
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
            'category' => 'required',
            'description' => 'required',
        ]);

        $expense_category = ExpenseCategory::where('id', $id)->first();
        $expense_category->category = $request->category;
        $expense_category->description = $request->description;
        $expense_category->save();
        return redirect()->route('expense_category')->with(['success_msg' => 'Expense Category Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExpenseCategory::where('id',$id)->delete();
        return redirect()->route('expense_category')->with(['success_msg' => 'Expense Category Deleted Successfully']);
    }
}
