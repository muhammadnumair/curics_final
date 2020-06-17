<?php

namespace App\Http\Controllers\Backend\CommonModules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LanguageTranscript;
use App\Language;

class LanguageTranscriptController extends Controller
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
    public function index($id)
    {
        $transcript = LanguageTranscript::where('language_id', $id)->get();
        $language = Language::where('id', $id)->first();
        return view("backend.common_modules.language_transcript.index", ['transcripts' => $transcript, 'language' => $language]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $language = Language::where('id', $id)->first();
        return view("backend.common_modules.language_transcript.create", ['language' => $language]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'english_syntax' => 'required',
            'translation' => 'required',
        ]);

        $transcript = new LanguageTranscript(); 
        
        $transcript->language_id = $id;
        $transcript->english_syntax = $request->english_syntax;
        $transcript->translation = $request->translation;
        $transcript->save();
        return redirect('/account/language/transcript/'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transcript = LanguageTranscript::where('id', $id)->first();
        return view("backend.common_modules.language_transcript.edit", ['transcript' => $transcript]);
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
            'english_syntax' => 'required',
            'translation' => 'required',
        ]);

        $transcript = LanguageTranscript::where('id', $id)->first();
        $transcript->english_syntax = $request->english_syntax;
        $transcript->translation = $request->translation;
        $transcript->save();
        return redirect('/account/language/transcript/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l_id = LanguageTranscript::where('id',$id)->first()->language_id;
        LanguageTranscript::where('id',$id)->delete();
        return redirect('/account/language/transcript/'.$l_id);
    }
}
