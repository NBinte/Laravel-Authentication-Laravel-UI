<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable //class name will be mail's subject and the view will be the body of the mail
{
    use Queueable, SerializesModels;

    public $topic; //only any PUBLIC property's value will be instantly available to the view

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $topic)
    {
        $this->topic = $topic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->view('emails.contact-me')
    //         ->subject('More information about ' . $this->topic);
    // }


    public function build()
    {
        return $this->markdown('emails.contact-me')
            ->subject('More information about ' . $this->topic); // while using markdown, don't indent anything in
            //view
    }
}
