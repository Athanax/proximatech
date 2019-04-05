<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'r_id','s_id','body','status',
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }



}
