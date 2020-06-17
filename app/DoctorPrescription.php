<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorPrescription extends Model
{
    public function medicines()
    {
        return $this->hasMany('App\PrescriptionMedicine', 'prescription_id');
    }

    public function tests()
    {
        return $this->hasMany('App\PrescriptionTest', 'prescription_id');
    }
}
