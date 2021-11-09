<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompanyIndexController extends Controller
{
    public function show(){
        
        if(Auth::user()->role == 'company'){
            $userData = DB::table('users')
            ->join('companies','users.id','=','companies.user_id')
            ->select('companies.name','companies.id','companies.address','companies.phone','companies.profile_picture','users.email')
            ->where('users.id','=',Auth::id())
            ->get();
        }
        $auth = Auth::check();
        return view('companyprofile',compact('auth','userData'));
    }

    public function edit(Request $request, $id){ //berisi validasi inputan dan buat melakukan editProduct yang akan mengupdate semua data produk yang diklik sesuai inputan admin
        // dd(Auth::user()->role);
        $this->validate($request,[
            'name' => 'required|min:4',
            'address' => 'required|min:20',
            'phone' => 'required|min:12',
            'profile_picture' => 'image', 'mimes:jpg,jpeg,bmp,png,svg'
        ]);

        if(Auth::user()->role == 'company'){
            $companyProfile = Company::find($id);
            $companyProfile->name = $request->name;
            $companyProfile->phone = $request->phone;
            $companyProfile->address = $request->address;
            $userEmail = User::find(auth()->user()->id);
            $userEmail ->email = $request->email;
            if ($request->file('profile_picture') == null) {
                
            }else{
                $image_path = $request->file('profile_picture')->store('storage','public');
                $companyProfile->profile_picture = $image_path;
            }
            // $profileDetail->username = $request->username;
            $companyProfile->update();
            $userEmail->update();
        }

        return redirect('companyprofile/{id}')->with('status','Profile Updated Successfully');
    }
}
