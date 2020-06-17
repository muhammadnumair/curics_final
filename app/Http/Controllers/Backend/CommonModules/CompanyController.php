<?php

namespace App\Http\Controllers\Backend\CommonModules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\ClinicCompany;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $companies = ClinicCompany::where([
            'clinic_id' => Auth::user()->clinic->id,
        ])->get();
        return view("backend.common_modules.companies.index", ['companies' => $companies]);
    }

    public function create()
    {
        return view("backend.common_modules.companies.create"); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'discount_percent' => 'required'
        ]);

        //dd($request);
        
        $company = new ClinicCompany(); 
        
        $company->company_name = $request->company_name;
        $company->api_url = $request->api_url;
        $company->discount_percent = $request->discount_percent;
        $company->clinic_id = Auth::user()->clinic->id;
        $company->save();

        return redirect()->route('companies')->with(['success_msg' => 'Company Created Successfully']);
    }

    public function edit($id)
    {
        $company = ClinicCompany::where('id', $id)->first();
        return view("backend.common_modules.companies.edit", ['company' => $company]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'discount_percent' => 'required'
        ]);

        $company = ClinicCompany::where('id', $id)->first();
        $company->company_name = $request->company_name;
        $company->api_url = $request->api_url;
        $company->discount_percent = $request->discount_percent;
        $company->save();

        return redirect()->route('companies')->with(['success_msg' => 'Company Updated Successfully']);
    }

    public function destroy($id)
    {
        ClinicCompany::where('id',$id)->delete();
        return redirect()->route('companies')->with(['success' => 'Company Created Successfully']);
    }
}
