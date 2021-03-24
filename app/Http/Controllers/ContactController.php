<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(){
        return view('Contact');
    }

    public function store(){

        //send the email

        request()->validate(['email' => 'required|email']);

        // $email = request('email');

        // dd($email);

        Mail::raw('It Works!', function ($message) {
            //$message->from('john@johndoe.com', 'John Doe');
            //$message->sender('john@johndoe.com', 'John Doe');
            //$message->to('john@johndoe.com', 'John Doe');
            $message->to(request('email'))
                ->subject('Hello There');
            //$message->cc('john@johndoe.com', 'John Doe');
            //$message->bcc('john@johndoe.com', 'John Doe');
            //$message->replyTo('john@johndoe.com', 'John Doe');
            //$message->subject('Subject');
            //$message->priority(3);
            //$message->attach('pathToFile');
        });


        //a flash message is basically the data that is put at the session for exactly one request

        return redirect('/contact')
            ->with('message', 'Email Sent!');
    }
}
