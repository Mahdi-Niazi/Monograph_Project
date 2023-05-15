<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\business;
use App\Models\member;
use App\Models\sector;
use App\Models\sector_business;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    //
    function business(Request $req){
        $newLogoName = time(). '-'. 'Logo' . '.'. $req->businessLogo->extension();
        $req->businessLogo->move(public_path('images/businesses'), $newLogoName );
        $business = new business;
        $business->memberID = $req->memberID;
        $business->BusinessName = $req->businessName;
        $business->businessEmail = $req->businessEmail;
        $business->businessPhoneNumber = $req->businessPhoneNumber;
        $business->businessLogo = $newLogoName;
        $business->businessWebsite = $req->businessWebsite;
        $business->startingDate = $req->startingDate;
        $business->startingCapital = $req->startingCapital;
        $business->startingCapitalCurrency = $req->startingCapitalCurrency;
        $business->annualRevenue = $req->annualRevenue;
        $business->annualRevenueCurrency = $req->annualRevenueCurrency;
        $business->sectorsID = $req->sectorsID;
        $business->maleEmp = $req->maleEmp;
        $business->femaleEmp = $req->femaleEmp;
        $business->save();
       
        $sector_business = new sector_business;
        $sector_business->memberID = $req->memberID;
        $sector_business->businessID = $req->businessID;
        $sector_business->sectorsID = $req->sectorsID;
        $sector_business->save();

        return redirect('view-members')->with('success', 'Member company added successfully');
    }
    function edit($id){
        $business = business::select('*')->where('businesses.businessID', '=', $id)->get();
        $sectors = DB::table('sectors')->leftjoin('businesses', 'sectors.sectorsID', '=', 'businesses.sectorsID')
        ->select('sectors.sectorName','sectors.sectorsID')
        ->get();
        $sector_decode = json_decode($sectors, true);
        return view('business.edit-business', ['sector'=>$sector_decode, 'business'=>$business]);
    }
    function update(Request $req){
        $newLogoName = time(). '-'. 'Logo' . '.'. $req->businessLogo->extension();
        $req->businessLogo->move(public_path('images/businesses'), $newLogoName );
        $business = business::find($req->businessID);
        $business->memberID = $req->memberID;
        $business->businessName = $req->businessName;
        $business->businessEmail = $req->businessEmail;
        $business->businessPhoneNumber = $req->businessPhoneNumber;
        $business->businessLogo = $newLogoName;
        $business->businessWebsite = $req->businessWebsite;
        $business->startingDate = $req->startingDate;
        $business->startingCapital = $req->startingCapital;
        $business->startingCapitalCurrency = $req->startingCapitalCurrency;
        $business->annualRevenue = $req->annualRevenue;
        $business->annualRevenueCurrency = $req->annualRevenueCurrency;
        $business->sectorsID = $req->sectorsID;
        $business->maleEmp = $req->maleEmp;
        $business->femaleEmp = $req->femaleEmp;
        $business->save();
        return redirect('view-members')->with('success', 'Member Company updated successfully');
    }


     function fname(){
       $memberFname = member::select('memberID','firstName')->get();
       $sectors = sector::select('sectorsID','sectorName')->get();
        return view('members.add-business', ['f_info'=>$memberFname, 'sector'=>$sectors]);
    }
    
}
