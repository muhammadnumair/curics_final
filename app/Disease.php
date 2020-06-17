<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    public function doctors_diseases()
    {
        return $this->hasMany('App\DoctorDisease');
    }
}
