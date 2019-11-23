<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $token;
    public function __construct($token)
    {
        //
        $this->token=$token;
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
            ->subject('Réinitialisation du mot de passe' )
            ->greeting('Bonjour  ! ')
            ->line('Vous recevez cet email car nous avons reçu une demande de réinitialisation du mot de passe pour votre compte.')
            ->action('réinitialisation ', url(config('http://127.0.0.1:8000').route('password.reset',$this->token,false)))
            ->line('Ce lien de réinitialisation de mot de passe expirera dans 24 heurs .')
            ->line('Si vous n\'avez pas demandé de réinitialisation de mot de passe, aucune action supplémentaire n\'est requise.')
            ->line('Cordialement,')
            ->salutation('Équipes de GesFit');
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
