<?php

namespace App\Http\Controllers;

use App\Models\business;
use Carbon\Carbon;
use App\Models\user;
use App\Models\education;
use App\Models\event;
use App\Models\member;
use App\Models\news;
use App\Models\province;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    function index(){
        $education_chart = education::select('educationID','educationLevel')->get()->groupBy(function($data){
            return $data->educationLevel;
        });
        $Education_levels = [];
        $level_count = [];
        foreach($education_chart as $Education_level => $values){
            $Education_levels[] = $Education_level;
            $level_count []= count($values);
        }
        
       
       $address = DB::table('member_addresses')
       ->join('provinces', 'member_addresses.provinceID', '=', 'provinces.provinceID')
       ->select('provinceName')
        ->get()->groupBy(function($address){
            return $address->provinceName;
        });
        
        $addresses = [];
        $address_counts = [];
        foreach($address as $address =>$values){
            $addresses[] = $address;
            $address_counts[]= count($values);
        }


       $sector = DB::table('businesses')
       ->join('sectors', 'sectors.sectorsID','=', 'businesses.sectorsID')
       ->select('sectorName')
       ->get()->groupBy(function($sector){
            return $sector->sectorName;
       });
        $Business_sectors = [];
        $sector_count = [];
        foreach($sector as $Business_sector => $values){
            $Business_sectors[] = $Business_sector;
            $sector_count [] = count($values);
        }

        $membership_year = business::select('startingDate')->get()->groupBy(function($membership_year){
            return Carbon::parse($membership_year->startingDate)->format('Y');
        });
        $years = [];
        $year_count = [];
        foreach($membership_year as $year => $values){
            $years[] = $year;
            $year_count[] = count($values);
        }
          
        $event = event::count();
        $news = news::count();
        $member = member::count();
        $business = business::count();
       
        
               return view('dashboard', ['Education_levels'=>$Education_levels, 'level_count'=>$level_count
    , 'Address_Cities' => $addresses, 'Address_count' => $address_counts,
     'years'=>$years, 'year_count'=>$year_count, 'sectors'=>$Business_sectors, 'sec_count'=>$sector_count,
      'event'=>$event, 'news'=>$news, 'member'=>$member, 'business'=>$business]);

    }
    function showProfile(){
        $profile = user::select('user_id')->get();
        return view('dashboard', ['profile'=>$profile]);
    }
    function quickActivity(){
        
        
    }
}
