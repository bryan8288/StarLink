<?php

namespace App\Http\Controllers;

use App\ClassDetail;
use App\Course;
use App\Mentor;
use App\Module;
use App\Classes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function getScheduleList(){
        if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
          
        $scheduleList = DB::table('classes')
        ->join('courses','classes.course_id','=','courses.id')
        ->select('classes.*','courses.name as courseName')
        ->where('classes.mentor_id','=',$userData[0]->id)->paginate(3);
        
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