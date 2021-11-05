<?php

namespace App\Http\Controllers;

use App\Mentee;
use App\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getDashboardPage (){ //buat nampilin page Home beserta list semua produk dalam website
        $auth = Auth::check();
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.profile_picture')
            ->get();
        }

        $mentor = Mentor::all();
        $totalMentor = $mentor->count();

        $mentee = Mentee::all();
        $totalMentee = $mentee->count();
        
        $companyJobs = DB::table('company_jobs')->select('name','capacity')->orderby('capacity','DESC')->limit(5)->get();

        $totalRequestedMentoring = DB::table('requested_mentorings')->select('name',DB::raw('count(id) as total'))->groupBy('name')->get();

        $totalWorkingMentee = DB::table('mentees')->select(DB::raw('count(id) as total'), DB::raw('year(created_at) as year'))->where('is_working','=',1)->groupByRaw('year(created_at)')->get();

        return view('dashboard',compact('userData','auth','totalMentee','totalMentor','companyJobs','totalRequestedMentoring','totalWorkingMentee'));
    }

}
