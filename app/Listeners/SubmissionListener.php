<?php

namespace App\Listeners;

use App\Events\SubmissionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SubmissionListener
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
    public function handle(SubmissionEvent $event): void
    {
        Log::channel('skinnyRX')->info("Submission processed successfully. {$event->data->name}  {$event->data->email}");
    }
}
