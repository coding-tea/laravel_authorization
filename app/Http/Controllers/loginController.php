<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function login(Request $request){
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return back()->withErrors([
            'email' => 'email or password not coorect'
        ])->onlyInput('email');
    }
}
