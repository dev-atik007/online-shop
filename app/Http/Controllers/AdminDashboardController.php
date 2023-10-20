<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $check = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if($check)
        {
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return redirect()->route('admin.login');
        }
        
    }

}
