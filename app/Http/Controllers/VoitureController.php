<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVoitureRequest;
use App\Http\Requests\UpdateVoitureRequest;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //   $voitures = Voiture::join('voitures','voitures.categorie_id','=','categorie.id')->get();
        $voitures = Voiture::latest()->get();
 
        return view('admin.table_voiture', ['voitures' => $voitures]);
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
     * @param  \App\Http\Requests\StoreVoitureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation= $request->validate([
            'image'=>'required|mimes:jpg,png,jpg,gif,svg',
            'mark'=>'required|max:2048',
            'categorie_id'=>'required|max:2048',
            'prix'=>'required|max:2004',
        
        ]);

      

       
        $NewVoiture=new Voiture([
            $image_path = $request->file('image')->store('image', 'public'),

            'mark'=>$request->get('mark'),
            'image'=>$image_path,
            'prix'=>$request->get('prix'),
            'categorie_id'=>$request->get('categorie_id'),
            'type'=>$request->get('type'),
            'discription'=>$request->get('discription')
            
            
        ]);
       
      
        $NewVoiture->save();
      
         return back();
      
    }

    public function archieve()
    {
        $voitures=Voiture::onlyTrashed()->get();

        return view('admin.archieve.archieve_voiture',compact('voitures'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function show(Voiture $voiture,$id)
    {
        $voiture=Voiture::find($id);
        return view('admin.table_voiture',compact('voiture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function edit(Voiture $voiture,$id)
    {
        $voiture=Voiture::find($id);
        return view('admin.Edit.edit_voiture',compact('voiture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVoitureRequest  $request
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voiture $voiture,$id)
    {
   

        $voiture=Voiture::find($id)->where('id',$id)->first();


        $voiture->update([
            $image_path = $request->file('image')->store('image', 'public'),

            'mark'=>$request->get('mark'),
            'image'=>$image_path,
            'prix'=>$request->get('prix'),
            
         
            'discription'=>$request->get('discription'),
            'type'=>$request->get('type')
            
        ]);
      
        return redirect()->route('table_voiture.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voiture $voiture,$id)
    {
  
            $voiture->destroy($id);
            return redirect('admin/table_voiture');

    }
    public function restore($id){
        Voiture::withTrashed()->find($id)->restore();
       return back();
    }
}
