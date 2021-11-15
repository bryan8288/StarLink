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

class ExamController extends Controller
{
    public function uploadExam(Request $request, $courseId){
        $this->validate($request,[
            'name' => 'required|unique:exams|min:5',
            'type' => 'required',
            'file' => 'required'
        ]);
        $exam = new Exam();    
        $exam->name = $request->name;
        $exam->type = $request->type;

        $file_path = $request->file('file')->store('exam','public');
        $exam->file = $file_path;

        $exam->course_id = $courseId;
        $exam->save();
        
        return redirect('/dashboard')->with('status','Exam Added Successfully');
    }
}