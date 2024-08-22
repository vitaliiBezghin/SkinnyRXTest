<?php

namespace App\Providers;

use App\Events\SubmissionEvent;
use App\Listeners\SubmissionListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SubmissionEvent::class => [
            SubmissionListener::class,
        ]
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
