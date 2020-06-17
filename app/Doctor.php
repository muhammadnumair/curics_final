<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function specializations()
    {
        return $this->hasMany('App\DoctorsSpecialization');
    }

    public function qualification()
    {
        return $this->hasMany('App\DoctorQualification');
    }

    public function appointments()
    {
        return $this->hasMany('App\DoctorAppointment');
    }

    public function experience()
    {
        return $this->hasMany('App\DoctorExperience');
    }

    public function achievements()
    {
        return $this->hasMany('App\DoctorAchievement');
    }

    public function clinics()
    {
        return $this->hasMany('App\DoctorClinic');
    }

    public function services()
    {
        return $this->hasMany('App\DoctorService');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }
    
    public function specialization(){
        return $this->belongsTo('App\Specialization');
    }

    public function department(){
        return $this->hasMany('App\DoctorDepartments');
    }
}
