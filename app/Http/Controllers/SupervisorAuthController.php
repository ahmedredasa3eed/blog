<?php

namespace App\Http\Controllers;
use App\Http\Requests\SupervisorRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupervisorAuthController extends Controller
{

    public function loadSupervisorLoginForm(){

        if (Auth::guard('supervisor')->check()) {
            return redirect()->route('supervisor.dashboard');
        }
        return view('auth.supervisorLogin');
    }

    public function supervisorLogin(SupervisorRequest $request){

        if(Auth::guard('supervisor')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('supervisor.dashboard')->with('success','Login Process for supervisor succeeded.');
        }
        else{
            return redirect()->route('supervisor.loginForm')->with('error','Not Found');
        }
    }

    public function dashboard(){
        return view('supervisor/index');
    }

    public function logout() {
        Auth::guard('supervisor')->logout();
        return redirect()->route('supervisor.loginForm');
    }

}
