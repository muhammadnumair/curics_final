<?php

namespace App\Http\Controllers\Backend\CommonModules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Language;
use Auth;

class LanguageController extends Controller
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
        //dd(Auth::user()->language == null ? Dashboard : Auth::user()->language->language);
        $user_id = Auth::user()->id;
        $pre_added_languages = Language::where(['pre_added' => '1'])->get();
        $user_languages = Language::where(['user_id' => $user_id])->get();
        $languages = $pre_added_languages->merge($user_languages);
        return view("backend.common_modules.languages.index", ['languages' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.common_modules.languages.create"); 
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
            'language_name' => 'required',
        ]);

        $language = new Language(); 
        
        $language->language_name = $request->language_name;

        if ($request->has('rtl')) {
            $language->rtl = $request->rtl;
        }else{
            $language->rtl = 0;
        }
        
        if(Auth::user()->userrole === "admin"){
            $language->pre_added = 1;
        }else{
            $language->pre_added = 0;
            $language->user_id = Auth::user()->id;
        }

        $language->save();
        return redirect()->route('languages')->with(['success' => 'Language Created Successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Language::where('id', $id)->first();
        return view("backend.common_modules.languages.edit", ['language' => $language]);
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
            'language_name' => 'required',
        ]);

        $language = Language::where('id', $id)->first();
        
        $language->language_name = $request->language_name;

        if ($request->has('rtl')) {
            $language->rtl = $request->rtl;
        }else{
            $language->rtl = 0;
        }
        
        if(Auth::user()->userrole === "admin"){
            $language->pre_added = 1;
        }else{
            $language->pre_added = 0;
            $language->user_id = Auth::user()->id;
        }

        $language->save();
        return redirect()->route('languages')->with(['success' => 'Language Created Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Language::where('id',$id)->delete();
        return redirect()->route('languages')->with(['success' => 'Language Created Successfully']);
    }
}
