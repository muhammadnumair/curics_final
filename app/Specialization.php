<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specialization extends Model
{
    public function doctors_specilizations()
    {
        return $this->hasMany('App\DoctorsSpecialization');
    }
}
