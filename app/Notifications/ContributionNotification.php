<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Participant;

class ContributionNotification extends Notification
{
    use Queueable;

    protected $participant;
    /**
     * Create a new notification instance.
     */

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $greeting = 'Bonjour';

        // Si le notifiable est un utilisateur avec un nom
        if (method_exists($notifiable, 'getName')) {
            $greeting .= ' ' . $notifiable->getName();
        }

        return (new MailMessage)
            ->subject('Nouvelle Contribution financiare à la liste de naissance')
            ->greeting($greeting)
            ->line('Une nouvelle contribution financiaire vient d\'être effectué.')
            ->line('Détails de la contribution :')
            ->line('Montant: ' . $this->participant->amount)
            ->line('Contribué par: ' . $this->participant->name . ' (' . $this->participant->email . ')')
            ->action('Voir votre liste', url('/listes/' . $this->participant->liste_id))
            ->line('Merci d\'utiliser notre application !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
