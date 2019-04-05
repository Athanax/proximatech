<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    protected $fillable = [
      
        'r_id',
        'last_message'
    ];
}
