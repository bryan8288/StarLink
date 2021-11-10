<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\Mentee;
use App\Admin;
use App\DiscussionAdmin;
use App\User;

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
            ->select('mentees.name','mentees.id','mentees.birth_date','mentees.gender','users.email','mentees.phone','mentees.birth_place','mentees.address','mentees.portofolio','mentees.cv','mentees.profile_picture')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('mentors.name','mentors.id','mentors.birth_date','mentors.gender','users.email','mentors.phone','mentors.birth_place','mentors.address','mentors.profile_picture')
            ->where('users.id','=',Auth::id())
            ->get();
        }

        $auth = Auth::check();
        return view('discussionRoom',compact('auth','userData'));
    }

    public function showadmin(){
        
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('discussion_admins')
            ->join('admins','admins.id','=','discussion_admins.id')
            ->select('admins.id','discussion_admins.url')
            ->where('admins.id','=',Auth::id())
            ->get();
        }

        $auth = Auth::check();
        $discussAdmin = DiscussionAdmin::all();

        return view('/admin/discussAdmin',compact('auth','userData','discussAdmin'));
    }

    public function edit(Request $request, $id){ //berisi validasi inputan dan buat melakukan editProduct yang akan mengupdate semua data produk yang diklik sesuai inputan admin
        $this->validate($request,[
            'url' => 'required'
        ]);

        if(Auth::user()->role == 'admin'){
            
            $discussAdmin = DiscussionAdmin::find($id);
            $discussAdmin->url = $request->url;
            dd($discussAdmin);
            $discussAdmin->update();
        }
        
        return redirect('/admin/discussAdmin')->with('status','Discussion Room Updated Successfully');
    }
}
