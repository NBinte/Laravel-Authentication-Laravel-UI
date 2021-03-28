<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function show()
    {

        // return view('notifications.show', [
        //     'notifications' => auth()->user()->notifications
        // ]);

        // $notifications = auth()->user()->notifications;

        // foreach($notifications as $notification){
        //     $notification->markAsRead;
        // } //slow way cause it ends up being n+1


        // $notifications = auth()->user()->unreadNotifications; //fethcing custom collection

        // $notifications->markAsRead();


        //Using Tap() - For getting the unread notifications and then calling a method on it, also passing the
        //original variable in the view

        //tap(auth()->user()->unreadNotifications)->markAsRead(); //using higher order tap

        // return view('notifications.show', [
        //     'notifications' => tap(auth()->user()->unreadNotifications)->markAsRead()
        // ]); //fetches unreadnotifications, calls a method on it and then passes the original value to the view

        $notifications = tap(auth()->user()->unreadNotifications)->markAsRead();

        return view('notifications.show', [
            'notifications' =>  $notifications
        ]);
    }
}
