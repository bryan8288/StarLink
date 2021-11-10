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


        //function buat fitur class schedule
        // $today = new Carbon('2020-06-11'); // isi date today (Carbon::now())
        // $weekStartDate = $today->startOfWeek()->format('Y-m-d');
        // $date = Carbon::createFromDate($weekStartDate);
        // $daysToAdd = 7; // -> nanti lempar 0 - 5 (yg dimana dapat dari db) -> monday itu 0 -> sunday itu 6
        // // note : harusny datany cmn simpan day_of_week ( 0 - 5 -> monday - saturday )
        // $date = $date->addDays($daysToAdd)->format('Y-m-d');
        // dd($date);
        //

        //'requestedMentoringDetail','menteeId','requestedMentoringList'

        return view('admin/add_requestedmentoring',compact('auth','userData',));

    }

    public function addRequestedMentoring(Request $request){ //buat validasi inputan dan untuk menambahkan produk baru kedalam database sesuai inputan admin
        $auth = Auth::check();
        $this->validate($request,[
            'mentee_id' => 'required',
            'name' => 'required',
        ]);

        // $menteeName = Mentor::find($courseDetail->mentor_id);
        // $mentorList = Mentor::where('name','!=',$mentorName->name)->get();



        $requestedmentoring = new RequestedMentoring();
        $requestedmentoring->mentee_id = $request->mentee_id;
        $requestedmentoring->name = $request->name;

        // $menteeId = Mentee::select('id')->where('mentee_id',$request->mentee_id)->get();
        // $requestedmentoring->mentee_id = $menteeId[0]->id;
        $requestedmentoring->save();

        return redirect('/dashboard')->with('status','Requested Mentoring Added Successfully');
    }
}
