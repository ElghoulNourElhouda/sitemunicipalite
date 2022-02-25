<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OffreNotifications extends Notification
{
    use Queueable;

    private $offre;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($offre)
    {
        $this->offre = $offre;
    }

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
                    ->line('nouveau offre est déposé')
                    ->action('consulter offre', route('offres.affiche', [$this->offre->id]))
                    ->line("Let's get going!");
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
            'offre' => $this->offre->id
        ];
    }
}
