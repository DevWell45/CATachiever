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
        // Pull the exact variable you have in Railway
        $rawKey = env('BREVO_API_KEY');
        
        // Clean it: remove quotes, newlines, and spaces
        $apiKey = str_replace(['"', "\n", "\r", " "], '', (string)$rawKey);

        return (new \Symfony\Component\Mailer\Bridge\Mailjet\Transport\MailjetTransportFactory)->create(
            new \Symfony\Component\Mailer\Transport\Dsn(
                'mailjet+api',
                'default',
                $apiKey // Symfony treats this third parameter as the "Password"
            )
        );
    });
}
}