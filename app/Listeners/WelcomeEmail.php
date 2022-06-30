<?php

namespace App\Listeners;

use App\Events\WelcomeEvent;
use App\Mail\EmplyeeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeEmail extends Mailable
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


    public function handle(WelcomeEvent $event)
    {
        Mail::to($event->employee->email)->send(
            new EmplyeeMail($event->employee)
        );
    }
}
