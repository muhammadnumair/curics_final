<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Specialization;
use App\City;
use App\Disease;
class PageController extends Controller
{

    public function index(){
        //dd(Session::get('patient'));
        //dd(bcrypt('secret'));
        //dd(Session::get('city') . ", " . Session::get('country'));
        $specialization = Specialization::paginate(5);
        $cities = City::paginate(5);;
        $diseases = Disease::paginate(5);
        return view("frontend.pages.index", ['specialization' => $specialization, 'cities' => $cities, 'diseases' => $diseases]);
    }
    
    public function register_doctor(){
        return view("frontend.pages.register_doctor");
    }
    public function register_patient(){
        return view("frontend.pages.register_patient");
    }
    public function register_hospital(){
        return view("frontend.pages.register_hospital");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savelocation(Request $request)
    {
        Session::put('city', $request->city);
        Session::put('country', $request->country);
        //dd(Session::get('city') . ", " . Session::get('country'));
        session()->put('voted', 'somevalue');
        return response()->json('Success!', 201);
    }

    public function all_cities(){
        $cities = City::all();;
        return view("frontend.pages.all_cities", ['cities' => $cities]);
    }

    public function all_diseases(){
        $diseases = Disease::all();;
        return view("frontend.pages.all_diseases", ['diseases' => $diseases]);
    }

    public function all_specializations(){
        $specialization = Specialization::all();;
        return view("frontend.pages.all_specializations", ['specialization' => $specialization]);
    }
}
