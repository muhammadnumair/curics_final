<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalMedicine extends Model
{
    public function category(){
        return $this->belongsTo('App\MedicineCategory');
    }
}
