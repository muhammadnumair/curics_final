<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function appointments(){
        return $this->hasMany('App\DoctorAppointment', 'patient_id', 'id');
    }

    public function reviews(){
        return $this->hasMany('App\Review', 'patient_id', 'id');
    }

    public function payments(){
        return $this->hasMany('App\AppointmentPayment');
    }

    public function invoices(){
        return $this->hasMany('App\AppointmentInvoice', 'patient_id', 'id');
    }
}
