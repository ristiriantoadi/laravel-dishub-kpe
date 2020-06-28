<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function login()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {   
        //$password = $request->password;
        //$email = $request->email;
        
        $user_data = array(
                'email' => $request->email,
                'password' => $request->password
        );

        if(Auth::attempt($user_data)){
            return redirect('/dashboard');
        } 
        return redirect('/login');
    }

    public function logout()
    {   
        Auth::logout();
        return redirect('/login');
    }

}