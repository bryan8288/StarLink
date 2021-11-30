<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseTransaction;
use App\Mentor;
use App\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourseList(){
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $course = Course::paginate(3);

        }else if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $course = DB::table('classes')
            ->join('courses','courses.id','=','classes.course_id')
            ->select('courses.*')
            ->where('classes.mentor_id','=',$userData[0]->id)->paginate(3);

        }
        $auth = Auth::check();
        return view('admin/view_course',compact('auth','course','userData'));
    }

    public function getCourseListForMentee(){
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $menteeId = $userData[0]->id;
            $course = DB::table('courses')
            ->select('courses.*')
            ->whereNotIn('courses.id',function($query) use($menteeId){
                $query->select('course_id')->from('course_transactions')
                ->where('course_transactions.mentee_id','=',$menteeId);
            })->paginate(3);
        }
        $auth = Auth::check();
        return view('admin/view_course',compact('auth','course','userData'));
    }

    public function getProductbySearch(Request $request){ 
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();

        $course = Course::where('name','like',"%{$request->keyword}%")->paginate(3);
        }else if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $course = DB::table('classes')
            ->join('courses','courses.id','=','classes.course_id')
            ->select('courses.*')
            ->where('classes.mentor_id','=',$userData[0]->id)
            ->where('courses.name','like',"%{$request->keyword}%")->paginate(3);
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $menteeId = $userData[0]->id;
            $course = DB::table('courses')
            ->select('courses.*')
            ->whereNotIn('courses.id',function($query) use($menteeId){
                $query->select('course_id')->from('course_transactions')
                ->where('course_transactions.mentee_id','=',$menteeId);
            })
            ->where('courses.name','like',"%{$request->keyword}%")->paginate(3);
        }
        $auth = Auth::check();
        return view('admin/view_course',compact('userData','course','auth'));
    }

    public function goEditPage($id){ //buat nampilin page EditProduct 
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $classList = DB::table('classes')
            ->select('classes.*')
            ->where('classes.course_id','=',$id)->get();

        }else if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $classList = DB::table('classes')
            ->select('classes.*')
            ->where('classes.course_id','=',$id)
            ->where('classes.mentor_id','=',$userData[0]->id)->get();
            
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $classList = DB::table('classes')
            ->join('class_details','class_details.class_id','=','classes.id')
            ->select('classes.*')
            ->where('class_details.mentee_id','=',$userData[0]->id)
            ->where('classes.course_id','=',$id)->get();
        }

        foreach ($classList as $class) {
            if($class->day_of_week == 0){
                $class->day_of_week = 'Monday';
            }elseif($class->day_of_week == 1){
                $class->day_of_week = 'Tuesday';
            }elseif($class->day_of_week == 2){
                $class->day_of_week = 'Wednesday';
            }elseif($class->day_of_week == 3){
                $class->day_of_week = 'Thursday';
            }elseif($class->day_of_week == 4){
                $class->day_of_week = 'Friday';
            }elseif($class->day_of_week == 5){
                $class->day_of_week = 'Saturday';
            }
        }

        $auth = Auth::check();
        $courseDetail = Course::find($id);
        $exam = DB::table('exams')
                ->select('exams.*')
                ->where('exams.course_id','=',$id)->get();

        $completedMenteeList = [];
        if($exam->count() !=0){
            if(Auth::user()->role == 'mentor'){
                if($exam[0]->type == 'Project'){
                    $completedMenteeList = DB::table('submitted_exams')
                    ->join('mentees','submitted_exams.mentee_id','=','mentees.id')
                    ->join('exams','submitted_exams.exam_id','=','exams.id')
                    ->select('submitted_exams.id','submitted_exams.file','mentees.name','submitted_exams.score','mentees.id as menteeId')
                    ->where('exams.course_id','=',$id)->get();
                }else if($exam[0]->type == 'Essai'){
                    $completedMenteeList = DB::table('responses')
                    ->join('mentees','responses.mentee_id','=','mentees.id')
                    ->join('questions','responses.question_id','=','questions.id')
                    ->join('exams','questions.exam_id','=','exams.id')
                    ->leftJoin('submitted_exams','submitted_exams.exam_id','=','exams.id')
                    ->select('submitted_exams.id','submitted_exams.file','mentees.name','submitted_exams.score','mentees.id as menteeId')->distinct()
                    ->where('exams.course_id','=',$id)->get();
                }
            }
        }

        $moduleList = Module::where('course_id','=',$id)->get();
        return view('admin/edit_course',compact('courseDetail','auth','userData','moduleList','exam','completedMenteeList','classList'));
    }

    public function editCourseDetail(Request $request, $id){ 
        $this->validate($request,[
            'name' => 'required|min:5',
            'category' => 'required|min:10',
            'description' => 'required|min:10',
            'price' => 'required|integer|min:5001',
            'weeks' => 'required|integer|min:1',
            'kkm' => 'required|integer|min:2',
            'time' => 'required'
        ]);
        
        $courseDetail = Course::find($id);
        $courseDetail->name = $request->name;
        $courseDetail->category = $request->category;
        $courseDetail->description = $request->description;
        $courseDetail->price = $request->price;
        $courseDetail->weeks = $request->weeks;
        $courseDetail->kkm = $request->kkm;
        $courseDetail->exam_time = $request->time;
        $courseDetail->update();
        return redirect('/editCourse/'.$id)->with('status','Course Updated Successfully');
    }

    public function deleteCourse($id){
        $courseDetail = Course::find($id);
        $courseDetail->delete();

        return redirect('/dashboard')->with('status','Course Deleted Successfully');
    }

    public function getAddCoursePage(){ 
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        
        $mentorList = Mentor::all();

        return view('admin/add_course',compact('auth','userData','mentorList'));
    }

    public function addCourse(Request $request){ 
        $auth = Auth::check();
        $this->validate($request,[
            'name' => 'required|unique:courses|min:5',
            'category' => 'required',
            'description' => 'required|min:10',
            'price' => 'required|integer|min:5001',
            'weeks' => 'required|integer|min:1',
            'kkm' => 'required|integer|min:2',
            'time' => 'required'
        ]);
        $course = new Course();    
        $course->name = $request->name;
        $course->category = $request->category;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->weeks = $request->weeks;
        $course->kkm = $request->kkm;
        $course->exam_time = $request->time;
        $course->save();
        
        return redirect('/dashboard')->with('status','Course Added Successfully');
    }

    public function buyCourse($menteeId,$courseId){
        $courseTransaction = new CourseTransaction();
        $courseTransaction->mentee_id = $menteeId;
        $courseTransaction->course_id = $courseId;
        $courseTransaction->status = 'In Progress';
        $courseTransaction->save();

        return redirect('/dashboard')->with('status','Course Bought Successfully');
    }

    public function getMyCourseForMentee(){
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $course = DB::table('course_transactions')
            ->join('courses','courses.id','=','course_transactions.course_id')
            ->select('courses.*')
            ->where('course_transactions.mentee_id','=',$userData[0]->id)->paginate(3);
        }
        $auth = Auth::check();
        return view('mentee/mycourse',compact('auth','course','userData'));
    }

    public function getMyCourseDetail($id){ 
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $courseDetail = Course::find($id);
        $moduleList = Module::where('course_id','=',$id)->get();
        $scoreboard = DB::table('scores')
        ->join('mentees','scores.mentee_id','=','mentees.id')
        ->select('mentees.name as menteeName','scores.score')
        ->orderByDesc('scores.score')
        ->where('scores.course_id','=',$id)->get();

        $exam = DB::table('exams')
                ->select('exams.*')
                ->where('exams.course_id','=',$id)->get();

        $classList = DB::table('classes')
        ->join('class_details','class_details.class_id','=','classes.id')
        ->select('classes.*')
        ->where('class_details.mentee_id','=',$userData[0]->id)
        ->where('classes.course_id','=',$id)->get();

        if($exam->count() > 0){
            if($exam[0]->type == 'Project'){
                $submittedExam = DB::table('submitted_exams')
                ->where('mentee_id','=',$userData[0]->id)
                ->where('exam_id','=',$exam[0]->id);
            }else if($exam[0]->type == 'Essai'){
                $submittedExam = DB::table('responses')
                ->join('questions','questions.id','=','responses.question_id')
                ->where('mentee_id','=',$userData[0]->id)
                ->where('questions.exam_id','=',$exam[0]->id);
            }
        }else $submittedExam = DB::table('submitted_exams')->where('mentee_id','=','$');

        if($submittedExam->count() > 0){
            $isSubmitted = true;
        }else $isSubmitted = false;

        return view('mentee/mycourse_detail',compact('courseDetail','auth','userData','moduleList','scoreboard','exam','isSubmitted','classList'));
    }
}
