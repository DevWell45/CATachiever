<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();
        if (Auth::user()->email_verified_at === null) {
            $otp_code = rand(100000, 999999);
            $user_id = User::where('email', $credentials['email'])->value('id');
            User::where('email', $credentials['email'])->update(['otp' => $otp_code, 'otp_expires_at' => Carbon::now()->addMinutes(10)]);
            $otp_session = ['email' => $credentials['email'], 'user_id' => $user_id];
            session(['otp_session' => $otp_session]);
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
                    'email' => $user->email,
                    'name' => $user->name,
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
            Auth::logout();

            return redirect()->route('account_verification');
        }
        return redirect()->route('home_page');
    }

    return back()->withErrors([
        'login' => 'Invalid Credentials'
    ]);
}
}
