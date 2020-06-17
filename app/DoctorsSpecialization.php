<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorsSpecialization extends Model
{
    protected $fillable = ['doctor_id', 'specialization_id'];

    public function specialization(){
        return $this->belongsTo('App\Specialization');
    }
}
