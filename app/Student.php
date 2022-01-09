<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;


class Student extends Authenticatable
{
    use Notifiable, HasMultiAuthApiTokens;
    protected $table="students";
    protected $fillable = [
        'name', 'email', 'password','mobile','address','degree','semester','section','blood_group','parent_contact_detail'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
