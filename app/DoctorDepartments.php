<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorDepartments extends Model
{
    public function department(){
        return $this->belongsTo('App\HospitalDepartment');
    }
}
