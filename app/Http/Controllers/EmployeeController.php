<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;

class EmployeeController extends Controller
{
    function store(Request $req){
        $newImageName = time(). '-'. $req->empName . '.'. $req->empPhoto->extension();
        $req->empPhoto->move(public_path('images/employee/'), $newImageName );
        $emp = new employee;
        $emp->empName = $req->empName;
        $emp->empPosition = $req->empPosition;
        $emp->empEmail = $req->empEmail;
        $emp->empPhoneNumber = $req->empPhoneNumber ;
        $emp->empJoinDate  = $req->empJoinDate;
        $emp->empCardNumber  = $req->empCardNumber;
        $emp->empPhoto = $newImageName;
        $emp->save();
        return redirect('/view-employee')->with('success', 'Employee added successfully');

    }
    function viewEmp(){
        $emp = employee::select('*')->get();
        return view('employee.view-employee', ['emp'=>$emp]);
    }
    function editEmp($id){
        $emp = employee::select('*')->where('empID', '=', $id )->get();
        return view('employee.edit-employee', ['emp'=>$emp]);
    }
    function updateEmp(Request $req){
        $newImageName = time(). '-'. $req->empName . '.'. $req->empPhoto->extension();
        $req->empPhoto->move(public_path('images/employee/'), $newImageName );

        $emp = employee::find($req->empID);
        $emp->empName = $req->empName;
        $emp->empPosition = $req->empPosition;
        $emp->empEmail = $req->empEmail;
        $emp->empPhoneNumber = $req->empPhoneNumber ;
        $emp->empJoinDate  = $req->empJoinDate;
        $emp->empCardNumber  = $req->empCardNumber;
        $emp->empPhoto = $newImageName;
        $emp->save();
        return redirect('/view-employee')->with('success', 'Employee added successfully');
    }
     function delete($id){
        $data = employee::where('empID', '=', $id);
        $data->delete();
        return redirect('view-employee')->with('success', 'Member record deleted successfully');
    }
}
