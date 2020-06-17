<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentInvoice extends Model
{
    public function payment(){
        return $this->hasOne('App\AppointmentPayment', 'invoice_number', 'id');
    }

    public function appointment(){
        return $this->belongsTo('App\DoctorAppointment', 'appointment_id', 'id');
    }
}
