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
            \URL::forceScheme('https');
        }

        \Illuminate\Support\Facades\Mail::extend('mailjet', function () {
            // This line cleans the key: it removes quotes, newlines, and spaces
            $apiKey = str_replace(['"', "\n", "\r", " "], '', env('BREVO_API_KEY'));

            return (new \Symfony\Component\Mailer\Bridge\Mailjet\Transport\MailjetTransportFactory)->create(
                new \Symfony\Component\Mailer\Transport\Dsn(
                    'mailjet+api',
                    'default',
                    $apiKey
                )
            );
        });
    }
}