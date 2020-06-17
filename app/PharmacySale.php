<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacySale extends Model
{
    public function clinic(){
        return $this->belongsTo('App\Clinic');
    }

    public function items(){
        return $this->hasMany('App\PharmacySaleMedicine', 'pharmacy_sale_id', 'id');
    }
}
