<?php

namespace App\Http\Controllers\Backend\DoctorPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\DoctorAppointment;
use App\DoctorPrescription;
use App\DiagnosisTest;
use App\Medicine;
use App\PrescriptionTest;
use App\PrescriptionMedicine;

class DoctorPrescriptionController extends Controller
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
    public function index($id = null)
    {
        $appointment = DoctorAppointment::where('id', $id)->first();
        //dd($appointment->Prescription->medicines);
        return view('backend.doctorprescription.index', ['appointment' => $appointment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $appointment = DoctorAppointment::where('id', $id)->first();
        return view('backend.doctorprescription.create', ['appointment' => $appointment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        //dd($request);
        $prescription = new DoctorPrescription();
        $prescription->name = $request->name;
        $prescription->gender = $request->gender;
        $prescription->mobile = $request->mobile;
        $prescription->birthday = $request->birthday;
        $prescription->age = $request->age;
        $prescription->height = $request->height;
        $prescription->weight = $request->weight;
        $prescription->blood_pressure = $request->blood_pressure;
        $prescription->diabetes = $request->diabetes;
        $prescription->symptoms = $request->symptoms;
        $prescription->appointment_id = $id;
        $prescription->doctor_id = $request->doctor_id;
        $prescription->clinic_id = $request->clinic_id;
        $prescription->save();

        foreach($request->diagonosis as $diagnose){
            //dd($diagnose);
            if($diagnose['test_name'] != null){
                $diagnose1 = DiagnosisTest::where('test_name', $diagnose['test_name'])->first();
                //dd($diagnose1['test_name']);
                $diagnose_id = 0;
                if($diagnose1 == null){
                    //dd($diagnose1['test_name']);
                    $dia = new DiagnosisTest();
                    $dia->test_name = $diagnose['test_name'];
                    $dia->save();
                    $diagnose_id = $dia->id;
                }else{
                    $diagnose_id = $diagnose1->id;
                }
    
                $prescription_test = new PrescriptionTest();
                $prescription_test->prescription_id = $prescription->id;
                $prescription_test->diagnosis_test_id = $diagnose_id;
                $prescription_test->test_instruction = $diagnose['instruction'];
                $prescription_test->save();
            }
        }

        foreach($request->medicines as $m){
            if($m['medicine_name'] != null){
                $medicine = Medicine::where('medicine_name', $m['medicine_name'])->first();
                $medicine_id = 0;

                if($medicine == null){
                    $med = new Medicine();
                    $med->medicine_name = $m['medicine_name'];
                    $med->save();
                    $medicine_id = $med->id;
                }else{
                    $medicine_id = $medicine->id;
                }

                $prescription_medicine = new PrescriptionMedicine();
                $prescription_medicine->prescription_id = $prescription->id;
                $prescription_medicine->medicine_id = $medicine_id;
                $prescription_medicine->medicine_instruction = $m['medicine_instruction'];
                $prescription_medicine->medicine_days = $m['medicine_days'];
                $prescription_medicine->medicine_type = $m['medicine_type'];
                $prescription_medicine->save();
            }
        }
        return redirect('/account/prescription/'.$id);
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
