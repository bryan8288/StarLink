<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewCompanyController extends Controller
{
    public function getCompanyList(){
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        $company = Company::paginate(3);
        return view('admin/view_company',compact('auth','company','userData'));
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
        $company = Company::where('name','like',"%{$request->keyword}%")->paginate(3);
        return view('admin/view_company',compact('userData','company','auth'));
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
        $companyDetail = Company::find($id);
        return view('admin/edit_company',compact('companyDetail','auth','userData'));
    }

    public function editCompany(Request $request, $id){ 
        $this->validate($request,[
            'name' => 'required|min:5',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $companyDetail = Company::find($id);
        $companyDetail->name = $request->name;
        $companyDetail->address = $request->address;
        $companyDetail->phone = $request->phone;
        $companyDetail->update();
        return redirect('/editCompany/'.$id)->with('status','Company Updated Successfully');
    }

    public function deleteCompany($id){ 
        $courseDetail = Company::find($id);
        $courseDetail->delete();

        return redirect('/company')->with('status','Company Deleted Successfully');
    }

    public function getAddCompanyPage(){ 
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.name','admins.profile_picture','admins.id')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();

        return view('admin/add_company',compact('auth','userData'));
    }

    public function addCompany(Request $request){ 
        $auth = Auth::check();
        $this->validate($request,[
            'name' => 'required|min:5',
            'address' => 'required',
            'phone' => 'required',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'company';
        $user->save();

        $company = new Company();
        $company->user_id = $user->id;
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;

        $profilepicture_path = $request->file('profile_picture')->store('image','public');
        $company->profile_picture = $profilepicture_path;

        $company->save();

        return redirect('/dashboard')->with('status','Company Added Successfully');
    }
}
