<?php

namespace App\Http\Controllers\Backend\CommonModules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserLanguage;
use Auth;
use App\Language;

class UserLanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $pre_added_languages = Language::where(['pre_added' => '1'])->get();
        $user_languages = Language::where(['user_id' => $user_id])->get();
        $languages = $pre_added_languages->merge($user_languages);
        return view("backend.common_modules.user_language.index", ['languages' => $languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->language_id != "default"){
            $user_language = UserLanguage::where('user_id', Auth::user()->id)->first();
            if($user_language == null){
                $user_language = new UserLanguage(); 
                $user_language->user_id = Auth::user()->id;
            }
            $user_language->language_id = $request->language_id;
            $user_language->save();
        }else{
            UserLanguage::where('user_id', Auth::user()->id)->delete();
        }
        return redirect('/account/language');
    }
}
