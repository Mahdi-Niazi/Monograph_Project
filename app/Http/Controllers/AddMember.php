<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\member;
use App\Models\country;
use App\Models\province;
use App\Models\member_address;
use App\Models\education;
use App\Models\district;
use App\Models\bill;
use App\Models\business;
use App\Models\sector;

class AddMember extends Controller
{
    //
    function addData(Request $req){
        $newProfileName = time(). '-'. $req->firstName . '.'. $req->profilePicture->extension();
        $req->profilePicture->move(public_path('images/members/'), $newProfileName );
        $newFrontName = time(). '-'. 'Back_nic' . '.'. $req->frontNic->extension();
        $req->frontNic->move(public_path('images/members/'), $newFrontName);
        $newBackName = time(). '-'. 'Front_nic' . '.'. $req->backNic->extension();
        $req->backNic->move(public_path('images/members/'), $newBackName);
        $member = new member;
        $member->firstName=$req->firstName;
        $member->lastName=$req->lastName;
        $member->email=$req->email;
        $member->phoneNumber=$req->phoneNumber;
        $member->gender = $req->gender;
        $member->dob=$req->dob;
        $member->profilePicture= $newProfileName;
        $member->nic=$req->nic;
        $member->frontNic= $newFrontName;
        $member->backNic= $newBackName  ;
        $member->motherLang=$req->motherLang;
        $member->nationality=$req->nationality;
        $member->position=$req->position;
        $member->save();
        return redirect('/address')->with('success', 'Member added successfully');
            
    }
    function education(Request $req){
        $edu = new education;
        $edu->memberID = $req->memberID;
        $edu->educationLevel = $req->educationLevel;
        $edu->educationField = $req->educationField;
        $edu->save();

        $otherMem = [
        'memberID' => $req->memberID, 
        'orgName'=>$req->orgName,
        'membershipType'=>$req->membershipType,
        'amount'=>$req->amount,
       ];
        DB::table('other_memberships')->insert($otherMem);
        return redirect('add-business')->with('success', 'Education and other member added successfully');
    }
    


    function show(){
        $info_member = DB::table('members')
        ->leftjoin('businesses','members.memberID', "=" ,'businesses.memberID')
        ->select('members.memberID','members.firstName', 'members.lastName','members.email','members.phoneNumber', 'businesses.businessName')
        ->get();
        $my_array = json_decode($info_member, true);   
        return view('members.view-member',['member'=>$my_array]);  
    }
    function delete($id){
        $data = member::where('memberID', '=', $id);
        $data->delete();
        return redirect('view-members')->with('success', 'Member record deleted successfully');
    }
    function memberEdit($id){
       $data = member::where('memberID', '=', $id)->get();
       return view('members.edit-member', ['data'=>$data]);
    }   
    function memberUpdate(Request $req){
        $member = member::find($req->memberID);
        $member->firstName=$req->firstName;
        $member->lastName=$req->lastName;
        $member->email=$req->email;
        $member->phoneNumber=$req->phoneNumber;
        $member->gender = $req->gender;
        $member->dob=$req->dob;
        $member->profilePicture=$req->profilePicture;
        $member->nic=$req->nic;
        $member->frontNic=$req->frontNic;
        $member->backNic=$req->backNic;
        $member->motherLang=$req->motherLang;
        $member->nationality=$req->nationality;
        $member->position=$req->position;
        $member->save();
        return redirect('view-members')->with('success', 'Member updated successfully');
    }
    function showMember($id){
         $bill = bill::select('registerDate')->where('memberID','=', $id )->get();
         $member = member::select('*')->where('memberID', '=', $id)->get();
         $business = business::select('*')->where('businesses.memberID', '=', $id)->get();
         $sector = DB::table('sector_businesses')->where('sector_businesses.memberID', '=', $id)
         ->join('sectors', 'sectors.sectorsID', '=', 'sector_businesses.sectorsID')
         ->select('sectorName')
         ->get();
         $sector_decode = json_decode($sector, true);
         $education = education::select('*')->where('memberID', '=', $id)->get();
         $country =  DB::table('member_addresses')->where('member_addresses.memberID', '=', $id)
         ->leftJoin('countries', 'countries.countryID','=', 'member_addresses.countryID')
         ->leftJoin('districts', 'districts.districtID', '=', 'member_addresses.districtID')
         ->leftJoin('provinces', 'districts.provinceID', '=', 'provinces.provinceID')
         ->select('*')->get();
        $country_decode = json_decode($country, true);  
        

        $membership = DB::table('members')->where('bills.memberID', '=', $id)
        ->join('bills', 'bills.memberID', '=', 'members.memberID')
        ->join('prices', 'prices.billID', '=', 'bills.billID')
        ->select('bills.*', 'prices.*')->get();
        $membership_decode = json_decode($membership, true);    
        
        $bill = bill::select('registerDate')->where('memberID','=', $id )->get();
        
       
        if($bill->isEmpty())
        {
                $msg = 'No Bill record';
        }
            else
        {    
                foreach ($bill as $item)
                {
                $date = $item->registerDate;
                }
            $registerDate = \Carbon\Carbon::parse($date);
            $today = \Carbon\Carbon::now();
            $result = $registerDate->diffInDays($today, false);
            if($result < 365){
                $msg = 'No';
            }
            else{
                $msg = 'Yes';
            }
        }    
   
        return view('members.show-member',['bill' =>$bill, 'member'=>$member, 'business'=>$business, 'country'=>$country_decode,
         'education'=>$education, 'membership'=>$membership_decode, 'msg'=>$msg, 'sector'=>$sector_decode]);
    }
   
   
    function edu(){
        $education = member::select('memberID')->orderBy('memberID', 'asc')->get();
        return view('members.education', ['education'=>$education]);
    }

}

