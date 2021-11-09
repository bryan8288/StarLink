<?php

namespace App\Http\Controllers;

use App\Course;
use App\Mentor;
use App\Module;
use App\Classes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function getClassList(){
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->get();
        }
        $auth = Auth::check();
        $class = DB::table('classes')
        ->join('class_details','classes.id','=','class_details.class_id')
        ->select(DB::raw('count(class_details.mentee_id) as total'),'classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
        ->orderBy('classes.name')
        ->groupBy('classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
        ->paginate(3);
        return view('admin/view_class',compact('auth','class','userData'));
    }

    public function getProductbySearch(Request $request){ //buat nampilin hasil searching sesuai keyword yang diinput user (keyword akan dicocokkan dengan nama product)
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->get();
        }
        $class = DB::table('classes')
        ->join('class_details','classes.id','=','class_details.class_id')
        ->select(DB::raw('count(class_details.mentee_id) as total'),'classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
        ->orderBy('classes.name')
        ->groupBy('classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
        ->paginate(3);
        return view('admin/view_class',compact('userData','class','auth'));
    }
}