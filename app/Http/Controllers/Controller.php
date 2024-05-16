<?php

namespace App\Http\Controllers;
use App\Models\Demand;
use App\Models\User;
use App\Models\Contact;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoicePaid;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    public function __construct()
    
    {
        
    
        $contacts = Contact::latest()->get();
        foreach($contacts as $admin) {
            $admin->notify(new InvoicePaid($contacts));
            
    view()->share('admin', $admin);
           
        } 

      
        
    }
}
