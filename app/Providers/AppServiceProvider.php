<?php

namespace App\Providers;

use App\Events\SubmissionEvent;
use App\Services\ServiceResolver;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ServiceResolver::class, ServiceResolver::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
