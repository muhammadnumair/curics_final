<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalPaymentItem extends Model
{
    public function item(){
        return $this->belongsTo('App\PaymentProcedure', 'procedure_id', 'id');
    }
}
