<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Voiture;

use App\Http\Requests\UpdateCategorieRequest;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorie=Categorie::all();

        return view('admin.table_categorie',compact('categorie'));
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
     * @param  \App\Http\Requests\StoreCategorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                
            'categorie'=>'required|max:2048',
        
        
        ]);

      

       
        $Newcategorie=new Categorie([
            'categorie'=>$request->get('categorie'),
            
        ]);
     
        

     $Newcategorie->save();
       
  
     return redirect()->Route('table_categorie.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voitures = Voiture::select('voitures.*')->where('categorie_id','=',$id)->get();
        

            return view('home')->with([
                'categories'=>Categorie::all(),
                'voitures'=>Voiture::select('voitures.*')->where('categorie_id','=',$id)->paginate(12),

            ]);
        
    }
    public function filterEssence($id)
    {
       
        

            return view('home')->with([
                'categories'=>Categorie::all(),
                'voitures'=>Voiture::select('voitures.*')->where('type','=','Essence')->paginate(12),

            ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie,$id)
    {
        $categorie=Categorie::find($id);
        return view('admin.Edit.edit_categorie',compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategorieRequest  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function archieve()
    {
        $categories=Categorie::onlyTrashed()->get();

        return view('admin.archieve.archieve_categorie',compact('categories'));

    }
    public function update(Request $request, $id)
    {
        $categorie=Categorie::find($id)->where('id',$id)->first();

        $categorie->update([
            'categorie'=>$request->get('categorie'),
        ]);
      

        return redirect()->Route('table_categorie.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie,$id)
    {
        $categorie->destroy($id);
        return back();
    }
    public function restore($id){
        Categorie::withTrashed()->find($id)->restore();
       return back();
    }
}
