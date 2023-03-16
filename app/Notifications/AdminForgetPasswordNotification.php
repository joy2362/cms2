<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class AdminForgetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $email, public $token)
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
        return $this->buildMailMessage($this->resetUrl());
    }

    /**
     * Get the reset password notification mail message for the given URL.
     *
     * @param string $url
     * @return MailMessage
     */
    protected function buildMailMessage(string $url): MailMessage
    {
        return (new MailMessage())
            ->subject(Lang::get('Reset Password Notification'))
            ->line(
                Lang::get('You are receiving this email because we received a password reset request for your account.')
            )
            ->action(Lang::get('Reset Password'), $url)
            ->line(
                Lang::get(
                    'This password reset link will expire in :count minutes.',
                    ['count' => config('auth.passwords.' . config('auth.admin.passwords') . '.expire')]
                )
            )
            ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    }


    /**
     * Get the reset URL for the given notifiable.
     *
     * @return string
     */
    protected function resetUrl(): string
    {
        return url(
            route('admin.password.reset', [
                'token' => $this->token,
                'email' => $this->email,
            ], false)
        );
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
