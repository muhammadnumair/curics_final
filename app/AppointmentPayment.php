<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentPayment extends Model
{
    public function appointment(){
        return $this->belongsTo('App\DoctorAppointment', 'appointment_id', 'id');
    }
}
