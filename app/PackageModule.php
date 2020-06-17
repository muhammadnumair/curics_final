<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageModule extends Model
{
    public function module(){
        return $this->belongsTo('App\Module');
    }
}
