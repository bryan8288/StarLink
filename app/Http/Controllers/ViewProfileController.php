<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mentor;
use App\Mentee;
use App\Company;
use App\Admin;

class ViewProfileController extends Controller
{
    public function show(){
        
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('admins.name','admins.id','users.username','admins.birth_date','admins.gender','users.email','admins.phone','admins.birth_place','admins.address','admins.profile_picture')
            ->get();
        }
        if(Auth::user()->role == 'mentee'){
            $userData = DB::table('users')
            ->join('mentees','users.id','=','mentees.user_id')
            ->select('mentees.name','mentees.id','mentees.birth_date','mentees.gender','users.email','mentees.phone','mentees.birth_place','mentees.address','mentees.portofolio','mentees.cv','mentees.profile_picture')
            ->get();
        }
        if(Auth::user()->role == 'mentor'){
            $userData = DB::table('users')
            ->join('mentors','users.id','=','mentors.user_id')
            ->select('mentors.name','mentors.id','mentors.birth_date','mentors.gender','users.email','mentors.phone','mentors.birth_place','mentors.address','mentors.profile_picture')
            ->get();
        }
        if(Auth::user()->role == 'company'){
            $userData = DB::table('users')
            ->join('companies','users.id','=','companies.user_id')
            ->select('companies.name','companies.id','companies.address','companies.phone','companies.profile_picture')
            ->get();
        }
 
        $age = Carbon::parse($userData[0]->birth_date)->diff(Carbon::now())->y;
        $auth = Auth::check();
        return view('profile',compact('auth','userData','age'));
    }

    public function edit(Request $request, $id){ //berisi validasi inputan dan buat melakukan editProduct yang akan mengupdate semua data produk yang diklik sesuai inputan admin
        // dd(Auth::user()->role);
        $this->validate($request,[
            'name' => 'required|min:4',
            'address' => 'required|min:20',
            'phone' => 'required|integer|min:20',
            'birth_date' => 'required',
            'birth_place' => 'required|min:10',
            'gender' => 'required',
            'age' => 'required|integer',
            'email' => 'required|integer|min:13',
            'cv' => '',
            'portofolio' => ''
        ]);

        if(Auth::user()->role == 'mentee'){
            $profileDetail = Mentee::find($id);
            $profileDetail->name = $request->name;
            $profileDetail->address = $request->address;
            $profileDetail->phone = $request->phone;
            $profileDetail->birth_date = $request->birth_date;
            $profileDetail->birth_place = $request->birth_place;
            $profileDetail->gender = $request->gender;
            // $profileDetail->profile_picture = $request->profile_picture;
            // $profileDetail->portofolio = $request->portofolio;
            // $profileDetail->cv = $request->cv;
            // $profileDetail->email = $request->email;
            $profileDetail->update();
        }
        if(Auth::user()->role == 'mentor'){
            $profileDetail = Mentor::find($id);
            $profileDetail->name = $request->name;
            $profileDetail->address = $request->address;
            $profileDetail->phone = $request->phone;
            $profileDetail->birth_date = $request->birth_date;
            $profileDetail->birth_place = $request->birth_place;
            $profileDetail->gender = $request->gender;
            // $profileDetail->profile_picture = $request->profile_picture;
            // $profileDetail->email = $request->email;
            $profileDetail->update();
        }
        if(Auth::user()->role == 'company'){
            $profileDetail = Company::find($id);
            $profileDetail->name = $request->name;
            $profileDetail->phone = $request->phone;
            $profileDetail->address = $request->address;
            // $profileDetail->username = $request->username;
            $profileDetail->update();
        }
        if(Auth::user()->role == 'admin'){
            $profileDetail = Admin::find($id);
            $profileDetail->name = $request->name;
            $profileDetail->address = $request->address;
            $profileDetail->phone = $request->phone;
            $profileDetail->birth_date = $request->birth_date;
            $profileDetail->birth_place = $request->birth_place;
            $profileDetail->gender = $request->gender;
            // $profileDetail->profile_picture = $request->profile_picture;
            // $profileDetail->email = $request->email;
            $profileDetail->update();
        }
        return redirect('dashboard')->with('status','Profile Updated Successfully');
    }
}
