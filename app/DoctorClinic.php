<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorClinic extends Model
{
    public function clinic(){
        return $this->belongsTo('App\Clinic');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function schedule(){
        return $this->hasMany('App\DoctorSchedule', 'doctor_clinic_id', 'clinic_id');
    }
}
