<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Clinic;
use App\DoctorClinic;
use App\DoctorSchedule;
use App\DoctorAppointment;
use App\City;
use App\Review;
use Auth;
use Input;
use App\Specialization;
use App\DoctorsSpecialization;
use Session;
use App\AppointmentInvoice;

class DoctorsController extends Controller
{
    public function index($city = null, $speciality = null){
        $doctors = Doctor::paginate(2);
        
        $filters = [];
        $filter = 0;
        if($city != null && $city != 'all'){
            $city = City::where('alias', $city)->first();
            $city_id = 0;
            if($city != null){
                $city_id = $city->id;
            }
            $filters = array_merge($filters, ['city_id' => $city_id]);
            $filter = 1;
        }

        $gender = request()->gender;
        if($gender != null && $gender != 'all'){
            $filters = array_merge($filters, ['gender' => $gender]);
            $filter = 1;
        }

        if($city != null && $city != 'all'){
            $filters = array_merge($filters, ['city_id' => $city->id]);
            $filter = 1;
        }

        $search = request()->search;
        //dd($search);
        if($filter == 1){
            $doctors = Doctor::where($filters)->where('name', 'like', '%' . $search . '%')->paginate(2);
            //dd($doctors);
        }else{
            if($search != null){
                $doctors = Doctor::where('name', 'like', '%' . $search . '%')->paginate(2);
            }
        }

        if($speciality != null && $speciality != 'all'){
            $specialization = Specialization::where('alias', $speciality)->first();
            
            if($specialization != null){
                //dd($specialization);
                foreach($doctors as $key => $doctor){
                    $doc_spec = DoctorsSpecialization::where(['doctor_id' => $doctor->id, 'specialization_id' => $specialization->id])->first();
                    if($doc_spec == null){
                        unset($doctors[$key]);
                    }
                }
            }
        }

        $cities = City::orderBy('name', 'asc')->get();
        $specialaties = Specialization::orderBy('name_english', 'asc')->get();
        return view("frontend.doctors.index", ['doctors' => $doctors, 'cities' => $cities, 'specialaties' => $specialaties]);
    }

    public function detail($alias){
        
        $doctor = Doctor::where('alias', $alias)->first();
        if($doctor == null){
            abort(404);
        }
        
        $title = $doctor->name;

        $reviews_count = count($doctor->reviews);
        
        //dd($doctor->clinics[0]->schedule);
        return view("frontend.doctors.detail", ['doctor' => $doctor, 'title' => $title]);
    }

    public function confirm(){
        return view("frontend.doctors.confirm");
    }

    public function booking($alias, $clinic){
        if(Auth::user()->userrole == "doctor"){
            return redirect('doctor/'.$alias.'?msg="You Have To Login As Patient To Access This Page"');
        }

        $doctor = Doctor::where('alias', $alias)->first();
        $clinic_detail = Clinic::where('alias', $clinic)->first();
        $doctor_clinic = DoctorClinic::where('clinic_id', $clinic_detail->id)->where('doctor_id', $doctor->id)->first();
        //dd($doctor_clinic);
        if($doctor == null){
            abort(404);
        }
        return view("frontend.doctors.booking", ['doctor_clinic' => $doctor_clinic, 'doctor' => $doctor, 'clinic' => $doctor_clinic]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function booking_confirm(Request $request)
    {
        $appointment = new DoctorAppointment();
        $appointment->doctor_id = $request->doctor_id;
        $appointment->clinic_id = $request->clinic_id;
        $appointment->patient_name = $request->patient_name;
        $appointment->patient_number = $request->phone_number;
        $appointment->appointment_date = $request->date;
        $appointment->time_slot = $request->time_slot;
        $appointment->patient_id = Session::get('patient')->id;
        $appointment->status = "Pending";
        $appointment->payable_amount = DoctorClinic::where(['clinic_id' => $request->clinic_id, 'doctor_id' => $request->doctor_id])->first()->doctor_fee;
        $appointment->save();

        
        $invoice = new AppointmentInvoice();
        $invoice->appointment_id = $appointment->id;
        $invoice->invoice_amount = $appointment->payable_amount;
        $invoice->invoice_status = "Unpaid";
        $invoice->patient_id = Session::get('patient')->id;
        $invoice->clinic_id = $request->clinic_id;
        $invoice->doctor_id = $request->doctor_id;
        $invoice->save();

        return redirect()->route('confirm');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gettimeslots(Request $request)
    {
        $date = $request->date;
        //dd($date);
        $schedule = DoctorSchedule::where('date', $date)->where('doctor_id', $request->doctor_id)->where('doctor_clinic_id', $request->clinic_id)->where('open', 1)->first();
        //dd($schedule);
        if($schedule == null){
            $schedule = DoctorSchedule::where('day', date('l', strtotime($date)))->where('doctor_id', $request->doctor_id)->where('doctor_clinic_id', $request->clinic_id)->where('open', 1)->first();
            //dd($request->clinic_id);
        }

        //dd($schedule->start_time);
        
        $ReturnArray = "";
        if($schedule != null){
            $StartTime    = strtotime ($schedule->start_time); //Get Timestamp
            $EndTime      = strtotime ($schedule->end_time); //Get Timestamp

            $AddMins  = 15 * 60;
            $num = 1;

            while ($StartTime <= $EndTime) //Run loop
            {
                $alreadyBooked = DoctorAppointment::where([
                    'time_slot' => date ("G:i", $StartTime),
                    'appointment_date' => $date,
                    'doctor_id' => $request->doctor_id,
                    'clinic_id' => $request->clinic_id
                ])->first();

                if($alreadyBooked == null){
                    $ReturnArray .= '<li style="display:inline"><input type="radio" id="radio'.$num.'" name="time_slot" value="'.date ("G:i", $StartTime).'"><label for="radio'.$num.'">'.date ("g:iA", $StartTime).'</label></li>';
                }else{
                    $ReturnArray .= '<li style="display:inline"><input disabled type="radio" id="radio'.$num.'" name="time_slot" value="'.date ("G:i", $StartTime).'"><label style="BACKGROUND: #EB525B !IMPORTANT; COLOR: WHITE;" for="radio'.$num.'">'.date ("g:iA", $StartTime).'</label></li>';
                }
                $StartTime += $AddMins; //Endtime check
                $num++;
            }
        }else{
            $ReturnArray = "<li>No Slots For This Date</li>";
        }
        
        return response()->json(array('slots'=> $ReturnArray), 200);
    }

    public function review($alias)
    {
        $doctor = Doctor::where('alias', $alias)->first();
        if($doctor == null){
            abort(404);
        }
        return view("frontend.doctors.review", ['doctor' => $doctor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function submit_review(Request $request, $alias)
    {
        $request->validate([
            'stars' => 'required',
            'title' => 'required',
            'review' => 'required',
            'accept' => 'required',
        ]);

        $doctor = Doctor::where('alias', $alias)->first();

        $review = new Review();
        $review->title =$request->title;
        $review->review =$request->review;
        $review->doctor_id = $doctor->id;
        $review->stars =$request->stars;
        $user = Auth::user();
        $review->patient_id = $user->patient->id;
        $review->save();
        return redirect('/doctor/'.$doctor->alias);
    }
}
