<?php

namespace App\Http\Controllers;

use App\Mentee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewMenteeController extends Controller
{
    public function getMenteeList(){
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $mentee = Mentee::paginate(3);
        return view('admin/view_mentee',compact('auth','mentee','userData'));
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
        $mentee = Mentee::where('name','like',"%{$request->keyword}%")->paginate(3);
        return view('admin/view_mentee',compact('userData','mentee','auth'));
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
        $mentee = Mentee::find($id);

        return view('admin/edit_mentee',compact('userData','mentee','auth'));
    }

    public function editMentee(Request $request , $id){
        $this->validate($request,[
            'name' => 'required|min:4',
            'address' => 'required|min:20',
            'phone' => 'required|min:10',
            'birth_date' => 'required',
            'birth_place' => 'required|min:4',
            'gender' => 'required',
        ]);

        $mentee = Mentee::find($id);
        $mentee->name = $request->name;
        $mentee->address = $request->address;
        $mentee->phone = $request->phone;
        $mentee->birth_date = $request->birth_date;
        $mentee->birth_place = $request->birth_place;
        $mentee->gender = $request->gender;
        $mentee->save();

        return redirect('/editMentee/'.$id)->with('status','Profile Updated Successfully');
    }

    public function deleteMentee($id){
        $mentee = Mentee::find($id);
        $mentee->delete();

        return redirect('/mentee')->with('status','Mentee Deleted Successfully');
    }
}