<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAppointment extends Model
{
    public function clinic(){
        return $this->belongsTo('App\Clinic');
    }

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function Doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function Prescription(){
        return $this->belongsTo('App\DoctorPrescription', 'id', 'appointment_id');
    }

    public function invoice(){
        return $this->hasOne('App\AppointmentInvoice', 'appointment_id', 'id');
    }
}
