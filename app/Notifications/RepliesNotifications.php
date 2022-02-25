<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RepliesNotifications extends Notification
{
    
    protected $comment;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment, $usr)
    {
        $this->comment= $comment;
        $this->user= $usr;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return ['database'];
    }
/*
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
 /*   public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
    }

    */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'ReplyTime' => Carbon::now(),
            'comment'=>$this->comment,
            'usr'=> $this->user,
            'user'=>$notifiable
        ];
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
