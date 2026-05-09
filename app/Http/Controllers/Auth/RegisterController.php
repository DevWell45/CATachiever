<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use GuzzleHttp\Client;

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

        $user = User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => bcrypt($validated_data['password']),
            'otp' => $otp_code,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        $config = Configuration::getDefaultConfiguration()
            ->setApiKey('api-key', env('BREVO_API_KEY'));

        $apiInstance = new TransactionalEmailsApi(
            new Client(),
            $config
        );

        $htmlContent = "
            <div style='font-family: Arial, sans-serif; text-align:center; padding:20px;'>
                <h2 style='color:#128C40;'>Email Verification</h2>
                <p>Your One-Time Password (OTP) is:</p>
                <div style='font-size:28px; font-weight:bold; letter-spacing:5px; margin:20px 0;'>
                    {$otp_code}
                </div>
                <p>This code is valid for 10 minutes.</p>
                <hr>
                <small>If you didn't request this, ignore this email.</small>
            </div>
        ";

        $sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
            'subject' => 'Your OTP Code - CATchiever',
            'sender' => [
                'name' => env('MAIL_FROM_NAME', 'CATchiever'),
                'email' => env('MAIL_FROM_ADDRESS'),
            ],
            'to' => [[
                'email' => $user->email,
                'name' => $user->name,
            ]],
            'htmlContent' => $htmlContent,
        ]);

        try {
            $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (\Exception $e) {
            \Log::error('Brevo Email Error: ' . $e->getMessage());

            return back()->withErrors([
                'email' => 'Failed to send OTP email. Please try again.'
            ]);
        }

        session([
            'otp_session' => [
                'otp_id' => Str::random(40),
                'user_id' => $user->id
            ]
        ]);

        return redirect()->route('account_verification');
    }
}