<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //
    protected $fillable = [
        'task_id','url',
    ];

    public function task(){
        return $this->belongsTo('App\Task');
    }
}
