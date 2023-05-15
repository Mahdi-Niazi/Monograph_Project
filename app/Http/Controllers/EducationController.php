<?php

namespace App\Http\Controllers;

use App\Models\education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    function edit($id){
        $edu = education::select('*')->where('educationID', '=', $id)->get();
        return view('education.education', ['edu'=>$edu]);
    }
    function update(Request $req){
        $edu = education::find($req->educationID);
        $edu->memberID = $req->memberID;
        $edu->educationLevel = $req->educationLevel;
        $edu->educationField = $req->educationField;
        $edu->save();
        return redirect('view-members')->with('success', 'Member Education updated successfully');

    }
}
