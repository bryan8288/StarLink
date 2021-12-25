<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\AssignmentChecklist;
use App\Course;
use App\LearningChecklist;
use App\Module;
use App\ProgressMentee;
use App\SubmittedAssignment;
use App\Video;
use App\VideoChecklist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function getAddModulePage($courseId){ 
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
        $courseList = Course::where('id','!=',$courseId)->get();
        $chosenCourse = Course::find($courseId);
        return view('admin/add_module',compact('auth','userData','courseList','chosenCourse'));
    }
    
    public function addModule(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:modules|min:5',
            'course' => 'required',
            'description' => 'required|min:10',
            'kkm' => 'required|integer|min:2',
            'file' => 'required|mimes:application/pdf,application/x-pdf,ppt,pptx'
        ]);
        $module = new Module();    
        $module->name = $request->name;
        $module->description = $request->description;
        $module->kkm = $request->kkm;

        $material_path = $request->file('file')->store('learningmaterial','public');
        $module->learning_material = $material_path;
        $course_id = Course::select('id')->where('name',$request->course)->get();
        $module->course_id = $course_id[0]->id;
        $module->save();
        
        return redirect('/dashboard')->with('status','Modules Added Successfully');
    }

    public function goEditPage($id){ 
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
        $moduleDetail = Module::find($id);
        
        $course = Course::where('id','=',$moduleDetail->course_id)->get();
        $courseList = Course::where('name','!=',$course[0]->name)->get();
        return view('admin/edit_module',compact('course','auth','userData','moduleDetail','courseList'));
    }

    public function editModuleDetail(Request $request, $id){
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

    public function deleteModule($id){ 
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
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $module = Module::find($id)->get();

        $checkModule = DB::table('learning_checklists')
        ->where('learning_checklists.module_id','=',$id)
        ->where('learning_checklists.mentee_id','=',$userData[0]->id)
        ->where('learning_checklists.status','=','Completed')->get();

        if($checkModule->count()>0){
            $isCompleted = true;
        }else $isCompleted = false;

        return view('admin/module_detail_learning',compact('userData','auth','module','id','isCompleted'));
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
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $videoList = Video::where('module_id','=',$id)->get();

        if(Auth::user()->role == 'mentee'){
            foreach ($videoList as $key) {
                $checkModule = DB::table('video_checklists')
                ->where('video_checklists.video_id','=',$key->id)
                ->where('video_checklists.mentee_id','=',$userData[0]->id)
                ->where('video_checklists.status','=','Completed')->get();

                if($checkModule->count()>0){
                    $key->isCompleted = true;
                }else $key->isCompleted = false;
            }
        }

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
        }else if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $assignmentList = Assignment::where('module_id','=',$id)->get();

        if(Auth::user()->role == 'mentee'){

            foreach ($assignmentList as $key) {
            $submitted = DB::table('submitted_assignments')->select(DB::raw('count(1) as count'))
                            ->where('assignment_id','=',$key->id)
                            ->where('mentee_id','=',$userData[0]->id)->get();
    
            if($submitted[0]->count == 0){
                $isSubmitted = false;
            }else $isSubmitted = true;

            $key->isSubmitted = $isSubmitted;
            }
        }

        return view('admin/module_detail_assignment',compact('userData','auth','assignmentList','id'));
    }

    public function uploadVideo(Request $request, $moduleId){
        $this->validate($request,[
            'name' => 'required|unique:videos|min:5',
            'description' => 'required|min:5',
            'reference' => '', 
            'video_file' => 'mimes:mp4,mov,ogg'
        ]);
        $video = new Video();    
        $video->name = $request->name;
        $video->description = $request->description;
        $video->other_reference = $request->reference;
        if($request->file('video_file') !=null){
            $video_path = $request->file('video_file')->store('video','public');
            $video->video_file = $video_path;
        }
        $video->module_id = $moduleId;
        $video->save();
        
        return redirect('/moduleDetailVideo/'.$moduleId)->with('status','Video Added Successfully');
    }

    public function deleteVideo($id){ 
        $moduleId = DB::table('videos')
        ->select('videos.module_id')
        ->where('videos.id',"=",$id)->get()[0]->module_id;
        $video = Video::find($id);
        $video->delete();

        return redirect('/moduleDetailVideo/'.$moduleId)->with('status','Video Deleted Successfully');
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
        return redirect('/moduleDetailVideo/'.$moduleId)->with('status','Video Updated Successfully');
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
        
        return redirect('/moduleDetailAssignment/'.$moduleId)->with('status','Assignment Added Successfully');
    }

    public function deleteAssignment($id){ 
        $moduleId = DB::table('assigments')
        ->select('assigments.module_id')
        ->where('assigments.id',"=",$id)->get()[0]->module_id;
        $assignment = Assignment::find($id);
        $assignment->delete();

        return redirect('/moduleDetailAssignment/'.$moduleId)->with('status','Assignment Deleted Successfully');
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
        return redirect('/moduleDetailAssignment/'.$moduleId)->with('status','Assignment Updated Successfully');
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
            'score' => 'required|integer|max:100'
        ]);
        $submittedAssignment = SubmittedAssignment::find($id);
        $submittedAssignment->score = $request->score;
        $submittedAssignment->update();
        return redirect('/assignmentDetail/'.$submittedAssignment->assignment_id)->with('status','Assignment Rated Successfully');
    }

    public function editRateAssignment(Request $request, $id){
        $this->validate($request,[
            'score' => 'required|integer|max:100'
        ]);
        $submittedAssignment = SubmittedAssignment::find($id);
        $submittedAssignment->score = $request->score;
        $submittedAssignment->update();
        return redirect('/assignmentDetail/'.$submittedAssignment->assignment_id)->with('status','Assignment Edited Successfully');
    }

    public function submitAssignment(Request $request, $assignmentId, $moduleId){
        $this->validate($request,[
            'assignment_file' => 'required'
        ]);

        $userData = DB::table('users')
        ->join('mentees','users.id','=','mentees.user_id')
        ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
        ->where('users.id','=',Auth::id())
        ->get();

        $doneAssignment = new AssignmentChecklist();
        $doneAssignment->assignment_id = $assignmentId;
        $doneAssignment->mentee_id = $userData[0]->id;
        $doneAssignment->status = 'Completed';
        $doneAssignment->save();

        $submittedAssignment = new SubmittedAssignment();
        $submittedAssignment->mentee_id = $userData[0]->id;
        $submittedAssignment->assignment_id = $assignmentId;

        $assignment_path = $request->file('assignment_file')->store('submittedassignment','public');
        $submittedAssignment->file = $assignment_path;

        $submittedAssignment->uploaded_date = date('Y-m-d');
        $submittedAssignment->save();
        return redirect('/moduleDetailAssignment/'.$moduleId)->with('status','Assignment Submitted Successfully');
    }

    public function doneLearning($moduleId){
        $userData = DB::table('users')
        ->join('mentees','users.id','=','mentees.user_id')
        ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
        ->where('users.id','=',Auth::id())
        ->get();

        $done = new LearningChecklist();
        $done->mentee_id = $userData[0]->id;
        $done->module_id = $moduleId;
        $done->status = 'Completed';
        $done->save();

        $countLearningComplete = DB::table('learning_checklists')->where('learning_checklists.mentee_id','=',$userData[0]->id)->where('learning_checklists.status','=','Completed')->where('learning_checklists.module_id','=',$moduleId)->count();
        
        $countAssignmentComplete = DB::table('assignment_checklists')
        ->join('assignments','assignment_checklists.assignment_id','assignments.id')
        ->where('assignment_checklists.mentee_id','=',$userData[0]->id)
        ->where('assignments.module_id','=',$moduleId)
        ->where('assignment_checklists.status','=','Completed')->count();

        $countVideoComplete = DB::table('video_checklists')
        ->join('videos','video_checklists.video_id','videos.id')
        ->where('video_checklists.mentee_id','=',$userData[0]->id)
        ->where('videos.module_id','=',$moduleId)
        ->where('video_checklists.status','=','Completed')->count();

        $countProgressMentee = $countLearningComplete + $countAssignmentComplete + $countVideoComplete;

        $countModuleComponent = DB::table('modules')
        ->join('videos','videos.module_id','=','modules.id')
        ->join('assignments','assignments.module_id','=','modules.id')
        ->select(DB::raw('count(DISTINCT assignments.id) as countAssignment'),DB::raw('count(DISTINCT videos.id) as countVideo'))
        ->where('modules.id','=',$moduleId)->get();

        $countModuleComponent[0]->countLearning = 1;

        $countTotalComponentModule = $countModuleComponent[0]->countAssignment + $countModuleComponent[0]->countVideo + $countModuleComponent[0]->countLearning;

        if($countProgressMentee == $countTotalComponentModule){
            $progressMenteeId = DB::table('progress_mentees')
            ->select('progress_mentees.id')
            ->where('progress_mentees.mentee_id','=',$userData[0]->id)
            ->where('progress_mentees.module_id','=',$moduleId)->get();
            if($progressMenteeId->count()>0){
               $progressMentee = ProgressMentee::find($progressMenteeId[0]->id); 
               $progressMentee->status = 'Completed';
               $progressMentee->update();
            }
        }

        return redirect('/moduleDetailLearning/'.$moduleId)->with('status','Learning Data Saved Successfully');
    }

    public function doneVideo($moduleId,$videoId){
        $userData = DB::table('users')
        ->join('mentees','users.id','=','mentees.user_id')
        ->select('users.username','mentees.name','mentees.profile_picture','mentees.id')
        ->where('users.id','=',Auth::id())
        ->get();

        $done = new VideoChecklist();
        $done->mentee_id = $userData[0]->id;
        $done->video_id = $videoId;
        $done->status = 'Completed';
        $done->save();

        $countLearningComplete = DB::table('learning_checklists')->where('learning_checklists.mentee_id','=',$userData[0]->id)->where('learning_checklists.status','=','Completed')->count();
        
        $countAssignmentComplete = DB::table('assignment_checklists')->where('assignment_checklists.mentee_id','=',$userData[0]->id)->where('assignment_checklists.status','=','Completed')->count();

        $countVideoComplete = DB::table('video_checklists')->where('video_checklists.mentee_id','=',$userData[0]->id)->where('video_checklists.status','=','Completed')->count();

        $countProgressMentee = $countLearningComplete + $countAssignmentComplete + $countVideoComplete;

        $countModuleComponent = DB::table('modules')
        ->join('videos','videos.module_id','=','modules.id')
        ->join('assignments','assignments.module_id','=','modules.id')
        ->select(DB::raw('count(DISTINCT assignments.id) as countAssignment'),DB::raw('count(DISTINCT videos.id) as countVideo'))
        ->where('modules.id','=',$moduleId)->get();

        $countModuleComponent[0]->countLearning = 1;

        $countTotalComponentModule = $countModuleComponent[0]->countAssignment + $countModuleComponent[0]->countVideo + $countModuleComponent[0]->countLearning;

        if($countProgressMentee == $countTotalComponentModule){
            $progressMenteeId = DB::table('progress_mentees')
            ->select('progress_mentees.id')
            ->where('progress_mentees.mentee_id','=',$userData[0]->id)
            ->where('progress_mentees.module_id','=',$moduleId)->get();
            if($progressMenteeId->count()>0){
               $progressMentee = ProgressMentee::find($progressMenteeId[0]->id); 
               $progressMentee->status = 'Completed';
               $progressMentee->update();
            }
        }

        return redirect('/moduleDetailVideo/'.$moduleId)->with('status','Video Data Saved Successfully');
    }

}