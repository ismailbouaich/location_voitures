<?php

namespace App\Http\Controllers;

use App\Models\Location;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
 
        return view('admin.table_location',compact('locations'));
    }
    public function store(Request $request)
    {
       $validation= $request->validate([
            'places'=>'required|max:2048',
        ]);

        $Newlocation=new Location([
            'places'=>$request->get('places'),
   
        ]);
       
        $Newlocation->save();
         return back();
        ;
    }
    public function show(Request $request,$id)
    {
       
      
    }
    public function edit(Location $locations,$id)
    {
        $locations=Location::find($id);
        return view('admin.Edit.edit_location',compact('locations'));
    }


    public function archieve()
    {
        $locations=Location::onlyTrashed()->get();

        return view('admin.archieve.archieve_location',compact('locations'));

    }


    public function update(Request $request, $id)
    {
   

        $locations=Location::find($id)->where('id',$id)->first();

        $locations->update([
          

            'places'=>$request->get('places'),

            
        ]);
      
        return redirect()->route('table_location.index')
                        ->with('success','location updated successfully');
    }

    public function destroy(Location $locations,$id)
    {  
            $locations->destroy($id);
            return redirect('admin/table_location');

    }
    public function restore($id){
        Location::withTrashed()->find($id)->restore();
       return back();
    }

}
