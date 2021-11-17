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

class ScoreController extends Controller
{
    public function getScoreList(){
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();

        $courseData = DB::table('classes')
        ->join('class_details','classes.id','=','class_details.class_id')
        ->join('courses','courses.id','classes.course_id')
        ->select('courses.name as courseName','classes.name as className','courses.id as courseId')
        ->where('class_details.mentee_id','=',$userData[0]->id)->paginate(3);

        foreach ($courseData as $key) {
            $assignment = DB::table('submitted_assignments')
            ->join('assignments','submitted_assignments.assignment_id','=','assignments.id')
            ->join('modules','assignments.module_id','=','modules.id')
            ->select('assignments.title','submitted_assignments.score')
            ->where('modules.course_id','=',$key->courseId)
            ->where('submitted_assignments.mentee_id','=',$userData[0]->id)
            ->whereNotNull('submitted_assignments.score')->get();

            $exam = DB::table('submitted_exams')
            ->join('exams','exams.id','=','submitted_exams.exam_id')
            ->select('exams.name','submitted_exams.score')
            ->where('submitted_exams.mentee_id','=',$userData[0]->id)
            ->where('exams.course_id','=',$key->courseId)
            ->whereNotNull('submitted_exams.score')->get();

            $key->assignments = $assignment;
            $key->exams = $exam;
        }
        return view('view_score',compact('auth','courseData','userData'));
    }
}