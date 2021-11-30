<?php

namespace App\Http\Controllers;

use App\Mentor;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewMentorController extends Controller
{
    public function getMentorList(){
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $mentor = Mentor::paginate(3);
        return view('admin/view_mentor',compact('auth','mentor','userData'));
    }

    public function getProductbySearch(Request $request){ 
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $mentor = Mentor::where('name','like',"%{$request->keyword}%")->paginate(3);
        return view('admin/view_mentor',compact('userData','mentor','auth'));
    }

    public function goEditPage($id){ 
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $mentorDetail = Mentor::find($id);
        return view('admin/edit_mentor',compact('mentorDetail','auth','userData'));
    }

    public function editMentor(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:4',
            'address' => 'required|min:20',
            'phone' => 'required|min:10',
            'birth_date' => 'required',
            'birth_place' => 'required|min:4',
            'gender' => 'required',
        ]);

        $mentorDetail= Mentor::find($id);
        $mentorDetail->name = $request->name;
        $mentorDetail->address = $request->address;
        $mentorDetail->phone = $request->phone;
        $mentorDetail->birth_date = $request->birth_date;
        $mentorDetail->birth_place = $request->birth_place;
        $mentorDetail->gender = $request->gender;
        $mentorDetail->update();
        return redirect('/editMentor/'.$id)->with('status','Mentor Updated Successfully');
    }

    public function deleteMentor($id){
        $mentorDetail = Mentor::find($id);
        $mentorDetail->delete();

        return redirect('/mentor')->with('status','Mentor Deleted Successfully');
    }

    public function getAddMentorPage(){ 
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();

        return view('admin/add_mentor',compact('auth','userData'));
    }

    public function addMentor(Request $request){ 
        $this->validate($request,[
            'name' => 'required|min:5',
            'address' => 'required',
            'phone' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'gender' => 'required',
            'profile_picture' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'mentor';
        $user->save();

        $mentor = new Mentor();
        $mentor->user_id = $user->id;
        $mentor->name = $request->name;
        $mentor->address = $request->address;
        $mentor->phone = $request->phone;
        $mentor->birth_date = $request->birth_date;
        $mentor->birth_place = $request->birth_place;
        $mentor->gender = $request->gender;

        $profilepicture_path = $request->file('profile_picture')->store('image','public');
        $mentor->profile_picture = $profilepicture_path;
        $mentor->save();

        return redirect('/dashboard')->with('status','Mentor Added Successfully');
    }
}
