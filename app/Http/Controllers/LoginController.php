<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //show login page
    public function login_page()
    {
        return view('login');
    }

    //login Process
    public function loginProcess(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard.index');
        } else {
            return Redirect::back()->with('Errormassage', 'ইমেইল অথবা পাসওয়ার্ড ভুল হচ্ছে')->withInput();
        }
    }
}
