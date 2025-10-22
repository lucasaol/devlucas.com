<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContact extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public ?array $content = [])
    {
        //
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
        return (new MailMessage)
            ->subject("Nova mensagem pelo site - " . config('app.name'))
            ->greeting("Olá {$notifiable->name}!")
            ->line("Nova mensagem recebida pelo site")
            ->line("**Nome:** {$this->content['name']}")
            ->line("**E-mail:** {$this->content['email']}")
            ->line("**Mensagem:**")
            ->lines(explode(PHP_EOL, $this->content['message']))
            ->line("**Endereço de IP:** " . request()->ip() ?? "")
            ->line('**Enviado em:** ' . now()->format('d/m/Y H:i:s'));
    }

}
