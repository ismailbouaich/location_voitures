<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Voiture;
use App\Models\User;
use App\Models\Demand;
use App\Models\Categorie;
use App\Models\Location;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
        return view('home')->with([
          
            
           
           
            "voitures"=> Voiture::latest()->paginate(12),
            "categories"=>Categorie::has("voitures")->get()

        ]);
    }
  
    
    
  

    public function list()
    {
        return view('welcome')->with([
            "voiture"=> Voiture::paginate(3),
            "voitures"=> Voiture::latest()->paginate(6),
          

        ]);
        $voitures = Voiture::latest()->paginate(6);
      

    }


    public function show(Request $request,$id)
    {
         return view('test')->with([
             "location"=>Location::all(),
             "info" => Voiture::findOrFail($id),
             "voitures"=> Voiture::latest()->paginate(5),
             

         ]);
      
    }


    public function store(Request $request)
    {
        
     
        $request->validate([
            'full_nom'=>'required|max:2048',
            'telephone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'adress'=>'required|min:10|',
            'cin'=>'required|regex:/[a-zA-Z]{2}\d{6}/|min:8',
            'voiture_id'=>'required',
            'debut_dmd'=>'required',
            'fin_dmd'=>'required',
            'prixT'=>'required',

           
      ]);

        

          $test=Client::select('id')->where('cin', '=',$request->cin)->first();

        

          $idclt=0;

         if (!empty($test)) {
            $idclt=$test->id;
            
         }else{
            $register=new Client();
            $register->full_nom= $request->full_nom; 
            $register->cin= $request->cin;
            $register->adress= $request->adress;
            $register->telephone = $request->telephone;
            $register->save();
            $idclt= $register->id;
         }

          
     

        $dmd=new Demand(); 
        $dmd->client_id= $idclt;
        $dmd->voiture_id= $request->voiture_id;
        $dmd->debut_dmd= $request->debut_dmd;
        $dmd->fin_dmd= $request->fin_dmd;

       

        $dmd->pick_up= $request->pick_up;
        $dmd->drop_off= $request->drop_off;

         $dmd->gps= $request->gps;
        $dmd->siege_auto= $request->siege_auto;

        $dmd->prixT = $request->prixT;
      
       
        $dmd->save();
        
       
        $request->session()->flash('message', 'New customer added successfully.');
         
        return back();

        
    }


    public function search(Request $request){
        $categories=Categorie::all();

        $search_text=$_GET['search'];
        if ($search_text) {
            $searchvoiture=Voiture::where('mark','LIKE','%'.$search_text.'%')
       
            ->get();

            return view('search',compact('searchvoiture'),compact('categories'));            
        }else{
            return back();

        }

    }
}
