<?php

namespace App\Http\Controllers;

use App\Mentee;
use App\User;
use App\RequestedMentoring;
use App\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RequestedMentoringController extends Controller
{

    public function getAddRequestedMentoringPage(){ //buat nampilin page AddProduct dan list semua stationary_type
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();

        // $requestedMentoringDetail = RequestedMentoring::find($id);
        // $menteeId = RequestedMentoring::find($requestedMentoringDetail->mentee_id);
        // $requestedMentoringList = RequestedMentoring::where('mentee_id','!=',$menteeId->id)->get();

        $menteeList =Mentee::all();

        return view('admin/add_requestedmentoring',compact('auth','userData','menteeList'));

    }

    public function addRequestedMentoring(Request $request){ //buat validasi inputan dan untuk menambahkan produk baru kedalam database sesuai inputan admin
        $auth = Auth::check();
        $this->validate($request,[
            'mentee' => 'required',
            'name' => 'required',
        ]);

        $requestedmentoring = new RequestedMentoring();
        $mentee_id = Mentee::select('id')->where('name',$request->mentee)->get()[0]->id;

        $requestedmentoring->mentee_id = $mentee_id;
        $requestedmentoring->name = $request->name;

        $requestedmentoring->save();

        return redirect('/dashboard')->with('status','Requested Mentoring Added Successfully');
    }
}
