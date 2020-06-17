<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescriptionTest extends Model
{
    public function test(){
        return $this->belongsTo('App\DiagnosisTest', 'diagnosis_test_id');
    }
}
