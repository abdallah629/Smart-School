<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage; // <-- ici
use Illuminate\Support\Facades\URL;                // <-- ici
use Illuminate\Support\Carbon;                     // <-- ici
use Illuminate\Support\Facades\Config;             // <-- ici

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    // <-- ici tu remplaces la méthode toMail() existante
    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->view('emails.password_reset', [
                'url' => $url,
                'user' => $notifiable,
            ]);
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
