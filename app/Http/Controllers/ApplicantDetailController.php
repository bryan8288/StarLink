<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Applicant;
use App\Mentor;
use App\CompanyJob;
use App\Course;
use App\Mentee;
use App\Score;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicantDetailController extends Controller
{
    public function show($id){
        if(Auth::user()->role == 'company'){
            $userData = DB::table('users')
            ->join('companies','users.id','=','companies.user_id')
            ->select('users.username','companies.name as companyName','companies.profile_picture','companies.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        
        $applicantDetail = Mentee::find($id);
        $userDetail = User::find($id);
        $skillDetail = Course::all();
        $scoreDetail = Score::all();
        
        // dd($applicantList);
        return view('/applicantDetail',compact('auth','userData','applicantDetail','userDetail','skillDetail','scoreDetail'));
    }
}
