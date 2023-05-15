<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bill;
use App\Models\business;
use App\Models\price;
use App\Models\member;
use Carbon\Carbon;

class BillController extends Controller
{

    function addBill(Request $req){
        $bill = new bill;
        $bill->memberID = $req->memberID;
        $bill->businessID = $req->businessID;
        $bill->paid = $req->paid;
        $bill->paidDate = $req->paidDate;
        $bill->registerDate = $req->registerDate;
        $bill->paidDate = $req->paidDate;
        $bill->save();
        return redirect('pricing')->with('success','Bill added successfully');
    }
    function storePrice(Request $req){
        $price = new price;
        $price->billID = $req->billID;
        $price->membershipName = $req->membershipName;
        $price->amount = $req->amount;
        $price->descriptions = $req->descriptions;
        $price->save();
        return redirect('view-bill')->with('success', 'Bill detial added successfully');
    }
    function bill(){
        $bill = bill::select('billID')->get();
        return view('bills.price',['bill'=>$bill]);
    }
    function nameType(){   
        $name = member::select('memberID','firstName')->get();
        $business = business::select('businessID','businessName')->get();
        return view('bills.add-bill', ['name'=>$name, 'business'=>$business]);
     }
    function joinBill(){
        $info_member = DB::table('bills')
        ->join('members', 'members.memberID', '=', 'bills.memberID')
        ->join('prices', 'prices.billID','=','bills.billID')
        ->select('members.firstName', 'members.lastName', 'prices.membershipName', 'prices.amount', 'bills.registerDate', 'bills.billID')
        ->get();
        $my_array = json_decode($info_member, true); 
        return view('bills.view-bill',['member'=>$my_array]);  
    }
    function editBill($id){
        $bill = DB::table('bills')->where('billID',$id)
        ->join('members','members.memberID', '=', 'bills.memberID')
        ->join('businesses', 'businesses.businessID', '=', 'bills.businessID')
        ->select('members.memberID', 'members.firstName', 'businesses.businessID', 'businesses.businessName', 'bills.*')
        ->get();
        $bill_decode = json_decode($bill, true);
        return view('bills.edit-bill', ['bill'=>$bill_decode]);
    }
    function updateBill(Request $req){
        $bill = bill::find($req->billID);
        $bill->memberID = $req->memberID;
        $bill->businessID = $req->businessID;
        $bill->paid = $req->paid;
        $bill->paidDate = $req->paidDate;
        $bill->registerDate = $req->registerDate;
        $bill->paidDate = $req->paidDate;
        $bill->save();
        return redirect('view-bill')->with('success', 'Bill updated successfully');

    }
    function deleteBill($id){
        $bill = bill::find($id);
        $bill->delete();
        return redirect('view-bill')->with('success', 'Bill deleted successfully');
    }

    function billDetail($id){
        $info_member = DB::table('businesses')
        ->join('bills','businesses.businessID', "=" ,'bills.businessID')->where('prices.billID', '=', $id)
        ->join('prices','prices.billID', "=" ,'bills.billID')
        ->select('businesses.*','bills.*','prices.*')
        ->get();
        $my_array = json_decode($info_member, true);
       
        $date = bill::select('paidDate')->get()->groupBy(function ($data){
            return Carbon::parse($data->paidDate)->addYear()->format('Y-m-d');
        });
       $dates = [];
        foreach($date as $year =>$values){
            $dates[] = $year;
        }
        
        return view('bills.bill',['member'=>$my_array, 'date'=>$year]);
       
    } 
    function getBusinessName(Request $req){
      $mid = $req->post('mid');
      $businessName = DB::table('businesses')->where('businessID', $mid)->orderBy('businessID','asc')->get();
      foreach($businessName as $list){
        $html = '<option value="'.$list->businessID.'">'.$list->businessName.'</option>';
      }
     echo $html;
    }
}
