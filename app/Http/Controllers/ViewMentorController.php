<?php

namespace App\Http\Controllers;

use App\Mentor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewMentorController extends Controller
{
    public function getMentorList(){
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.profile_picture')
            ->get();
        }
        $auth = Auth::check();
        $mentorList = Mentor::paginate(3);
        return view('admin/view_mentor',compact('auth','mentor','userData'));
    }

    public function getProductbySearch(Request $request){ //buat nampilin hasil searching sesuai keyword yang diinput user (keyword akan dicocokkan dengan nama product)
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.profile_picture')
            ->get();
        }
        $auth = Auth::check();
        $mentorList = Mentor::where('name','like',"%{$request->keyword}%")->paginate(3);
        return view('admin/view_mentor',compact('userData','course','auth'));
    }
}
