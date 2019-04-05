<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay_type extends Model
{
    //
    protected $fillable = [
        'type',
    ];

    public function payments(){
        return $this->hasMany('App\Payment');
    }

    
}
