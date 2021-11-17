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

class ClassController extends Controller
{
    public function getClassList(){
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $class = DB::table('classes')
            ->join('class_details','classes.id','=','class_details.class_id')
            ->select(DB::raw('count(class_details.mentee_id) as total'),'classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->orderBy('classes.name')
            ->groupBy('classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->paginate(3);
        }else if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $class = DB::table('classes')
            ->join('class_details','classes.id','=','class_details.class_id')
            ->select(DB::raw('count(class_details.mentee_id) as total'),'classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->orderBy('classes.name')
            ->groupBy('classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->where('classes.mentor_id','=',$userData[0]->id)
            ->paginate(3);
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $menteeId = $userData[0]->id;
            $class = DB::table('classes')
            ->join('class_details','classes.id','=','class_details.class_id')
            ->join('courses','classes.course_id','=','courses.id')
            ->select(DB::raw('count(class_details.mentee_id) as total'),'classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->orderBy('classes.name')
            ->groupBy('classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->whereIn('classes.id',function($query) use($menteeId){
                $query->select('class_id')->from('class_details')
                ->where('class_details.mentee_id','=',$menteeId);
            })
            ->paginate(3);
        }
        $auth = Auth::check();
        
        return view('admin/view_class',compact('auth','class','userData'));
    }

    public function getProductbySearch(Request $request){ //buat nampilin hasil searching sesuai keyword yang diinput user (keyword akan dicocokkan dengan nama product)
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->get();

            $class = DB::table('classes')
            ->join('class_details','classes.id','=','class_details.class_id')
            ->select(DB::raw('count(class_details.mentee_id) as total'),'classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->orderBy('classes.name')
            ->where('classes.name','like',"%{$request->keyword}%")
            ->groupBy('classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->paginate(3);
        }else if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $class = DB::table('classes')
            ->join('class_details','classes.id','=','class_details.class_id')
            ->select(DB::raw('count(class_details.mentee_id) as total'),'classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->orderBy('classes.name')
            ->groupBy('classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->where('classes.mentor_id','=',$userData[0]->id)
            ->where('classes.name','like',"%{$request->keyword}%")
            ->paginate(3);
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();

            $menteeId = $userData[0]->id;
            $class = DB::table('classes')
            ->join('class_details','classes.id','=','class_details.class_id')
            ->join('courses','classes.course_id','=','courses.id')
            ->select(DB::raw('count(class_details.mentee_id) as total'),'classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->orderBy('classes.name')
            ->groupBy('classes.name','classes.id','classes.day_of_week','classes.start_time','classes.end_time','classes.link')
            ->whereIn('classes.id',function($query) use($menteeId){
                $query->select('class_id')->from('class_details')
                ->where('class_details.mentee_id','=',$menteeId);
            })
            ->where('classes.name','like',"%{$request->keyword}%")
            ->paginate(3);
        }
        $auth = Auth::check();

        return view('admin/view_class',compact('userData','class','auth'));
    }

    public function goEditPage($id){ //buat nampilin page EditProduct 
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }else if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.profile_picture','mentors.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $class = Classes::find($id);
        $mapDay = [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ];
        unset($mapDay[$class->day_of_week]);

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
        $mentorName = Mentor::find($class->mentor_id);
        $mentorList = Mentor::where('name','!=',$mentorName->name)->get();
        $courseName = Course::find($class->course_id)->name;
        $courseList = Course::where('name','!=',$courseName)->get();

        $menteeList = DB::table('mentees')
                    ->join('class_details','mentees.id','=','class_details.mentee_id')
                    ->select('class_details.id as id','mentees.name')
                    ->where('class_details.class_id','=',$id)->get();
                    
        $newMenteeList = DB::table('course_transactions')
                            ->join('mentees','mentees.id','=','course_transactions.mentee_id')
                            ->join('classes','classes.course_id','=','course_transactions.course_id')
                            // ->join('classes','class_details.class_id','=','classes.id')
                            // ->join('course_transactions','class_details.class_id','=','course_transactions.mentee_id')
                            ->whereNotIn('mentees.id',function($query) use ($id){
                                $query->select('mentees.id')->from('mentees')
                                ->join('class_details','mentees.id','=','class_details.mentee_id')
                                ->join('classes','class_details.class_id','=','classes.id')
                                ->join('course_transactions','class_details.mentee_id','=','course_transactions.mentee_id')
                                ->where('classes.id','=',$id)
                                ->where('course_transactions.status','=','In Progress');
                    })->whereNotIn('mentees.id',function($query) use ($courseName){
                        $query->select('course_transactions.mentee_id')->from('course_transactions')
                        ->join('class_details','course_transactions.mentee_id','=','class_details.mentee_id')
                        ->join('classes','classes.id','=','class_details.class_id')
                        ->join('courses','classes.course_id','=','courses.id')
                        ->where('courses.name','=',$courseName);
                    })->select('mentees.name','mentees.id')->where('classes.id','=',$id)->get();
        return view('admin/edit_class',compact('class','auth','userData','mentorList','mentorName','mapDay','courseName','courseList','menteeList','newMenteeList','id'));
    }

    public function editClassDetail(Request $request, $id){ //berisi validasi inputan dan buat melakukan editProduct yang akan mengupdate semua data produk yang diklik sesuai inputan admin
        $this->validate($request,[
            'name' => 'required|min:4',
            'mentor' => 'required',
            'course' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'link' => 'required'
        ]);
        
        $class = Classes::find($id);
        $class->name = $request->name;

        $course_id = Course::where('name','=',$request->course)->get()[0]->id;
        $class->course_id = $course_id;

        $mentor_id = Mentor::where('name','=',$request->mentor)->get()[0]->id;
        $class->mentor_id = $mentor_id;
        if($request->day == 'Monday'){
            $class->day_of_week = 0;
        }else if($request->day == 'Tuesday'){
            $class->day_of_week = 1;
        }else if($request->day == 'Wednesday'){
            $class->day_of_week = 2;
        }else if($request->day == 'Thursday'){
            $class->day_of_week = 3;
        }else if($request->day == 'Friday'){
            $class->day_of_week = 4;
        }else if($request->day == 'Saturday'){
            $class->day_of_week = 5;
        }

        $class->start_time = $request->start_time;
        $class->end_time = $request->end_time;
        $class->link = $request->link;
        $class->update();
        return redirect('/dashboard')->with('status','Class Updated Successfully');
    }

    public function deleteClass($id){ //buat menghapus product sesuai dengan product yang diklik
        $class = Classes::find($id);
        $class->delete();

        return redirect('/dashboard')->with('status','Class Deleted Successfully');
    }

    public function deleteMenteeFromClass($id){
        $classDetail = ClassDetail::find($id);
        $classDetail->delete();

        return redirect('dashboard')->with('status','Mentee Removed From Class Successfully');
    }

    public function addMenteeToClass(Request $request,$classId){
        $input = $request->all();
        $input['menteeId'] = $request->input('menteeId');
        // dd($classId);
        foreach ($input['menteeId'] as $key) {
            $classDetail = new ClassDetail();
            $classDetail->class_id = $classId;
            $classDetail->mentee_id = $key;
            $classDetail->save();
        }
        return redirect('dashboard')->with('status','Mentee(s) added to Class Successfully');
    }

    public function getAddClassPage(){ //buat nampilin page AddProduct dan list semua stationary_type
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();

        $mapDay = [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ];
        $mentorList = Mentor::all();
        $courseList = Course::all();

        return view('admin/add_class',compact('auth','userData','mentorList','courseList','mapDay'));
    }

    public function addClass(Request $request){ //buat validasi inputan dan untuk menambahkan produk baru kedalam database sesuai inputan admin
        $this->validate($request,[
            'name' => 'required|unique:classes|min:4',
            'course' => 'required',
            'mentor' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'link' => 'required'
        ]);

        if($request->day == 'Monday'){
            $request->day = 0;
        }else if($request->day == 'Tuesday'){
            $request->day = 1;
        }else if($request->day == 'Wednesday'){
            $request->day = 2;
        }else if($request->day == 'Thursday'){
            $request->day = 3;
        }else if($request->day == 'Friday'){
            $request->day = 4;
        }else if($request->day == 'Saturday'){
            $request->day = 5;
        }
        $class = new Classes();    
        $class->name = $request->name;
        $class->day_of_week = $request->day;
        $class->start_time = $request->start_time;
        $class->end_time = $request->end_time;
        $class->link = $request->link;

        $mentor_id = Mentor::select('id')->where('name',$request->mentor)->get()[0]->id;
        $class->mentor_id = $mentor_id;

        $course_id = Course::select('id')->where('name',$request->course)->get()[0]->id;
        $class->course_id = $course_id;
        $class->save();
        
        return redirect('/dashboard')->with('status','Class Added Successfully');
    }
}