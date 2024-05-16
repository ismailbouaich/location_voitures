<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Voiture;
use App\Models\Location;
use Illuminate\Http\Request;

use App\Http\Requests\StoreDemandRequest;
use App\Http\Requests\UpdateDemandRequest;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demand = Demand::all();
 
       
        return view('admin.table_demand')->with([
            "demand"=> Demand::all(),
            "location"=>Location::all(),

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDemandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required',
          
            'debut_dmd'=>'required|date',
            'fin_dmd'=>'required|date',

            'voiture_id'=>'required',
         
           
        ]);

   
      
        $NewDmd=new Demand([
            'client_id'=>$request->get('client_id'),
            'voiture_id'=>$request->get('voiture_id'),
            'debut_dmd'=>$request->get('debut_dmd'),
            'fin_dmd'=>$request->get('fin_dmd'),
            'pick_up'=>$request->get('pick_up'),
            'drop_off'=>$request->get('drop_off'),
            'siege_auto'=>$request->get('siege_auto'),
            'gps'=>$request->get('gps'),
            'prixT'=>$request->get('prixT')

        ]);

      
       
        $NewDmd->save();  
        return back()
        ->with('success','You have successfully added a new comand.');
    }

    public function archieve()
    {
        $demand=Demand::onlyTrashed()->get();

        return view('admin.archieve.archieve_demand',compact('demand'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function show(Demand $demand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function edit(Demand $demand,$id)
    { 
       
        return view('admin.Edit.edit_demand')->with([
            'demand'=>Demand::find($id),
            'location'=>Location::all(),
          
           
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDemandRequest  $request
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demand $demand,$id)
    {
        
        $demand=Demand::find($id)->where('id',$id)->first();

     
        $demand->update([
            'client_id'=>$request->get('client_id'),
            'voiture_id'=>$request->get('voiture_id'),
            'debut_dmd'=>$request->get('debut_dmd'),
            'fin_dmd'=>$request->get('fin_dmd'),
            'siege_auto'=>$request->get('siege_auto'),
            'gps'=>$request->get('gps'),
            'progress'=>$request->get('progress'),
            'prixT'=>$request->get('prixT')
          
            
        ]);
      
       
      
        return redirect()->route('table_demand.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand,$id)
    {
        $demand->destroy($id);
        return back();
    }
    public function restore($id){
        Demand::withTrashed()->find($id)->restore();
       return back();
    }
}
