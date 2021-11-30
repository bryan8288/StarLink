<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLoginPage(){ 
        return view('login');
    }

    public function validateLogin(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|alphaNum|min:6'
        ]);
        $remember_me  = (!empty( $request->remember_me ) )? TRUE : FALSE;
        $userData = $request->only('username','password');

        if(Auth::attempt($userData,$remember_me)){
            if(Auth::user()->role == 'company'){
                return redirect('/applicantList');
            }else return redirect('/dashboard');
        }
        else{
            return back()->with('error','Wrong Login Datas');
        }
    }

}
