<?php

namespace App\Http\Controllers;



use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;


use App\Notifications\InvoicePaid;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'full_nom' => 'required',
                'subject' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);

            $newContact = Contact::create([
                'full_nom' => $request->input('full_nom'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
            ]);

            $notification = new InvoicePaid($newContact);

            Notification::send([], $notification);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
