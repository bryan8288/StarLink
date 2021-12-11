<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exam;
use Excel;
use App\Imports\QuestionImport;
use App\SubmittedExam;
use Carbon\Carbon;
use App\Response;


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
        if($exam[0]->type == 'Project'){
            $examSubmitted = DB::table('submitted_exams')
            ->select('submitted_exams.*')
            ->where('submitted_exams.exam_id','=',$examId)
            ->where('submitted_exams.is_finalized','=',1)
            ->where('submitted_exams.mentee_id','=',$userData[0]->id)->get();
            
            if($examSubmitted->count()>0){
                $isSubmitted = true;
            }else $isSubmitted = false;

            $submittedExamList = DB::table('submitted_exams')
            ->select('submitted_exams.*')
            ->where('submitted_exams.mentee_id','=',$userData[0]->id)
            ->orderBy('created_at')->get();
        }else {
            $submittedExamList = null;
            $isSubmitted = false;
        }
        return view('mentee/exam',compact('auth','userData','exam','diffMinutes','isSubmitted','submittedExamList'));
    }

    public function submitExam(Request $request, $examId){
        $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

        $this->validate($request,[
            'exam_file' => 'required',
            'finalized' => 'required'
        ]);

        $courseId = Exam::find($examId)->course_id;

        $submittedExam = new SubmittedExam(); 
        $submittedExam->mentee_id = $userData[0]->id;
        $submittedExam->exam_id = $examId;

        $file_path = $request->file('exam_file')->store('submittedexam','public');

        if($request->finalized == "1"){
            $submittedExam->is_finalized = false;
        }else {
            $submittedExam->is_finalized = true;
        }

        $submittedExam->file = $file_path;
        $submittedExam->save();

        return redirect('/exam/'.$courseId)->with('status','Exam Submitted Successfully');
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
        ->get();

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
        $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

        for ($i=0; $i < count($request->answer); $i++) { 
            $response = new Response();
            $response->question_id = $request->question[$i];
            $response->mentee_id = $userData[0]->id;
            $response->answer = $request->answer[$i];
            $response->save();
        }

        return redirect('/dashboard')->with('status','Exam Submitted Successfully');
    }

    public function getCompiler(){
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('mentees.name','mentees.id','mentees.birth_date','mentees.gender','users.email','mentees.phone','mentees.birth_place','mentees.address','mentees.portofolio','mentees.cv','mentees.profile_picture','users.username')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();

        return view('compiler', compact('userData','auth'));
    }

    public function rateExam(Request $request,$id){
        $this->validate($request,[
            'score' => 'required|integer'
        ]);
        $submittedExam = SubmittedExam::find($id);
        $submittedExam->score = $request->score;
        $submittedExam->update();
        return redirect('/dashboard')->with('status','Exam Rated Successfully');
    }

    public function getRateEssaiPage($menteeId,$courseId){
        $userData = DB::table('users')
        ->join('mentors','users.id','=','mentors.user_id')
        ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
        ->where('users.id','=',Auth::id())
        ->get();
        
        $auth = Auth::check();

        $menteeAnswer = DB::table('responses')
        ->join('questions','responses.question_id','=','questions.id')
        ->join('exams','questions.exam_id','=','exams.id')
        ->select('questions.question','questions.score','responses.answer')
        ->where('responses.mentee_id','=',$menteeId)
        ->where('exams.course_id','=',$courseId)->get();

        $exam = Exam::where('course_id','=',$courseId)->get();

        return view('rate_essai',compact('auth','userData','menteeAnswer','exam','menteeId'));
    }

    public function rateExamEssai(Request $request,$menteeId,$examId){
        $this->validate($request,[
            'score' => 'required|numeric|min:0|max:100'
        ]);
        $submittedExam = new SubmittedExam();
        $submittedExam->mentee_id = $menteeId;
        $submittedExam->exam_id = $examId;
        $submittedExam->score = $request->score;
        $submittedExam->save();
        return redirect('/dashboard')->with('status','Exam Rated Successfully');
    }

    public function editExamScore(Request $request,$id){
        $this->validate($request,[
            'score' => 'required|numeric|min:0|max:100'
        ]);
        $submittedExam = SubmittedExam::find($id);
        $submittedExam->score = $request->score;
        $submittedExam->save();

        return redirect('/dashboard')->with('status','Exam Score Edited Successfully');
    }
}