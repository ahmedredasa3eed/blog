<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public  function  __construct()
    {
       $this->middleware('auth')->except('sayHi');
    }

    public  function sayHi(): string
    {
        return 'Hi my users';
    }
    public  function sayHi1(): string
    {
        return 'Hi my users1';
    }
}
