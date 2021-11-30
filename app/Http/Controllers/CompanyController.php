<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Mentor;
use App\CompanyJob;
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

    public function getProductbySearch(Request $request){ 
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

    public function getJobList(){
        if(Auth::user()->role == 'company'){
            $userData = DB::table('users')
            ->join('companies','users.id','=','companies.user_id')
            ->select('users.username','companies.name as companyName','companies.profile_picture','companies.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $job = CompanyJob::where('company_id','=',$userData[0]->id)->paginate(3);
        return view('company/view_job',compact('auth','job','userData'));
    }

    public function getJobBySearch(Request $request){
        if(Auth::user()->role == 'company'){
            $userData = DB::table('users')
            ->join('companies','users.id','=','companies.user_id')
            ->select('users.username','companies.name as companyName','companies.profile_picture','companies.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $job = DB::table('company_jobs')
        ->select('company_jobs.*')
        ->where('company_id','=',$userData[0]->id)
        ->where('name','like',"%{$request->keyword}%")->paginate(3);
        return view('company/view_job',compact('userData','job','auth'));
    }

    public function goEditPage($id){ 
        if(Auth::user()->role == 'company'){
            $userData = DB::table('users')
            ->join('companies','users.id','=','companies.user_id')
            ->select('users.username','companies.name as companyName','companies.profile_picture','companies.id')
            ->where('users.id','=',Auth::id())
            ->get();
        } else if(Auth::user()->role == 'mentee'){
                $userData = DB::table('users')
                ->join('mentees','users.id','=','mentees.user_id')
                ->select('mentees.name','mentees.id','mentees.birth_date','mentees.gender','users.email','mentees.phone','mentees.birth_place','mentees.address','mentees.portofolio','mentees.cv','mentees.profile_picture','users.username')
                ->where('users.id','=',Auth::id())
                ->get();
        }
        $jobDetail = CompanyJob::find($id);
        $auth = Auth::check();
        $typeList = CompanyJob::where('type','!=',$jobDetail->type)->distinct()->get();
        return view('company/edit_job',compact('jobDetail','auth','userData','typeList'));
    }

    public function editJobDetail(Request $request, $id){ 
        $this->validate($request,[
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'language' => 'required',
            'capacity' => 'required|integer',
            'salary' => 'required|integer',
            'type' => 'required'
        ]);
        $jobDetail = CompanyJob::find($id);
        $jobDetail->name = $request->name;
        $jobDetail->description = $request->description;
        $jobDetail->programming_language = $request->language;
        $jobDetail->capacity = $request->capacity;
        $jobDetail->salary = $request->salary;
        $jobDetail->type = $request->type;
        $jobDetail->update();
        return redirect('/applicantList')->with('status','Job Updated Successfully');
    }

    public function deleteJob($id){ 
        $jobDetail = CompanyJob::find($id);
        $jobDetail->delete();

        return redirect('/applicantList')->with('status','Job Deleted Successfully');
    }

    public function getAddJobPage(){ 
        if(Auth::user()->role == 'company'){
            $userData = DB::table('users')
            ->join('companies','users.id','=','companies.user_id')
            ->select('users.username','companies.name as companyName','companies.profile_picture','companies.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        
        $mentorList = Mentor::all();

        $typeList = DB::table('company_jobs')
        ->select('type')
        ->distinct()
        ->get();
        return view('company/add_job',compact('auth','userData','mentorList','typeList'));
    }

    public function addJob(Request $request){ 
        $auth = Auth::check();
        $this->validate($request,[
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'language' => 'required',
            'capacity' => 'required|integer|min:1',
            'salary' => 'required|integer|min:2',
            'type' => 'required'
        ]);
        $job = new CompanyJob();    
        $job->name = $request->name;
        $job->description = $request->description;
        $job->programming_language = $request->language;
        $job->capacity = $request->capacity;
        $job->salary = $request->salary;
        $job->type = $request->type;

        $company_id = DB::table('users')
        ->join('companies','users.id','=','companies.user_id')
        ->select('companies.id')
        ->where('users.id','=',Auth::id())
        ->get()[0]->id;        
        $job->company_id = $company_id;
        $job->save();
        
        return redirect('/applicantList')->with('status','Job Added Successfully');
    }
}