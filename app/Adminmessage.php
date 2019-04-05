<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminmessage extends Model
{
    //
    protected $fillable = [
        'first_name','second_name','subject','message'
    ];
}
