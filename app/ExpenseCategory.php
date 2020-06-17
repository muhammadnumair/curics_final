<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    public function expenses()
    {
        return $this->hasMany('App\Expense', 'category_id', 'id');
    }
}
