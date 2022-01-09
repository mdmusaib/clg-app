<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;
use Illuminate\Database\Eloquent\Model;

class Staff extends  Authenticatable
{
    use Notifiable, HasMultiAuthApiTokens;
        protected $table="staff";
    protected $fillable = [
        'name', 'email', 'password','mobile','address','role'   
    ];
}
