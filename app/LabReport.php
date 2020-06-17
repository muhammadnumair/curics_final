<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabReport extends Model
{
    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function clinic(){
        return $this->belongsTo('App\Clinic');
    }

}
