<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Voiture;
use App\Models\User;
use App\Models\Demand;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::all();
 
        return view('admin.table_user', ['users' => $users]);
    }
    public function listUsers()
    {
        $users =User::all();
 
        return  $users;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                
            'name'=>'required|max:2048',
            'email'=>'required|email|unique:users',
            
            'password'=>'required|max:2004|min:8'
        ]);

      

       
        $Newuser=new User([
            

            'email'=>$request->get('email'),
            
            'name'=>$request->get('name'),
            'password' => Hash::make($request->password)
            
        ]);
     
        

     $Newuser->save();
       
  
        return back()->with('status'.' You have successfully added a new user.');
    }

    public function archieve()
    {
        $user=User::onlyTrashed()->get();

        return view('admin.archieve.archieve_user',compact('user'));

    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $user=User::find($id);
        return view('admin.Edit.edit_user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,$id)
    {

        $user=User::find($id)->where('id',$id)->first();

        $user->update([
            'email'=>$request->get('email'),
            
            'name'=>$request->get('name'),
            'password' => Hash::make($request->password)
        ]);
      

        return redirect()->Route('table_user.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,$id)
    {
        $user->destroy($id);
        return back();
    }


    public function restore($id){
        User::withTrashed()->find($id)->restore();
       return back();
    }


}
