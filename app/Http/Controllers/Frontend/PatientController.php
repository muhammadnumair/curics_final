<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\DoctorAppointment;
use App\AppointmentInvoice;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view("frontend.patient.dashboard");
    }

    public function logout()
    {
        return view("frontend.patient.logout");
    }

    public function appointments()
    {
        $appointments = Session::get('patient')->appointments()->orderBy('created_at', 'desc')->paginate(2);
        return view("frontend.patient.appointments", ['appointments' => $appointments]);
    }

    public function reviews()
    {
        $reviews = Session::get('patient')->reviews()->orderBy('created_at', 'desc')->paginate(2);
        
        return view("frontend.patient.reviews", ['reviews' => $reviews]);
    }

    public function settings()
    {
        return view("frontend.patient.settings");
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
    public function store(Request $request)
    {
        //
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

    public function invoice($id)
    {
        $invoice = AppointmentInvoice::where('id', $id)->first();
        return view("frontend.patient.invoice", ['invoice' => $invoice]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorAppointment::where('id', $id)->delete();
        return redirect('/patient/dashboard/appointments');
    }
}
