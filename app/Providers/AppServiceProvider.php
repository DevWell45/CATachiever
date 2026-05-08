<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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

        \Illuminate\Support\Facades\Mail::extend('mailjet', function () {
        // This is the "Secret Sauce": It forces the key into one line 
        // and removes the quotes that Railway is stuck on.
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