<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function notifications(){
        return $this->hasMany('App\Notification');
    }

    public function payment(){
        return $this->hasMany('App\Payment');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }
}
