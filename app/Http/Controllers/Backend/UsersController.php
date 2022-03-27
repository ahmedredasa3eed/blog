<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailsJob;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public  function  __construct()
    {
       $this->middleware('auth')->except('sayHi');
    }

    public  function sendEmailsToUsers(){

        $emails = User::chunk(50,function ($data){
            $this->dispatch(new SendEmailsJob($data));
        });

        return 'email sending in background';
    }

}
