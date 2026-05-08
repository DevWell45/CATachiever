<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\URL;

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
            // Try to get the key from either variable name just in case
            $rawKey = env('BREVO_API_KEY') ?? env('MAIL_PASSWORD');
            
            // Clean the key
            $apiKey = str_replace(['"', "\n", "\r", " "], '', (string)$rawKey);

            return (new \Symfony\Component\Mailer\Bridge\Mailjet\Transport\MailjetTransportFactory)->create(
                new \Symfony\Component\Mailer\Transport\Dsn(
                    'mailjet+api',
                    'default',
                    $apiKey // Symfony throws "Password not set" if this is empty
                )
            );
        });
    }
}