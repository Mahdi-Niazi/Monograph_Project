<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\district;
use App\Models\member;
use App\Models\member_address;
use App\Models\province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    function update(Request $req){
        $add = member_address::find($req->addressID);
        $add->countryID = $req->countryID;
        $add->provinceID = $req->provinceID;
        $add->memberID = $req->memberID;
        $add->districtID = $req->districtID;
        $add->street = $req->street;
        $add->save();

       return redirect('view-members')->with('success', 'Address updated successfully');
    }

    function edit($id){
        $member_address = member_address::select('*')
        ->where('addressID', '=', $id)
        ->get();
        $country = DB::table('member_addresses')
        ->join('countries', 'countries.countryID', '=', 'member_addresses.countryID')
        ->select('*')
        ->get();
        $country_decode = json_decode($country, true);
        $country = country::select('*')->get();

        $Province = DB::table('member_addresses')
        ->join('provinces', 'provinces.provinceID', '=', 'member_addresses.provinceID')
        ->select('*')
        ->get();
        $province_decode = json_decode($Province, true);
        $province = province::select('*')->get();

        $District = DB::table('member_addresses')
        ->join('districts', 'districts.districtID', '=', 'member_addresses.districtID')
        ->select('*')
        ->get();
        $district_decode = json_decode($District, true);

        $district = district::select('*')->get();
        return view('address.edit-address', compact('member_address', 
        'country_decode', 'country', 'province','district', 'district_decode','province_decode'));
    }
     function address(){
        $country = country::select('*')->orderBy('countryName', 'asc')->get();
        $address = member::select('memberID')->orderBy('memberID', 'asc')->get();
        return view('address.add-address', ['country'=>$country, 'member'=>$address]);
    }  
    function getProvince(Request $req){
      $cid = $req->post('cid');
      $province = DB::table('provinces')->where('countryID', $cid)->orderBy('provinceName','asc')->get();
      $html='<option selected value="" >Choose...</option>';
      foreach($province as $list){
        $html.='<option value="'.$list->provinceID.'">'.$list->provinceName.'</option>';
      }
      echo $html;
    }
    function getDistrict(Request $req){
      $pid = $req->post('pid');
      $district = DB::table('districts')->where('provinceID', $pid)->orderBy('districtID','asc')->get();
      $html='<option selected value="" >Choose...</option>';
      foreach($district as $list){
        $html.='<option value="'.$list->districtID.'">'.$list->districtName.'</option>';
      }
     echo $html;
    }

    function store(Request $req){
        $add = new member_address;
        $add->countryID = $req->countryID;
        $add->provinceID = $req->provinceID;
        $add->memberID = $req->memberID;
        $add->districtID = $req->districtID;
        $add->street = $req->street;
        $add->save();

       return redirect('/education')->with('success', 'Address added successfully');
    }
}