<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BedAllotment extends Model
{
    public function bed(){
        return $this->belongsTo('App\Bed');
    }

    public function patient(){
        return $this->belongsTo('App\Patient');
    }
}
