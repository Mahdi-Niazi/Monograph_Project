<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Sidebar extends Controller
{
    public function editProfile(){
        $data = user::select('userID', 'username')->where('userID', '=', Auth::user()->userID)->get();
        return view('user.edit-profile', ['data'=>$data]);
    }  
    
    function updateProfile(Request $req){
        $profile = user::find($req->userID)->first();
        $profile->username=$req->username;
        $profile->password = Hash::make($req->password);
        $profile->save();
        return redirect('/dashboard')->with('success', 'profile updated successfully');
    }

}
