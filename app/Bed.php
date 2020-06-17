<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    public function category(){
        return $this->belongsTo('App\BedCategory');
    }
}
