<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ClassDetail;
use App\Course;
use App\Mentor;
use App\Module;
use App\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getApplicantList(){
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
        ->select('mentees.name as name','mentees.id','mentees.profile_picture','mentees.phone','users.email','mentees.cv','mentees.portofolio','applicants.id as applicantId','applicants.status')
        ->where('company_jobs.company_id','=',$userData[0]->id)->paginate(3);
        // dd($applicantList);
        return view('company/view_applicant',compact('auth','userData','applicantList','jobList'));
    }

    public function getApplicantListMapped($jobId){
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
        ->select('mentees.name as name','mentees.id','mentees.profile_picture','mentees.phone','users.email','mentees.cv','mentees.portofolio','applicants.id as applicantId','applicants.status')
        ->where('company_jobs.company_id','=',$userData[0]->id)
        ->where('company_jobs.id','=',$jobId)->paginate(3);

       
        return view('company/view_applicant',compact('auth','userData','applicantList','jobList'));
    }

    public function getProductbySearch(Request $request){ //buat nampilin hasil searching sesuai keyword yang diinput user (keyword akan dicocokkan dengan nama product)
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
        ->select('mentees.name as name','mentees.id','mentees.profile_picture','mentees.phone','users.email','mentees.cv','mentees.portofolio','applicants.id as applicantId','applicants.status')
        ->where('company_jobs.company_id','=',$userData[0]->id)
        ->where('mentees.name','like',"%{$request->keyword}%")->paginate(3);

        return view('company/view_applicant',compact('userData','auth','jobList','applicantList'));
    }

    public function approveApplicant($id){
        $applicant = Applicant::find($id);
        $applicant->status = 'Accepted';
        $applicant->save();
        return redirect('/applicantList')->with('status','Selected Applicant Approved');
    }

    public function rejectApplicant($id){
        $applicant = Applicant::find($id);
        $applicant->status = 'Rejected';
        $applicant->save();
        return redirect('/applicantList')->with('status','Selected Applicant Rejected');
    }
}