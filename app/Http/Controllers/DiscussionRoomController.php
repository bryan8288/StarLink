<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\DiscussionAdmin;
use App\DiscussionMentor;

class DiscussionRoomController extends Controller
{
    public function show(){
        
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('admins.name','admins.id','users.username','admins.birth_date','admins.gender','users.email','admins.phone','admins.birth_place','admins.address','admins.profile_picture')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('users.username','mentees.name','mentees.id','mentees.birth_date','mentees.gender','users.email','mentees.phone','mentees.birth_place','mentees.address','mentees.portofolio','mentees.cv','mentees.profile_picture')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('users.username','mentors.name','mentors.id','mentors.birth_date','mentors.gender','users.email','mentors.phone','mentors.birth_place','mentors.address','mentors.profile_picture')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $AdminRoomData = DB::table('discussion_admins')
        ->join('admins', 'discussion_admins.admin_id','=','admins.id')
        ->select('discussion_admins.url', 'admins.name','discussion_admins.id')
        ->get();
        $MentorRoomData = DB::table('discussion_mentors')
        ->join('mentors', 'discussion_mentors.mentor_id','=','mentors.id')
        ->select('discussion_mentors.url', 'mentors.name','discussion_mentors.id','mentors.id as mentorId')
        ->get();
        
        $clockAdmin = DB::table('discussion_admins')
        ->join('admins', 'discussion_admins.admin_id','=','admins.id')
        ->select('discussion_admins.url', 'admins.name','discussion_admins.start_time', 'discussion_admins.end_time')
        ->get();

        $clockMentor = DB::table('discussion_mentors')
        ->join('mentors', 'discussion_mentors.mentor_id','=','mentors.id')
        ->select('discussion_mentors.url', 'mentors.name','discussion_mentors.start_time', 'discussion_mentors.end_time', 'discussion_mentors.id','mentors.id as mentorId')
        ->get();

        $mentorList= Mentor::all();
        $auth = Auth::check();
        return view('discussionRoom',compact('auth','userData','AdminRoomData','MentorRoomData','clockAdmin','clockMentor','mentorList'));
    }

    public function showadmin(){
        
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('admins.name','admins.id','admins.profile_picture','users.username')
            ->where('users.id','=',Auth::id())
            ->get();

        }
        $AdminRoomData = DB::table('discussion_admins')
        ->join('admins', 'discussion_admins.admin_id','=','admins.id')
        ->select('discussion_admins.url', 'admins.name','discussion_admins.id')
        ->where('admins.id','=',$userData[0]->id)
        ->get();
        $MentorRoomData = DB::table('discussion_mentors')
        ->join('mentors', 'discussion_mentors.mentor_id','=','mentors.id')
        ->select('discussion_mentors.url', 'mentors.name','discussion_mentors.id','mentors.id as mentorId')
        ->get();
        
        $clockAdmin = DB::table('discussion_admins')
        ->join('admins', 'discussion_admins.admin_id','=','admins.id')
        ->select('discussion_admins.url', 'admins.name','discussion_admins.start_time', 'discussion_admins.end_time')
        ->where('admins.id','=',$userData[0]->id)
        ->get();

        $clockMentor = DB::table('discussion_mentors')
        ->join('mentors', 'discussion_mentors.mentor_id','=','mentors.id')
        ->select('discussion_mentors.url', 'mentors.name','discussion_mentors.start_time', 'discussion_mentors.end_time', 'discussion_mentors.id','mentors.id as mentorId')
        ->get();

        $mentorList= Mentor::all();

        $auth = Auth::check();
        return view('/admin/discussAdmin',compact('auth','userData','AdminRoomData','MentorRoomData','clockAdmin','clockMentor','mentorList'));
    }

    public function edit(Request $request, $id){
        $this->validate($request,[
            'url' => 'required'
        ]);

        if(Auth::user()->role == 'admin'){
            
            $discussAdmin = DiscussionAdmin::find($id);
            $discussAdmin->url = $request->url;

            $discussAdmin->update();
        }
        
        return redirect('/dashboard')->with('status','Discussion Room Updated Successfully');
    }
    public function editMentor(Request $request){ 
        $this->validate($request,[
            'url' => 'required',
            'id' =>'required',
            'mentor' => 'required'
        ]);
        $input = $request->all();
        $input['url']=$request->input('url');
        $input['id']=$request->input('id');
        $input['mentor']=$request->input('mentor');

        $count = count($input['id']);
        for ($i=0; $i <= $count-1; $i++) { 
            $discussMentor = DiscussionMentor::find($input['id'][$i]);
            $discussMentor->url = $input['url'][$i];
            $mentorId = Mentor::where('name','=',$input['mentor'][$i])->get();
            $discussMentor->mentor_id = $mentorId[0]->id;
            $discussMentor->update();
        }
        return redirect('/dashboard')->with('status','Discussion Room Updated Successfully');
    }
}
