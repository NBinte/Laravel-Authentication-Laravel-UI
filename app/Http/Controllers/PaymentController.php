<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    // public function store()
    // {
    //     request()->user()->notify(new PaymentReceived(900)); //recommmended for notifying one user

    //     //$user->notify(new PaymentReceived()); //in case we have any $user variable


    //     // Notification::send(request()->user(), new PaymentReceived()); //useful for notifying a collection of 
    //     //users
    // }


    public function store(){


        //primary action -- core logic
        //process the payment
        //unlock the purchase


        //an event represents an action that just took place in your system -- ProductPurchased


        ProductPurchased::dispatch('toy'); //could be product model in real life


        //or in another way
        //event(new PaymentController('toy'));


        //side effects -- will be listeners for an event
        //notify the user about the payment
        //award achievements
        //send shareable coupon to user



    }
}
