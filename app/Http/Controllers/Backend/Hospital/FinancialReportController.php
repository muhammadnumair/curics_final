<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Clinic;
use Carbon\Carbon;
use App\AppointmentPayment;
use App\DoctorAppointment;
use App\DoctorClinic;
use App\DoctorPatient;
use App\HospitalDepartment;
use App\HospitalPayment;
use App\Expense;
use App\ExpenseCategory;

class FinancialReportController extends Controller
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
        $sub_total = HospitalPayment::where('clinic_id', $clinic_id)->get()->sum("sub_total");
        $expenses = Expense::where('clinic_id', $clinic_id)->get()->sum("amount");
        $discount = HospitalPayment::where('clinic_id', $clinic_id)->get()->sum("discount");
        $gross_amount = HospitalPayment::where('clinic_id', $clinic_id)->get()->sum("gross_total");
        $deposited_amount = HospitalPayment::where('clinic_id', $clinic_id)->get()->sum("deposited_amount");
        
        $total_commission_earned = 0;
        foreach(Auth::user()->clinic->doctors as $doctor){
            $commission_rate = $doctor->clinic_comission;
            $appointments = DoctorAppointment::where([
                'doctor_id' => $doctor->doctor_id,
                'clinic_id' => Auth::user()->clinic->id,
            ])->get()->sum('payable_amount');
            $total_commission_earned += ($commission_rate/100)*$appointments;
        }

        $from = date('Y-m-d', strtotime(request()->from));
        $to = date('Y-m-d', strtotime(request()->to));
        $total_hospital_amount = null;
        $total_discount = null;
        $gross_income = null;
        $total_earnings = 0;
        $clinic_commision = 0;
        if(request()->from != null  && request()->to != null){
            $total_hospital_amount = HospitalPayment::where('clinic_id', $clinic_id)->whereBetween('created_at', [$from, $to])->orderby('created_at', 'DESC')->get()->sum("sub_total");
            $total_discount = HospitalPayment::where('clinic_id', $clinic_id)->whereBetween('created_at', [$from, $to])->orderby('created_at', 'DESC')->get()->sum("discount");
            $gross_income = HospitalPayment::where('clinic_id', $clinic_id)->whereBetween('created_at', [$from, $to])->orderby('created_at', 'DESC')->get()->sum("gross_total");
            
            foreach(Auth::user()->clinic->doctors as $doctor){
                $commission_rate = $doctor->clinic_comission;
                $appointments = DoctorAppointment::where([
                    'doctor_id' => $doctor->doctor_id,
                    'clinic_id' => Auth::user()->clinic->id,
                ])->whereBetween('created_at', [$from, $to])->orderby('created_at', 'DESC')->get()->sum('payable_amount');
                $clinic_commision += ($commission_rate/100)*$appointments;
            }
            $total_earnings = $clinic_commision + $gross_income;
        }
        $exp_categroies = ExpenseCategory::where('clinic_id', $clinic_id)->get();
        //dd($exp_categroies[0]->expenses->sum('amount'));

        return view("backend.hospital.financial_report.index", ['exp_categroies' => $exp_categroies, 'total_earnings' => $total_earnings, 'clinic_commision' => $clinic_commision, 'gross_income' => $gross_income, 'total_discount' => $total_discount, 'total_hospital_amount' => $total_hospital_amount, 'total_commission_earned' => $total_commission_earned, 'expenses' => $expenses, 'sub_total' => $sub_total, 'discount' => $discount, 'gross_amount' => $gross_amount, 'deposited_amount' => $deposited_amount]);
    }

    
    public function commission()
    {
        return view("backend.hospital.financial_report.commission");
    }

    public function commission_details($id = null){
        $appointments = DoctorAppointment::where([
            'clinic_id' => Auth::user()->clinic->id,
            'doctor_id' => $id,
        ])->orderBy('created_at', 'DESC')->get();
        
        //dd($appointments);

        $doctor = DoctorClinic::where([
            'clinic_id' => Auth::user()->clinic->id,
            'doctor_id' => $id,
        ])->first();

        return view("backend.hospital.financial_report.commission_details", ['appointments' => $appointments, 'doctor' => $doctor]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
