<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {
        request()->user()->notify(new PaymentReceived(900)); //recommmended for notifying one user

        //$user->notify(new PaymentReceived()); //in case we have any $user variable


        // Notification::send(request()->user(), new PaymentReceived()); //useful for notifying a collection of 
        //users
    }
}
