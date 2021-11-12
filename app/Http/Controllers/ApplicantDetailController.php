<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Applicant;
use App\Mentor;
use App\CompanyJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicantDetailController extends Controller
{
    public function show(){
        if(Auth::user()->role == 'company'){
            $userData = DB::table('users')
            ->join('companies','users.id','=','companies.user_id')
            ->select('users.username','companies.name as companyName','companies.profile_picture','companies.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();

        $jobList = DB::table('companies')
        ->join('company_jobs','companies.id','=','company_jobs.company_id')
        ->leftJoin('applicants','company_jobs.id','=','applicants.job_id')
        ->select('company_jobs.name','company_jobs.id',DB::raw('count(applicants.mentee_id) as totalApplicant'),'company_jobs.capacity')
        ->where('companies.id','=',$userData[0]->id)
        ->groupBy('company_jobs.name','company_jobs.id','company_jobs.capacity')->get();

        $applicantList = DB::table('applicants')
        ->join('company_jobs','applicants.job_id','=','company_jobs.id')
        ->join('mentees','applicants.mentee_id','=','mentees.id')
        ->join('users','mentees.user_id','=','users.id')
        ->select('mentees.name as name','mentees.id','mentees.profile_picture','mentees.phone','users.email','mentees.cv','mentees.portofolio','applicants.id as applicantId','applicants.status','mentees.gender', 'mentees.birth_date','mentees.birth_place','mentees.address')
        ->where('company_jobs.company_id','=',$userData[0]->id)->paginate(3);
        // dd($applicantList);
        return view('/applicantDetail',compact('auth','userData','applicantList','jobList'));
    }
}
