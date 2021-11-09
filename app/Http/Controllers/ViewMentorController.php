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
            ->get();
        }
        $auth = Auth::check();
        $mentor = Mentor::paginate(3);
        return view('admin/view_mentor',compact('auth','mentor','userData'));
    }

    public function getProductbySearch(Request $request){ //buat nampilin hasil searching sesuai keyword yang diinput user (keyword akan dicocokkan dengan nama product)
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->get();
        }
        $auth = Auth::check();
        $mentor = Mentor::where('name','like',"%{$request->keyword}%")->paginate(3);
        return view('admin/view_mentor',compact('userData','mentor','auth'));
    }

    // public function goEditPage($id){ //buat nampilin page EditProduct
    //     if(Auth::user()->role == 'admin'){
    //         $userData = DB::table('users')
    //         ->join('admins','users.id','=','admins.user_id')
    //         ->select('users.username','admins.profile_picture')
    //         ->get();
    //     }
    //     $auth = Auth::check();
    //     $mentorDetail = Mentor::find($id);
    //     //$userData[0]->birth_date;
    //     return view('admin/edit_mentor',compact('mentorDetail','auth','userData'));
    // }

    // public function editMentorDetail(Request $request, $id){ //berisi validasi inputan dan buat melakukan editProduct yang akan mengupdate semua data produk yang diklik sesuai inputan admin
    //     $this->validate($request,[
    //         'user_id' => 'required|integer|min:1',
    //         'name' => 'required|min:5',
    //         'address' => 'required',
    //         'phone' => 'required',
    //         'birth_date' => 'required',
    //         'birth_place' => 'required',
    //         'gender' => 'required',
    //         'profile_picture' => 'required'
    //     ]);

    //     $mentorDetail= Mentor::find($id);
    //     $mentorDetail->user_id = $request->user_id;
    //     $mentorDetail->name = $request->name;
    //     $mentorDetail->address = $request->address;
    //     $mentorDetail->phone = $request->phone;
    //     $mentorDetail->birth_date = $request->birth_date;
    //     $mentorDetail->birth_place = $request->birth_place;
    //     $mentorDetail->gender = $request->gender;
    //     $mentorDetail->profile_picture = $request->profile_picture;
    //     $mentorDetail->update();
    //     return redirect('/dashboard')->with('status','Mentor Updated Successfully');
    // }

    public function deleteMentor($id){ //buat menghapus product sesuai dengan product yang diklik
        $mentorDetail = Mentor::find($id);
        $mentorDetail->delete();

        return redirect('/dashboard')->with('status','Mentor Deleted Successfully');
    }

    public function getAddMentorPage(){ //buat nampilin page AddProduct dan list semua stationary_type
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->get();
        }
        $auth = Auth::check();


        //function buat fitur class schedule
        // $today = new Carbon('2020-06-11'); // isi date today (Carbon::now())
        // $weekStartDate = $today->startOfWeek()->format('Y-m-d');
        // $date = Carbon::createFromDate($weekStartDate);
        // $daysToAdd = 7; // -> nanti lempar 0 - 5 (yg dimana dapat dari db) -> monday itu 0 -> sunday itu 6
        // // note : harusny datany cmn simpan day_of_week ( 0 - 5 -> monday - saturday )
        // $date = $date->addDays($daysToAdd)->format('Y-m-d');
        // dd($date);
        //

        return view('admin/add_mentor',compact('auth','userData'));
    }

    public function addMentor(Request $request){ //buat validasi inputan dan untuk menambahkan produk baru kedalam database sesuai inputan admin
        $auth = Auth::check();
        $this->validate($request,[
            'name' => 'required|min:5',
            'address' => 'required',
            'phone' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'gender' => 'required',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
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
