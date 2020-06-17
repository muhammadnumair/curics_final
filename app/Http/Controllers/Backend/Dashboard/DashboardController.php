<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Clinic;
use Carbon\Carbon;
use App\AppointmentPayment;
use App\DoctorAppointment;

class DashboardController extends Controller
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

        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $doctor = Session::get('doctor');
        $clinic = Session::get('clinic');
        
        $today_appointments = count($clinic->clinic->appointments()->where('doctor_id', $doctor->id)->whereDate('created_at', Carbon::today())->get());
        $weekly_appointments = count($clinic->clinic->appointments()->where('doctor_id', $doctor->id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get());
        $monthly_appointments = count($clinic->clinic->appointments()->where('doctor_id', $doctor->id)->whereMonth('created_at', date('m'))->get());
        $yearly_appointments = count($clinic->clinic->appointments()->where('doctor_id', $doctor->id)->whereYear('created_at', date('Y'))->get());
        
        $data_set = array(
            "Jan"=> count($clinic->clinic->appointments()->whereMonth('created_at', 1)->get()),
            "Feb"=> count($clinic->clinic->appointments()->whereMonth('created_at', 2)->get()),
            "March"=> count($clinic->clinic->appointments()->whereMonth('created_at', 3)->get()),
            "April"=> count($clinic->clinic->appointments()->whereMonth('created_at', 4)->get()),
            "May"=> count($clinic->clinic->appointments()->whereMonth('created_at', 5)->get()),
            "June"=> count($clinic->clinic->appointments()->whereMonth('created_at', 6)->get()),
            "July"=> count($clinic->clinic->appointments()->whereMonth('created_at', 7)->get()),
            "August"=> count($clinic->clinic->appointments()->whereMonth('created_at', 8)->get()),
            "Sep"=> count($clinic->clinic->appointments()->whereMonth('created_at', 9)->get()),
            "Oct"=> count($clinic->clinic->appointments()->whereMonth('created_at', 10)->get()),
            "Nov"=> count($clinic->clinic->appointments()->whereMonth('created_at', 11)->get()),
            "Dec"=> count($clinic->clinic->appointments()->whereMonth('created_at', 12)->get()),
        );

        $today_earning = AppointmentPayment::whereDate('created_at', '=', date('Y-m-d'))->where('doctor_id', Session::get('doctor')->id)->where('clinic_id', Session::get('clinic')->clinic->id)->sum('payable_amount');
        $earnings_this_month = AppointmentPayment::whereMonth('created_at', date('m'))->where('doctor_id', Session::get('doctor')->id)->where('clinic_id', Session::get('clinic')->clinic->id)->sum('payable_amount'); 
        $earnings_this_year = AppointmentPayment::whereYear('created_at', date('Y'))->where('doctor_id', Session::get('doctor')->id)->where('clinic_id', Session::get('clinic')->clinic->id)->sum('payable_amount'); 
        
        $appointments = DoctorAppointment::where([
            'doctor_id' => session('doctor')->id,
            'clinic_id' => session('clinic')->clinic->id,
        ])->orderBy('created_at', 'DESC')->take(8)->get();

        return view("backend.doctordashboard.index", ['appointments' => $appointments, 'weekly_appointments' => $weekly_appointments,'today_appointments' => $today_appointments, 'monthly_appointments' => $monthly_appointments, 'yearly_appointments' => $yearly_appointments, 'data_set' => $data_set, 'today_earning' => $today_earning, 'earnings_this_month' => $earnings_this_month, 'earnings_this_year' => $earnings_this_year]);
    }

    public function ledger(){
        if(Auth::user()->userrole === "doctor"){
            if(session::get('clinic') == NULL){
                return redirect()->route('clinics')->with(['error' => 'Please Choose Clinic First!']);
            }
            $today_earning = AppointmentPayment::whereDate('created_at', '=', date('Y-m-d'))->where('doctor_id', Session::get('doctor')->id)->where('clinic_id', Session::get('clinic')->clinic->id)->sum('payable_amount');
            $earnings_this_month = AppointmentPayment::whereMonth('created_at', date('m'))->where('doctor_id', Session::get('doctor')->id)->where('clinic_id', Session::get('clinic')->clinic->id)->sum('payable_amount'); 
            $earnings_this_year = AppointmentPayment::whereYear('created_at', date('Y'))->where('doctor_id', Session::get('doctor')->id)->where('clinic_id', Session::get('clinic')->clinic->id)->sum('payable_amount');     
        }else{
            $today_earning = AppointmentPayment::whereDate('created_at', '=', date('Y-m-d'))->where('clinic_id', Auth::user()->clinic->id)->sum('payable_amount');
            $earnings_this_month = AppointmentPayment::whereMonth('created_at', date('m'))->where('clinic_id', Auth::user()->clinic->id)->sum('payable_amount'); 
            $earnings_this_year = AppointmentPayment::whereYear('created_at', date('Y'))->where('clinic_id', Auth::user()->clinic->id)->sum('payable_amount'); 
        }

        $from = date('Y-m-d', strtotime(request()->from));
        $to = date('Y-m-d', strtotime(request()->to));
        //dd($to);

        if(request()->from != null  && request()->to){
            if(Auth::user()->userrole === "doctor"){
                $payments = AppointmentPayment::where([
                    'doctor_id' => session('doctor')->id,
                    'clinic_id' => session('clinic')->clinic->id
                ])->whereBetween('created_at', [$from, $to])->orderby('created_at', 'DESC')->get();
            }else{
                $payments = AppointmentPayment::where([
                    'clinic_id' => Auth::user()->clinic->id
                ])->whereBetween('created_at', [$from, $to])->orderby('created_at', 'DESC')->get();
            }
        }else{
            if(Auth::user()->userrole === "doctor"){
                $payments = AppointmentPayment::where([
                    'doctor_id' => session('doctor')->id,
                    'clinic_id' => session('clinic')->clinic->id
                ])->orderby('created_at', 'DESC')->get();
            }else{
                $payments = AppointmentPayment::where([
                    'clinic_id' => Auth::user()->clinic->id
                ])->orderby('created_at', 'DESC')->get();
            }
        }

        return view("backend.doctorledger.index", ['payments' => $payments, 'today_earning' => $today_earning, 'earnings_this_month' => $earnings_this_month, 'earnings_this_year' => $earnings_this_year]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function load_notifications(Request $request)
    {
        $appointments = DoctorAppointment::where([
            'doctor_id' => session('doctor')->id,
            'clinic_id' => session('clinic')->clinic->id,
        ])->orderBy('created_at', 'DESC')->orderBy('notification_status', 'DESC')->take(8)->get();

        $notifications_count = count(DoctorAppointment::where([
            'doctor_id' => session('doctor')->id,
            'clinic_id' => session('clinic')->clinic->id,
            'notification_status' => 0,
        ])->orderBy('created_at', 'DESC')->get());

        $output = "";
        foreach($appointments as $appointment){
            $bgcolor = "#fff";
            if($appointment->notification_status == 0){
                $bgcolor = "#F2F3F4";
            }

            $output.='<a style="background: '.$bgcolor.';" onclick="changeNotificationStatus('.$appointment->id.')" href="/account/appointment/settings/'.$appointment->id.'" class="kt-notification__item"> <div class="kt-notification__item-icon"> <i class="flaticon2-line-chart kt-font-success"></i> </div> <div class="kt-notification__item-details"> <div class="kt-notification__item-title"><b>'.$appointment->patient_name.'</b> </div> <div class="kt-notification__item-time">'.date('d M Y', strtotime($appointment->created_at)) .' <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">'.date('h:i a', strtotime($appointment->time_slot)).'</span> <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">'.$appointment->status.'</span>'.' </div> </div> </a>';
        }   

        return response()->json(array('notifications'=> $output, 'count' => $notifications_count), 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change_notification_status(Request $request)
    {
        $app_id = $request->app_id;

        $appointment = DoctorAppointment::where([
            'id' => $app_id,
        ])->first();

        $appointment->notification_status = 1;
        $appointment->save();

        return response()->json(array('notifications'=> 'success'), 200);

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
