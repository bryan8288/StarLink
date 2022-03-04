<?php

namespace App\Http\Controllers;

use App\Mentee;
use App\Mentor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function getDashboardPage (){
        
        $auth = Auth::check();
        $totalMentee = null;
        $totalMentor = null;
        $companyJobs = null;
        $totalRequestedMentoring = null;
        $totalWorkingMentee = null;
        $classList = null;
        $todaySchedule = null;
        $pendingAssignment = null;
        $todayScheduleMentee = null;
        $score = null;
        $assignmentMentee = null;
        $today = Carbon::today()->format('l');
            if($today == 'Monday'){
                $day_of_week = 0;
            }else if($today == 'Tuesday'){
                $day_of_week = 1;
            }else if($today == 'Wednesday'){
                $day_of_week = 2;
            }else if($today == 'Thursday'){
                $day_of_week = 3;
            }else if($today == 'Friday'){
                $day_of_week = 4;
            }else if($today == 'Saturday'){
                $day_of_week = 5;
            }else $day_of_week = 6;

            $totalRequestedMentoring = DB::table('requested_mentorings')->select('name',DB::raw('count(id) as total'))->groupBy('name')->get();
                
            $totalWorkingMentee = DB::table('mentees')->select(DB::raw('count(id) as total'), DB::raw('year(created_at) as year'))->where('is_working','=',1)->groupByRaw('year(created_at)')->get();

        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();

            #adminDashboard
            $mentor = Mentor::all();
            $totalMentor = $mentor->count();
                
            $mentee = Mentee::all();
            $totalMentee = $mentee->count();
                        
            $companyJobs = DB::table('company_jobs')->select('name','capacity')->orderby('capacity','DESC')->limit(5)->get();
                                
        }else if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();
            #mentorDashboard
            $classList = DB::table('classes')
            ->leftJoin('class_details','classes.id','=','class_details.class_id')
            ->join('courses','classes.course_id','=','courses.id')
            ->select('classes.name as className','courses.name as courseName',DB::raw('count(class_details.mentee_id) as totalMentee'))
            ->groupBy('classes.name','courses.name')
            ->where('classes.mentor_id','=',$userData[0]->id)->get();
            
            $todaySchedule = DB::table('classes')
            ->join('mentors','classes.mentor_id','=','mentors.id')
            ->join('courses','classes.course_id','=','courses.id')
            ->select('classes.*','courses.name as courseName')
            ->where('classes.day_of_week','=',$day_of_week)
            ->where('mentors.id','=',$userData[0]->id)->get();

            $pendingAssignment = DB::table('assignments')
            ->join('modules','modules.id','=','assignments.module_id')
            ->join('courses','modules.course_id','=','courses.id')
            ->join('classes','classes.course_id','=','courses.id')
            ->join('submitted_assignments','submitted_assignments.assignment_id','=','assignments.id')
            ->select('courses.name','courses.id')->distinct()
            ->whereNull('submitted_assignments.score')
            ->whereNotNull('submitted_assignments.file')
            ->where('classes.mentor_id','=',$userData[0]->id)
            ->get();

            $assignment = [];
            foreach ($pendingAssignment as $key) {
                $assignment = DB::table('assignments')
                ->join('modules','modules.id','=','assignments.module_id')
                ->join('courses','modules.course_id','=','courses.id')
                ->join('classes','classes.course_id','=','courses.id')
                ->join('submitted_assignments','submitted_assignments.assignment_id','=','assignments.id')
                ->select('modules.id as moduleId','assignments.title','assignments.id',DB::raw('count(submitted_assignments.mentee_id) as totalPending'))
                ->groupBy('assignments.title','assignments.id','modules.id')
                ->where('courses.id','=',$key->id)
                ->whereNull('submitted_assignments.score')
                ->whereNotNull('submitted_assignments.file')->get();
                $key->assignment = $assignment;
            }
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

            #menteeDashboard
            $todayScheduleMentee = DB::table('class_details')
            ->join('classes','class_details.class_id','=','classes.id')
            ->join('mentees','class_details.mentee_id','=','mentees.id')
            ->join('courses','classes.course_id','=','courses.id')
            ->select('classes.*','courses.name as courseName')
            ->where('classes.day_of_week','=',$day_of_week)
            ->where('mentees.id','=',$userData[0]->id)->get();

            $score = DB::table('mentees')
            ->join('scores','mentees.id','=','scores.mentee_id')
            ->join('courses','courses.id','=','scores.course_id')
            ->select('scores.score','courses.name')
            ->where('mentees.id','=',$userData[0]->id)->get();

            $menteeId = $userData[0]->id;
            $assignmentMentee = DB::table('mentees')
            ->join('class_details','mentees.id','=','class_details.mentee_id')
            ->join('classes','class_details.class_id','=','classes.id')
            ->join('courses','classes.course_id','=','courses.id')
            ->join('modules','courses.id','=','modules.course_id')
            ->join('assignments','modules.id','=','assignments.module_id')
            ->select('courses.name','courses.id','mentees.id as menteeId')->distinct()
            ->where('mentees.id','=',$userData[0]->id)
            ->whereRaw('DATEDIFF(assignments.end_date,current_date) > 0')
            ->whereNotIn('assignments.id',function($query) use ($menteeId){
                $query->select('assignment_id')->from('submitted_assignments')
                ->where('submitted_assignments.mentee_id','=',$menteeId);
            })->get();

            foreach ($assignmentMentee as $key) {
                $assignment = DB::table('modules')
                ->join('assignments','modules.id','=','assignments.module_id')
                ->select('modules.id as moduleId','assignments.title','assignments.id',DB::raw('DATEDIFF(assignments.end_date,current_date) as dateDiff'))
                ->where('modules.course_id','=',$key->id)
                ->whereRaw('DATEDIFF(assignments.end_date,current_date) > 0')
                ->whereNotIn('assignments.id',function($query) use ($menteeId){
                    $query->select('assignment_id')->from('submitted_assignments')
                    ->where('submitted_assignments.mentee_id','=',$menteeId);
                })->get();

                $key->assignment = $assignment;
            }
        }
        
        return view('dashboard',compact('userData','auth','totalMentee','totalMentor','companyJobs','totalRequestedMentoring','totalWorkingMentee',
    'classList','todaySchedule','pendingAssignment','todayScheduleMentee','score','assignmentMentee'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
