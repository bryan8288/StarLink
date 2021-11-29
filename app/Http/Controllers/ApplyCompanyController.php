<?php

namespace App\Http\Controllers;

use App\Applicant;
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

            $jobPositionList = DB::table('company_jobs')
            ->select('company_jobs.name')->distinct()->get();

            $jobList = DB::table('company_jobs')
            ->join('companies','companies.id','=','company_jobs.company_id')
            ->select('company_jobs.*','companies.name as companyName','companies.address as companyAddress','companies.profile_picture')
            ->where('company_jobs.capacity','!=',0)->paginate(4);

            foreach ($jobList as $key) {
                $status = DB::table('applicants')
                ->join('company_jobs','applicants.job_id','=','company_jobs.id')
                ->select('applicants.status')
                ->where('applicants.mentee_id','=',$userData[0]->id)
                ->where('company_jobs.id','=',$key->id)->get();
                $key->status = $status;
            }

            $countAccepted = DB::table('applicants')
            ->select(DB::raw('count(applicants.id) as countAccepted'))
            ->where('applicants.status','=','Accepted')
            ->where('applicants.mentee_id','=',$userData[0]->id)->get()[0]->countAccepted;

            $countCompletedCourse = DB::table('course_transactions')
            ->select(DB::raw('count(course_transactions.id) as countCompleted'))
            ->where('course_transactions.status','=','Completed')
            ->where('course_transactions.mentee_id','=',$userData[0]->id)->get()[0]->countCompleted;

            $acceptedCompany = DB::table('applicants')
            ->join('company_jobs','applicants.job_id','=','company_jobs.id')
            ->join('companies','company_jobs.company_id','=','companies.id')
            ->select('company_jobs.*','companies.name as companyName','companies.address as companyAddress','companies.profile_picture')
            ->where('applicants.status','=','Accepted')
            ->where('applicants.mentee_id','=',$userData[0]->id)->get();

            $countJob = DB::table('company_jobs')
            ->select(DB::raw('count(company_jobs.id) as total'))->get()[0]->total;
            $auth = Auth::check();
            return view('/applyCompany',compact('auth','userData','jobPositionList','jobList','countJob','countAccepted','countCompletedCourse','acceptedCompany'));
        }
    }

    public function showBySearch(Request $request){ 
        if($request->keyword==null){
            $request->keyword = '';
        }
        if($request->jobPosition=='All'){
            $request->jobPosition = '';
        }
        if($request->salary=='All'){
            $request->salary = '';
        }
        if($request->type=='All'){
            $request->type = '';
        }
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('mentees.name','mentees.id','mentees.birth_date','mentees.gender','users.email','mentees.phone','mentees.birth_place','mentees.address','mentees.portofolio','mentees.cv','mentees.profile_picture','users.username')
            ->where('users.id','=',Auth::id())
            ->get();

            $auth = Auth::check();

            
            $jobPositionList = DB::table('company_jobs')
            ->select('company_jobs.name')->distinct()->get();

            $countJob = DB::table('company_jobs')
            ->select(DB::raw('count(company_jobs.id) as total'))->get()[0]->total;

            $jobList = DB::table('company_jobs')
            ->join('companies','companies.id','=','company_jobs.company_id')
            ->select('company_jobs.*','companies.name as companyName','companies.address as companyAddress','companies.profile_picture')
            ->where('company_jobs.capacity','!=',0)
            ->where(function($query) use($request){
                $query->where('companies.name','like',"%{$request->keyword}%")
                ->orWhere('company_jobs.name','like',"%{$request->keyword}%");
            })
            ->where(function($query) use($request){
                if($request->salary=='< Rp 10.000.000'){
                    $query->where('company_jobs.salary','<',10000000);
                }else if($request->salary=='Rp 10.000.001 - Rp 20.000.000'){
                    $query->whereBetween('company_jobs.salary',[10000001,20000000]);
                }else if($request->salary=='> Rp 20.000.000'){
                    $query->where('company_jobs.salary','>',20000000);
                }else{
                }
            })
            ->where('company_jobs.type','like',"%{$request->type}%")
            ->where('company_jobs.name','like',"%{$request->jobPosition}%")
            ->paginate(4);

            foreach ($jobList as $key) {
                $status = DB::table('applicants')
                ->join('company_jobs','applicants.job_id','=','company_jobs.id')
                ->select('applicants.status')
                ->where('applicants.mentee_id','=',$userData[0]->id)
                ->where('company_jobs.id','=',$key->id)->get();
                $key->status = $status;
            }

            $countAccepted = DB::table('applicants')
            ->select(DB::raw('count(applicants.id) as countAccepted'))
            ->where('applicants.status','=','Accepted')
            ->where('applicants.mentee_id','=',$userData[0]->id)->get()[0]->countAccepted;

            $acceptedCompany = DB::table('applicants')
            ->join('company_jobs','applicants.job_id','=','company_jobs.id')
            ->join('companies','company_jobs.company_id','=','companies.id')
            ->select('company_jobs.*','companies.name as companyName','companies.address as companyAddress','companies.profile_picture')
            ->where('applicants.status','=','Accepted')
            ->where('applicants.mentee_id','=',$userData[0]->id)->get();

            $countCompletedCourse = DB::table('course_transactions')
            ->select(DB::raw('count(course_transactions.id) as countCompleted'))
            ->where('course_transactions.status','=','Completed')
            ->where('course_transactions.mentee_id','=',$userData[0]->id)->get()[0]->countCompleted;

        }
        return view('/applyCompany',compact('auth','userData','jobPositionList','jobList','countJob','countAccepted','countCompletedCourse','acceptedCompany'));
    }

    public function applyCompany($jobId){
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('mentees.name','mentees.id','mentees.birth_date','mentees.gender','users.email','mentees.phone','mentees.birth_place','mentees.address','mentees.portofolio','mentees.cv','mentees.profile_picture','users.username')
            ->where('users.id','=',Auth::id())
            ->get();
        }

        $applicant = new Applicant();
        $applicant->mentee_id = $userData[0]->id;
        $applicant->job_id = $jobId;
        $applicant->status = 'In Progress';
        $applicant->save();

        return redirect('/dashboard')->with('status','Job Applied Successfully');
    }

    public function getDetailCompanyJob($jobId){
        
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('mentees.name','mentees.id','mentees.birth_date','mentees.gender','users.email','mentees.phone','mentees.birth_place','mentees.address','mentees.portofolio','mentees.cv','mentees.profile_picture','users.username')
            ->where('users.id','=',Auth::id())
            ->get();

            $jobDetail = DB::table('company_jobs')
            ->where('company_jobs.id','=',$jobId)->get();

            $auth = Auth::check();
            return view('company_detail',compact('auth','userData','jobDetail'));
        }
    }
}