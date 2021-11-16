<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ApplyCompanyController extends Controller
{
    public function show(){
        
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('mentees.name','mentees.id','mentees.birth_date','mentees.gender','users.email','mentees.phone','mentees.birth_place','mentees.address','mentees.portofolio','mentees.cv','mentees.profile_picture','users.username')
            ->where('users.id','=',Auth::id())
            ->get();

            $auth = Auth::check();
            return view('/applyCompany',compact('auth','userData'));
        }
    }
}