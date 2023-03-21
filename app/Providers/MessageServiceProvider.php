<?php

namespace App\Providers;

use App\Services\EmailMessageService;
use App\Services\ViberMessageService;
use Illuminate\Support\ServiceProvider;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\MessageService', function ($app) {
            return new EmailMessageService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
