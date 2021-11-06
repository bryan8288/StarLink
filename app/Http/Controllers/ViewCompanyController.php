<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewCompanyController extends Controller
{
    public function getCompanyList(){
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.profile_picture')
            ->get();
        }
        $auth = Auth::check();
        $company = Company::paginate(3);
        return view('admin/view_company',compact('auth','company','userData'));
    }

    public function getProductbySearch(Request $request){ //buat nampilin hasil searching sesuai keyword yang diinput user (keyword akan dicocokkan dengan nama product)
        if(Auth::user()->role == 'admin'){
            $userData = DB::table('users')
            ->join('admins','users.id','=','admins.user_id')
            ->select('users.username','admins.profile_picture')
            ->get();
        }
        $auth = Auth::check();
        $company = Company::where('name','like',"%{$request->keyword}%")->paginate(3);
        return view('admin/view_company',compact('userData','company','auth'));
    }
}
