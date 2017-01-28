<?php

namespace App\Listeners;

use App\Events\UserSignupEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserSignupEvent  $event
     * @return void
     */
    public function handle(UserSignupEvent $event)
    {
        //
    }
}
