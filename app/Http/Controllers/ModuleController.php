<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\Mentor;
use App\Module;
use App\SubmittedAssignment;
use App\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function getAddModulePage(){ //buat nampilin page AddModule 
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
        }
        $auth = Auth::check();
        $courseList = Course::all();
        return view('admin/add_module',compact('auth','userData','courseList'));
    }
    
    public function addModule(Request $request){ //buat validasi inputan dan untuk menambahkan produk baru kedalam database sesuai inputan admin
        $this->validate($request,[
            'name' => 'required|unique:modules|min:5',
            'course' => 'required',
            'description' => 'required|min:10',
            'time' => 'required',
            'kkm' => 'required|integer|min:2',
            'file' => 'required|mimes:application/pdf,application/x-pdf,ppt,pptx'
        ]);
        $module = new Module();    
        $module->name = $request->name;
        $module->description = $request->description;
        $module->exam_time = $request->time;
        $module->kkm = $request->kkm;

        // dd($request->file->store('learningmaterial'));
        $material_path = $request->file('file')->store('learningmaterial','public');
        $module->learning_material = $material_path;
        $course_id = Course::select('id')->where('name',$request->course)->get();
        $module->course_id = $course_id[0]->id;
        $module->save();
        
        return redirect('/dashboard')->with('status','Modules Added Successfully');
    }

    public function goEditPage($id){ //buat nampilin page EditModule 
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
        }
        $auth = Auth::check();
        $moduleDetail = Module::find($id);
        
        $course = Course::where('id','=',$moduleDetail->course_id)->get();
        $courseList = Course::where('name','!=',$course[0]->name)->get();
        return view('admin/edit_module',compact('course','auth','userData','moduleDetail','courseList'));
    }

    public function editModuleDetail(Request $request, $id){ //berisi validasi inputan dan buat melakukan editProduct yang akan mengupdate semua data produk yang diklik sesuai inputan admin
        $this->validate($request,[
            'name' => 'required|min:5',
            'course' => 'required',
            'description' => 'required|min:10',
            'time' => 'required',
            'kkm' => 'required|integer|min:2'
        ]);
        
        $moduleDetail = Module::find($id);
        $moduleDetail->name = $request->name;

        $course_id = Course::where('name','=',$request->course)->get();
        $moduleDetail->course_id = $course_id[0]->id;
        $moduleDetail->description = $request->description;
        $moduleDetail->exam_time = $request->time;
        $moduleDetail->kkm = $request->kkm;
        $moduleDetail->update();
        return redirect('/dashboard')->with('status','Module Updated Successfully');
    }

    public function deleteModule($id){ //buat menghapus product sesuai dengan product yang diklik
        $moduleDetail = Module::find($id);
        $moduleDetail->delete();

        return redirect('/dashboard')->with('status','Module Deleted Successfully');
    }

    public function detailLearning($id){
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
        }
        $auth = Auth::check();
        $module = Module::find($id)->get();
        return view('admin/module_detail_learning',compact('userData','auth','module','id'));
    }

    public function detailVideo($id){
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
        }
        $auth = Auth::check();
        $videoList = Video::where('module_id','=',$id)->get();
        return view('admin/module_detail_video',compact('userData','auth','videoList','id'));
    }

    public function detailAssignment($id){
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
        }
        $auth = Auth::check();
        $assignmentList = Assignment::where('module_id','=',$id)->get();
        return view('admin/module_detail_assignment',compact('userData','auth','assignmentList','id'));
    }

    public function uploadVideo(Request $request, $moduleId){
        $this->validate($request,[
            'name' => 'required|unique:videos|min:5',
            'description' => 'required|min:5',
            'reference' => '', 
            'video' => 'mimes:mp4,mov,zip'
        ]);
        $video = new Video();    
        $video->name = $request->name;
        $video->description = $request->description;
        $video->other_reference = $request->reference;

        if($request->video !=null){
            $video_path = $request->file('video')->store('video','public');
            $video->video_file = $video_path;
        }
        $video->module_id = $moduleId;
        $video->save();
        
        return redirect('/dashboard')->with('status','Video Added Successfully');
    }

    public function deleteVideo($id){ 
        $video = Video::find($id);
        $video->delete();

        return redirect('/dashboard')->with('status','Video Deleted Successfully');
    }

    public function editVideo(Request $request, $id, $moduleId){ 
        $this->validate($request,[
            'name' => 'required|unique:videos|min:5',
            'description' => 'required|min:5',
            'reference' => '', 
            'video' => 'mimes:mp4,mov,zip'
        ]);
        
        $video = Video::find($id);
        $video->name = $request->name;
        $video->description = $request->description;
        $video->other_reference = $request->reference;

        if($request->video !=null){
            $video_path = $request->file('video')->store('video','public');
            $video->video_file = $video_path;
        }
        $video->module_id = $moduleId;
        $video->update();
        return redirect('/dashboard')->with('status','Video Updated Successfully');
    }

    public function uploadAssignment(Request $request, $moduleId){
        $this->validate($request,[
            'title' => 'required|unique:assignments|min:5',
            'description' => 'required|min:5',
            'start_date' => 'required', 
            'end_date' => 'required',
            'assignment_file' => 'required|mimes:docx,ppt,doc,pptx,'
        ]);
        $assignment = new Assignment();    
        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->start_date = $request->start_date;
        $assignment->end_date = $request->end_date;

        $assignment_path = $request->file('assignment_file')->store('assignment','public');
        $assignment->assignment_file = $assignment_path;
        $assignment->module_id = $moduleId;
        $assignment->save();
        
        return redirect('/dashboard')->with('status','Assignment Added Successfully');
    }

    public function deleteAssignment($id){ 
        $assignment = Assignment::find($id);
        $assignment->delete();

        return redirect('/dashboard')->with('status','Assignment Deleted Successfully');
    }

    public function editAssignment(Request $request, $id, $moduleId){ 
        $this->validate($request,[
            'title' => 'required|unique:assignments|min:5',
            'description' => 'required|min:5',
            'start_date' => 'required', 
            'end_date' => 'required',
            'file' => 'required|mimes:docx,ppt,doc,pptx,'
        ]);
        
        $assignment = Assignment::find($id);
        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->start_date = $request->start_date;
        $assignment->end_date = $request->end_date;


        $assignment_path = $request->file('file')->store('assignment','public');
        $assignment->assignment_file = $assignment_path;
        $assignment->module_id = $moduleId;
        $assignment->update();
        return redirect('/dashboard')->with('status','Assignment Updated Successfully');
    }

    public function getAssignmentDetailPage($id){
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
        }
        $auth = Auth::check();
        $assignmentDetail = Assignment::find($id);
        $completedMenteeList = DB::table('submitted_assignments')
        ->join('mentees','submitted_assignments.mentee_id','=','mentees.id')
        ->select('submitted_assignments.id','submitted_assignments.file','mentees.name','submitted_assignments.score')
        ->where('submitted_assignments.assignment_id','=',$id)->get();                        
        return view('assignment_detail',compact('userData','auth','assignmentDetail','completedMenteeList'));
    }
    
    public function rateAssignment(Request $request,$id){
        $this->validate($request,[
            'score' => 'required|integer'
        ]);
        $submittedAssignment = SubmittedAssignment::find($id);
        $submittedAssignment->score = $request->score;
        $submittedAssignment->update();
        return redirect('/dashboard')->with('status','Assignment Rated Successfully');
    }
}