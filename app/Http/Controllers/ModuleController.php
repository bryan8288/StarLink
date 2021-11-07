<?php

namespace App\Http\Controllers;

use App\Course;
use App\Mentor;
use App\Module;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function getAddModulePage(){ //buat nampilin page AddModule 
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.profile_picture')
            ->get();
        }
        $auth = Auth::check();
        $courseList = Course::all();
        return view('admin/add_module',compact('auth','userData','courseList'));
    }
    
    public function addModule(Request $request){ //buat validasi inputan dan untuk menambahkan produk baru kedalam database sesuai inputan admin
        $auth = Auth::check();
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
            ->select('users.username','admins.profile_picture')
            ->get();
        }
        $auth = Auth::check();
        $moduleDetail = Module::find($id);
        // dd($mentorList);
        
        $course = Course::where('id','=',$moduleDetail->course_id)->get();
        // dd($course[0]->name);
        $courseList = Course::where('name','!=',$course[0]->name)->get();
        return view('admin/edit_module',compact('course','auth','userData','moduleDetail','courseList'));
    }

    public function editCourseDetail(Request $request, $id){ //berisi validasi inputan dan buat melakukan editProduct yang akan mengupdate semua data produk yang diklik sesuai inputan admin
        $this->validate($request,[
            'name' => 'required|min:5',
            'course' => 'required|min:10',
            'description' => 'required|min:10',
            'price' => 'required|integer|min:5001',
            'time' => 'required|integer|min:1',
            'kkm' => 'required|integer|min:2'
        ]);
        
        $courseDetail = Course::find($id);
        $courseDetail->name = $request->name;
        $courseDetail->category = $request->category;
        $courseDetail->description = $request->description;
        $courseDetail->price = $request->price;
        $courseDetail->weeks = $request->weeks;
        $courseDetail->kkm = $request->kkm;
        $courseDetail->update();
        return redirect('/dashboard')->with('status','Course Updated Successfully');
    }

    public function deleteCourse($id){ //buat menghapus product sesuai dengan product yang diklik
        $courseDetail = Course::find($id);
        $courseDetail->delete();

        return redirect('/dashboard')->with('status','Course Deleted Successfully');
    }
}