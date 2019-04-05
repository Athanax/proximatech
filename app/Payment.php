<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'user_id','payment_type','task_id',
    ];

    public function pay_type(){
        return $this->belongsTo('App\Pay_type');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function task(){
        return $this->belongsTo('App\Task');
    }


}
