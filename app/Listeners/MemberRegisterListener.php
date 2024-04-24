<?php

namespace App\Listeners;

use App\Events\MemberRegisterEvent;
use App\Notifications\MemberNotification;
use Illuminate\Support\Facades\Notification;

class MemberRegisterListener
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
    public function handle(MemberRegisterEvent $event): void
    {
        Notification::send($event->member, new MemberNotification($event->member));
    }
}
