<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected  $table ='admins';

    protected $guard = 'admin';
    protected $fillable = ['email', 'password'];
    protected $hidden = ['password'];

    public $timestamps = false;
}

