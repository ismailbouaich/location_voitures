<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Demand;
use App\Models\User;
use App\Models\Contact;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoicePaid;
class ChartsController extends Controller
{


  public function index()
  {

    return view('admin.home_admin');
  }

  public function Count(){



    

    $count = DB::table('users')->count();
    $count1 = DB::table('voitures')->count();
    $count2 = DB::table('demands')->count();
    $count3 = DB::table('clients')->count();


       $users=Demand::select(DB::raw("COUNT(*) as count"),DB::raw("DAYNAME(created_at) as day_name"))
       ->whereYear("created_at",date("Y"))
       ->groupBy(DB::raw("Day(created_at)"))
       ->pluck("count","day_name");
      
       $labels = $users->keys();
       $data = $users->values();
      
   
            return view('admin.home_admin', ['labels'=>$labels,'data'=>$data,'s1'=>$count,'s2'=>$count1,'s3'=> $count2,'s4'=>$count3]);
   
  }



  public function chart(){
  
    



     
   



    
    //    return view('admin.home_admin',['s1'=>$count,'s2'=>$count1,'s3'=> $count2,'s4'=>$count3]);

    }


    



  



}
