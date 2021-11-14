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

        $dataDetail = DB::table('courses')
        ->join('course_transactions','course_transactions.course_id','=','courses.id')
        ->join('scores','courses.id','=','scores.course_id')
        ->join('mentees','scores.mentee_id','=','mentees.user_id')
        ->select('courses.name','scores.score','course_transactions.mentor_feedback','course_transactions.graduated_date')
        ->where('course_transactions.status','=','Completed')
        ->where('mentees.id','=',$applicantDetail->id)
        ->where('course_transactions.mentee_id','=',$applicantDetail->id)
        ->get();
        // dd($dataDetail);
        // dd($applicantList);
        
        return view('/applicantDetail',compact('auth','userData','applicantDetail','userDetail','dataDetail'));
    }
}
