<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supervisor extends Authenticatable
{
    protected  $table ='supervisors';

    protected $guard = 'supervisor';
    protected $fillable = ['email', 'password'];
    protected $hidden = ['password'];

    public $timestamps = false;
}
