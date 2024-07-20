<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Reservation;

class ReservationNotification extends Notification
{
    use Queueable;

    protected $reservation;
    /**
     * Create a new notification instance.
     */

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
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
            ->subject('Nouvelle réservation de produit')
            ->greeting($greeting)
            ->line('Un produit de votre liste de naissance a été réservé.')
            ->line('Détails de la réservation :')
            ->line('Produit: ' . $this->reservation->product->title)
            ->line('Réservé par: ' . $this->reservation->visitor_name . ' (' . $this->reservation->visitor_email . ')')
            ->action('Voir votre liste', url('/listes/' . $this->reservation->liste_id))
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
