<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mentee;

class RegisterController extends Controller
{
    public function getRegisterPage(){ //buat menampilkan page Register
        return view('register');
    }

    public function addRegisterData(Request $request){ //buat validasi inputan dan menambahkan data user yang melakukan register kedalam database
        $this->validate($request,[
            'username' => 'required|min:5|unique:users',
            'email' => 'required|email',
            'password' => 'required|alphaNum|confirmed|min:6'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = 'mentee';
        $user->save();
        
        $mentee = new Mentee();
        $mentee->name = $request->username;
        $mentee->email = $request->email;
        $mentee->user_id = $user->id;
        $mentee->save();

        return redirect('/login');
    }
}
