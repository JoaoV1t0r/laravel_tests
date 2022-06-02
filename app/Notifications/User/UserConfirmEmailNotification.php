<?php

namespace App\Notifications\User;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserConfirmEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var User
     */
    private User $user;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array<string>
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('Confirm your email address')
            ->line('The introduction to the notification.')
            ->action('Confirm your email address', route('users.confirm_email', ['userUuid' => $this->user->uuid]))
            ->line('Thank you for using our application!');
    }
}
