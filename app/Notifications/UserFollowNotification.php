<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserFollowNotification extends Notification
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

     
    public function toArray($notifiable)
    {
        return [
        'user_id'=> $this->user['id'],
        'nom'=> $this->user['nom'],
        'prenom'=> $this->user['prenom'],
        'sexe'=> $this->user['sexe'],
        'telephone1'=> $this->user['telephone1'],
        'pieceIdentite'=> $this->user['pieceIdentite'],
        'numeroPieceIdentite'=> $this->user['numeroPieceIdentite'],
        'email'=> $this->user['email'],
        'password'=> $this->user['password'],
        'photo'=> $this->user['photo'],
        ];
    }
}
