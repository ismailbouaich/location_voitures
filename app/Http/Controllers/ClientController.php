<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Demand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
 
        return view('admin.table_client', ['clients' => $clients]);
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
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
     
        $request->validate([
            'full_nom'=>'required',
            'telephone'=>'required|regex:/(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}/',
            'adress'=>'required|max:2048',
            'cin'=>'required|unique:clients|regex:/[A-Z]{2}\d{6}/',
         
           
        ]);



        $register=new Client([
            'full_nom'=>$request->get('full_nom'),
            'adress'=>$request->get('adress'),
            'telephone'=>$request->get('telephone'),
            'cin'=>$request->get('cin'),
           
        ]);
        $register->save();

         
        return back()
        ->with('success','You have successfully added a new client.');

        
    }

    public function archieve()
    {
        $client=Client::onlyTrashed()->get();

        return view('admin.archieve.archieve_client',compact('client'));

    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client,$id)
    {
        $client=Client::find($id);
        return view('admin.Edit.edit_client',compact('client'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client,$id)
    {
        
        $client=Client::find($id)->where('id',$id)->first();


        $client->update([
           

            'full_nom'=>$request->get('full_nom'),
            'adress'=>$request->get('adress'),
            'cin'=>$request->get('cin'),
            'user_id'=>$request->get('user_id'),
        ]);
      
        return redirect()->route('table_client.index')
                        ->with('success','Product updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client,$id)
    {
        $client->destroy($id);
        return back();
    }
    public function restore($id){
        Client::withTrashed()->find($id)->restore();
       return back();
    }
}
