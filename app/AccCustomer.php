<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccCustomer extends Model
{
    protected $table = "acc_customer";
    public function user(){
        return $this->belongsTo('App\User', 'user_id','id');
    }
}
