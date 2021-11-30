<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function getScheduleList(){
        if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $scheduleList = DB::table('classes')
            ->join('courses','classes.course_id','=','courses.id')
            ->select('classes.*','courses.name as courseName')
            ->where('classes.mentor_id','=',$userData[0]->id)->paginate(3);
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $scheduleList = DB::table('classes')
            ->join('class_details','classes.id','=','class_details.class_id')
            ->join('courses','classes.course_id','=','courses.id')
            ->select('classes.*','courses.name as courseName')
            ->where('class_details.mentee_id','=',$userData[0]->id)->paginate(3);
        }
        $auth = Auth::check();
        
        $today = Carbon::now();
        $weekStartDate = $today->startOfWeek()->format('Y-m-d');
        foreach ($scheduleList as $schedule) {
            $date = Carbon::createFromDate($weekStartDate);
            $daysToAdd = $schedule->day_of_week;
            $date = Carbon::parse($date)->addDays($daysToAdd)->format('Y-m-d');
            $schedule->date = $date;
        }
        return view('view_schedule',compact('auth','scheduleList','userData'));
    }
}