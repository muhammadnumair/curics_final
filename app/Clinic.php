<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public function appointments()
    {
        return $this->hasMany('App\DoctorAppointment', 'clinic_id', 'id');
    }

    public function doctor(){
        return $this->belongsTo('App\DoctorClinic');
    }

    public function doctors(){
        return $this->hasMany('App\DoctorClinic');
    }

    public function patients(){
        return $this->hasMany('App\DoctorPatient');
    }

    public function package(){
        return $this->belongsTo('App\Package');
    }
}
