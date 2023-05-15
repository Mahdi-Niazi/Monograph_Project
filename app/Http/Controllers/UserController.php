<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   
    function login(Request $req){
        if(Auth::attempt($req->only('username', 'password'))){
            return redirect()->route('dashboard')->with('success', 'You logged in successfully');
        }
        return back()->with('warning', 'Username or password is incorrect');    
        
    }  
    
    function logout(){
        Auth::logout();
        return redirect('login')->with('success', 'You successfully logout!');
    }



     function store(Request $req){

        $user = new user;
        $user->empID = $req->empID;
        $user->username = $req->username;
        $user->password = Hash::make(request('password'));
        $user->confirmPassword = Hash::make(request('confirmPassword'));
        $user->name =  $req->name;
        $user->role = $req->role;
        $user->save();
        return redirect('/view-users')->with('message', 'User added successfully');
     }   
     function empName(){
        $member = employee::select('*')->get();
        return view('user.register', ['emp'=>$member]);
     }
     function users(){
        $user = user::select('*')->get();
        return view('user.view-users', ['user'=>$user]);
     }
     function editUser($id){
        $user = user::select('*')->where('userID', '=', $id)->get();
        return view('user.edit-user', ['user'=>$user]);
     }
     function updateUser(Request $req){

        $user = user::find($req->userID);
        $user->empID = $req->empID;
        $user->username = $req->username;
        $user->password = Hash::make(request('password'));
        $user->confirmPassword = Hash::make(request('confirmPassword'));
        $user->name =  $req->name;
        $user->role = $req->role;
        $user->save();
        return redirect('view-users')->with('success', 'User updated successfully');
     }
     function delete($id){
        $data = user::where('userID', '=', $id);
        $data->delete();
        return redirect('view-users')->with('success', 'User deleted successfully');
    }
}