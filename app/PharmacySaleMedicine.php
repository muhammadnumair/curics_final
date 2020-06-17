<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacySaleMedicine extends Model
{
    public function medicine(){
        return $this->belongsTo('App\HospitalMedicine');
    }
}
