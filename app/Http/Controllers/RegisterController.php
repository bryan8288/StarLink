<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mentee;

class RegisterController extends Controller
{
    public function getRegisterPage(){
        return view('register');
    }

    public function addRegisterData(Request $request){ 
        $this->validate($request,[
            'username' => 'required|min:5|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|alphaNum|confirmed|min:6'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'mentee';
        $user->save();
        
        $mentee = new Mentee();
        $mentee->name = $request->username;
        $mentee->user_id = $user->id;
        $mentee->save();

        return redirect('/login');
    }
}
