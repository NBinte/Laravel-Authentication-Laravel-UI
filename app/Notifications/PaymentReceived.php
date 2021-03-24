<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


//responsible for notifying the user in response to some action that took place on the website
//e.g. - they made a payment, they closed their account, they liked something - these are all responses to an
//action that took place
//doesn't necessarily need to be an email, can be a text message, you could notify them on slack, you could 
//even pull in a supported package to send them a physical post card in response, and it all still uses the same
//notification api

class PaymentReceived extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //you could have one notification that is distributed to the user in multiple ways


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Your laracasts payment was received')
                    ->greeting('BEEP BEEP BOOP BOOP')
                    ->line('Lorem Ipsum Sit Lorem Ipsum Sit Lorem Ipsum Sit')
                    ->line('The introduction to the notification.')
                    ->action('Sign Up', url('/'))
                    ->line('Thanks!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
