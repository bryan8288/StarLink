<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLoginPage(){ //buat nampilin page Login
        return view('login');
    }

    public function validateLogin(Request $request){ //buat validasi inputan dan validasi bahwa data yang dimasukkan user saat login itu ada dalam database (jika tidak ada akan pop up error)
        $this->validate($request,[
            'username' => 'required|min:5',
            'password' => 'required|alphaNum|min:6'
        ]);
        $remember_me  = (!empty( $request->remember_me ) )? TRUE : FALSE;
        $userData = $request->only('username','password');

        if(Auth::attempt($userData,$remember_me)){
            return redirect('/home');
        }
        else{
            return back()->with('error','Wrong Login Datas');
        }
    }

}
