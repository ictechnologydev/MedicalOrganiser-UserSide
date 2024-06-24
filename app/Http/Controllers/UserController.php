<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        
        session()->forget('token');
            return view('UserPanel.Auth.signin');
        
    }

    public function sponsor(){
        return view('UserPanel.Auth.sponsor');
    }
    public function signup(){

        return view('UserPanel.Auth.signup');
    }

    public function forgot_password(){

    return view('UserPanel.Auth.forgot-password');

    }

    public function forgot_password_otp(){
        return view('UserPanel.Auth.forgot-password-otp');
    }
}
