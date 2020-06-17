<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalPayment extends Model
{
    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function clinic(){
        return $this->belongsTo('App\Clinic');
    }

    public function Doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function items(){
        return $this->hasMany('App\HospitalPaymentItem');
    }
}
