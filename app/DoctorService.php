<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorService extends Model
{
    public function service()
    {
        return $this->belongsTo('App\MedicalService', 'medical_service_id');
    }
}
