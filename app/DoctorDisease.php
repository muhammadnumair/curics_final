<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorDisease extends Model
{
    public function disease(){
        return $this->belongsTo('App\Disease');
    }
}
