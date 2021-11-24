<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\Mentee;
use App\Admin;
use App\DiscussionAdmin;
use App\DiscussionMentor;
use App\Exam;
use App\User;
use Excel;
use App\Imports\QuestionImport;
use App\SubmittedExam;
use Carbon\Carbon;

class ExamController extends Controller
{
    public function uploadExam(Request $request, $courseId){
        if($request->type == 'Project'){
            $this->validate($request,[
                'name' => 'required|unique:exams|min:5',
                'type' => 'required',
                'file' => 'required'
            ]);
        }else{
            $this->validate($request,[
                'name' => 'required|unique:exams|min:5',
                'type' => 'required',
                'file' => 'required|mimes:xls,xlsx'
            ]);
        }
        $exam = new Exam();    
        $exam->name = $request->name;
        $exam->type = $request->type;

        $file_path = $request->file('file')->store('exam','public');
        $exam->file = $file_path;

        $exam->course_id = $courseId;
        $exam->save();

        if($request->type == 'Coding' || $request->type == 'Essai'){
            $path = $request->file('file')->getRealPath();
            $data = Excel::import(new QuestionImport($exam->id), $path);
        }
        
        return redirect('/dashboard')->with('status','Exam Added Successfully');
    }

    public function getExamPage($examId){
        $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

        $auth = Auth::check();

        $exam = DB::table('exams')
        ->join('courses','courses.id','=','exams.course_id')
        ->select('exams.*','courses.name as courseName','courses.exam_time')
        ->where('exams.id','=',$examId)->get();

        $now = Carbon::now()->toDateString();
        $created_at = Carbon::parse($exam[0]->exam_time);
        $diffHuman = $created_at->diffForHumans($now);  
        $diffHours = $created_at->diffInHours($now);  
        $diffMinutes = $created_at->diffInMinutes($now);

        return view('mentee/exam',compact('auth','userData','exam','diffMinutes'));
    }

    public function submitExam(Request $request, $examId){
        $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

        $this->validate($request,[
            'exam_file' => 'required'
        ]);

        $submittedExam = new SubmittedExam(); 
        $submittedExam->mentee_id = $userData[0]->id;
        $submittedExam->exam_id = $examId;

        $file_path = $request->file('exam_file')->store('submittedexam','public');
        $submittedExam->file = $file_path;
        $submittedExam->save();

        return redirect('/dashboard')->with('status','Exam Submitted Successfully');
    }

    public function getEssaiExamPage($examId){
        $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

        $auth = Auth::check();

        $question = DB::table('questions')
        ->join('exams','exams.id','=','questions.exam_id')
        ->select('questions.*')
        ->where('exams.id','=',$examId)
        ->simplePaginate(1);

        $exam = DB::table('exams')
        ->join('courses','courses.id','=','exams.course_id')
        ->select('exams.*','courses.name as courseName','courses.exam_time')
        ->where('exams.id','=',$examId)->get();

        $now = Carbon::now()->toDateString();
        $created_at = Carbon::parse($exam[0]->exam_time);
        $diffHuman = $created_at->diffForHumans($now);  
        $diffHours = $created_at->diffInHours($now);  
        $diffMinutes = $created_at->diffInMinutes($now);

        return view('mentee/exam_essai',compact('auth','userData','exam','diffMinutes','question'));
    }

    public function submitAnswerEssai(Request $request){
        dd($request->all());

        return redirect('/dashboard')->with('status','Exam Submitted Successfully');
    }
}