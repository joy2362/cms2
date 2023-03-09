<?php

namespace App\Listeners;

use App\Events\ForgetPassword;
use App\Models\Admin;
use App\Notifications\AdminForgetPasswordNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendForgetPasswordVerificationNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ForgetPassword $event): void
    {
        Notification::send(
            $this->fetchAdmin($event->email),
            new AdminForgetPasswordNotification($event->email, $event->token)
        );
    }

    private function fetchAdmin($email)
    {
        return Admin::where('email', $email)->first();
    }
}
