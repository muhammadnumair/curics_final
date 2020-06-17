<?php

namespace App\Http\Controllers\Backend\hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ public function __construct()
     {
        $this->middleware('auth');
    }
    public function index()
    {
        return view("backend.hospital.patients.index"); 
    }
}
