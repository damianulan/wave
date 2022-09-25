<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FirstLogin extends Notification
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

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->subject('Verify Email')
                    ->line('Welcome to Axial, we are pleased to have You. Use the button below to verify Your email.')
                    ->action('Verify', url(route('auth.emailVerified', auth()->user()->id)))
                    ->line('Thank you for using our application!');    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'icon' => 'feather icon-award',
            'color' => 'success',
            'heading' => __('notifications.firstlogin_heading', ['appname' => config('app.name')]),
            'text' => __('notifications.firstlogin_text'),
            'route' => 'notifications.markAsRead'
        ];
    }
}
