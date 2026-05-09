<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $otp_code = rand(100000, 999999);

        // 1. Create user first
        $user = User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => bcrypt($validated_data['password']),
            'otp' => $otp_code,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        // 2. HTML email (your design simplified but safe for API)
        $htmlContent = "
            <div style='font-family: Arial; text-align:center; padding:20px;'>
                <h2 style='color:#128C40;'>Email Verification</h2>
                <p>Your OTP code is:</p>
                <div style='font-size:30px; font-weight:bold; letter-spacing:5px; margin:20px 0;'>
                    {$otp_code}
                </div>
                <p>This code is valid for 10 minutes.</p>
            </div>
        ";

        // 3. Send email via Brevo API (NO SDK)
        $response = Http::withHeaders([
            'api-key' => env('BREVO_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => [
                'name' => env('MAIL_FROM_NAME', 'CATchiever'),
                'email' => env('MAIL_FROM_ADDRESS'),
            ],
            'to' => [[
                'email' => $user->email,
                'name' => $user->name,
            ]],
            'subject' => 'Your OTP Code',
            'htmlContent' => $htmlContent,
        ]);

        // 4. Debug failed email (IMPORTANT)
        if (!$response->successful()) {
            \Log::error('Brevo Error: ' . $response->body());

            return back()->withErrors([
                'email' => 'Failed to send OTP email. Please try again.'
            ]);
        }

        // 5. OTP session
        session([
            'otp_session' => [
                'otp_id' => Str::random(40),
                'user_id' => $user->id
            ]
        ]);

        return redirect()->route('account_verification');
    }
}