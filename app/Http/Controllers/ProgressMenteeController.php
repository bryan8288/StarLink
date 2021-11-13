<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Mentor;
use App\CompanyJob;
use App\Mentee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProgressMenteeController extends Controller
{
    public function getCourseByMentor(){
        if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();

        $courseList = DB::table('classes')
        ->join('courses','classes.course_id','=','courses.id')
        ->select('courses.category','courses.name as courseName','courses.id')->distinct()
        ->where('classes.mentor_id','=',$userData[0]->id)->paginate(3);

        
        foreach ($courseList as $key ) {
            $classList = DB::table('classes')
            ->join('class_details','classes.id','=','class_details.class_id')
            ->select('classes.name','classes.id',DB::raw('count(class_details.mentee_id) as totalMentee'))->distinct()
            ->groupBy('classes.name','classes.id')
            ->where('classes.mentor_id','=',$userData[0]->id)
            ->where('classes.course_id','=',$key->id)->get();
            
            $key->class = $classList;
        }
        return view('progress_mentee',compact('auth','courseList','userData'));
    }

    public function getProgressMentee($id){
        if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $classData = DB::table('classes')
        ->join('courses','courses.id','classes.course_id')
        ->select('courses.name as courseName','classes.name as className')
        ->where('classes.id','=',$id)->get();

        $totalModule = DB::table('progress_mentees')
        ->join('modules','modules.id','=','progress_mentees.module_id')
        ->join('courses','courses.id','=','modules.course_id')
        ->join('classes','classes.course_id','=','courses.id')
        ->join('mentees','progress_mentees.mentee_id','=','mentees.id')
        ->selectRaw('count(progress_mentees.mentee_id) as total')
        ->groupBy('mentees.id')
        ->where('classes.id','=',$id)
        ->where('classes.mentor_id','=',$userData[0]->id)->get();      

        $auth = Auth::check();
        $progressMentee = DB::table('progress_mentees')
        ->join('modules','modules.id','=','progress_mentees.module_id')
        ->join('courses','courses.id','=','modules.course_id')
        ->join('classes','classes.course_id','=','courses.id')
        ->join('mentees','progress_mentees.mentee_id','=','mentees.id')
        ->select('mentees.name','progress_mentees.mentee_id','mentees.profile_picture')
        ->groupBy('progress_mentees.mentee_id','mentees.name','mentees.profile_picture')
        ->where('classes.id','=',$id)
        ->where('classes.mentor_id','=',$userData[0]->id)->paginate(5);

        foreach ($progressMentee as $key) {
            $totalComplete = DB::table('progress_mentees')
            ->join('mentees','progress_mentees.mentee_id','=','mentees.id')
            ->join('modules','modules.id','=','progress_mentees.module_id')
            ->join('courses','courses.id','=','modules.course_id')
            ->join('classes','classes.course_id','=','courses.id')
            ->selectRaw('count(progress_mentees.mentee_id) as total')
            ->groupBy('mentees.id')
            ->where('progress_mentees.status','=','Completed')
            ->where('progress_mentees.mentee_id','=',$key->mentee_id)
            ->where('classes.id','=',$id)->get();

            $key->totalComplete = $totalComplete;
        }

        return view('progress_mentee_detail',compact('auth','classData','progressMentee','userData','totalModule','id'));
    }

    public function getModuleDetailByMentee($menteeId,$classId){
        if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }

        $mentee = Mentee::find($menteeId);

        $auth = Auth::check();
        $completedModule = DB::table('progress_mentees')
        ->join('mentees','progress_mentees.mentee_id','=','mentees.id')
        ->join('modules','modules.id','=','progress_mentees.module_id')
        ->join('courses','courses.id','=','modules.course_id')
        ->join('classes','classes.course_id','=','courses.id')
        ->select('modules.name','courses.category','progress_mentees.status')
        ->where('progress_mentees.status','=','Completed')
        ->where('progress_mentees.mentee_id','=',$menteeId)
        ->where('classes.id','=',$classId)->paginate(3);
        
        $inProgressModule = DB::table('progress_mentees')
        ->join('mentees','progress_mentees.mentee_id','=','mentees.id')
        ->join('modules','modules.id','=','progress_mentees.module_id')
        ->join('courses','courses.id','=','modules.course_id')
        ->join('classes','classes.course_id','=','courses.id')
        ->select('modules.name','courses.category','progress_mentees.status')
        ->where('progress_mentees.status','=','In Progress')
        ->where('progress_mentees.mentee_id','=',$menteeId)
        ->where('classes.id','=',$classId)->paginate(3);
        return view('progress_mentee_detail_module',compact('auth','userData','mentee','completedModule','inProgressModule'));
    }
}