<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicine extends Model
{
    public function medicine(){
        return $this->belongsTo('App\Medicine', 'medicine_id');
    }
}
