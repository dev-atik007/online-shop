<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginCheck(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required|min:7',
        ]);

        $check = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if($check)
        {
            Toastr()->success('Admin Login Successfully!');
            return redirect()->route('admin.dashboard');
        }
        else
        {
            Toastr()->error('Does not match your email and password!');
            return redirect()->route('admin.login');
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
