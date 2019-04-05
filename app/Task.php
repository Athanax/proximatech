<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'tittle','description','user_id','dev_id','duration',
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
