<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MailerService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function sendMail($email, $name, $otp_code){
        $htmlContent = "
            <div style='font-family: Arial; text-align:center; padding:20px;'>
                <div style='margin-bottom:20px;'>
                    <img src='https://catachiever.up.railway.app/images/components/Logo.png' width='100'>
                </div>
                <h2 style='color:#26AF5A; margin-bottom:10px;'> CATchiever </h2>
                <h2 style='color:#128C40;'>Email Verification</h2>
                <p>Your OTP code is:</p>
                <div style='font-size:30px; font-weight:bold; letter-spacing:5px; margin:20px 0;'>
                    {$otp_code}
                </div>
                <p>This code is valid for 10 minutes.</p>
            </div>
        ";

        $response = Http::withHeaders([
            'api-key' => env('BREVO_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => [
                'name' => env('MAIL_FROM_NAME', 'CATchiever'),
                'email' => env('MAIL_FROM_ADDRESS'),
            ],
            'to' => [[
                'email' => $email,
                'name' => $name,
            ]],
            'subject' => 'Your OTP Code',
            'htmlContent' => $htmlContent,
        ]);

        if (!$response->successful()) {
            \Log::error('Brevo Error: ' . $response->body());

            return back()->withErrors([
                'email' => 'Failed to send OTP email. Please try again.'
            ]);
        }

        
    }
}
