<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function adult(){
        return "You are Adult, thanks";
    }

    public function site(){
        return view('site.site');
    }

    public function admin(){
        return view('admin.admin');
    }

    public function loadAdminLoginForm(){
        return view('auth.adminLogin');
    }

    public function adminLogin(AdminLoginRequest $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            //$user = auth()->guard('admin')->user();

            return redirect()->route('admin')->with('success', 'You are Login successfully!!');

        } else {
            return back()->with('error', 'your username and password are wrong.');
        }
    }

    public function adminDashboard(){
        return "Admin DashBorad Here";
    }


}
