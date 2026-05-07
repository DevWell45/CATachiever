<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail; // Add this
use Illuminate\Support\Facades\URL;  // Clean up URL reference
use Symfony\Component\Mailer\Bridge\Mailjet\Transport\MailjetTransportFactory; // Add this
use Symfony\Component\Mailer\Transport\Dsn; // Add this

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // --- ADD THIS BLOCK ---
        Mail::extend('mailjet', function (array $config) {
            return (new MailjetTransportFactory)->create(
                new Dsn(
                    'mailjet+api',
                    'default',
                    $config['key'],
                    $config['secret'] ?? 'not-needed'
                )
            );
        });
        // ----------------------
    }
}