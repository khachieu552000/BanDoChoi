<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employee";
    public function bill_detail(){
        return $this->hasMany('App\Bill','id_employee','id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'user_id','id');
    }
}
