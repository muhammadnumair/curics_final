<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function transcripts(){
        return $this->hasMany('App\LanguageTranscript');
    }
}
