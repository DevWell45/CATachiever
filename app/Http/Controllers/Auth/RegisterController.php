<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validated_data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);
        $otp_code = rand(100000, 999999);

        try {
            Mail::to($validated_data['email'])
                ->send(new \App\Mail\SendOtpMail($otp_code));

            $user = User::create([
                'name' => $validated_data['name'], 
                'email' => $validated_data['email'],
                'password' => bcrypt($validated_data['password']),
                'otp' => $otp_code,
                'otp_expires_at' => Carbon::now()->addMinutes(10),
            ]);

        } catch (\Exception $e) {
            return back()->withErrors([
                'email' => 'Failed to send OTP email.'
            ]);
        }

        // $user = User::create([
        //     'name' => $validated_data['name'], 
        //     'email' => $validated_data['email'],
        //     'password' => bcrypt($validated_data['password']),
        //     'otp' => $otp_code,
        //     'otp_expires_at' => Carbon::now()->addMinutes(10),
        // ]);
        

        $otp_session = [
            'otp_id' => Str::random(40),
            'user_id' => $user->id
        ];

        session(['otp_session' => $otp_session]);
        // Mail::to($user->email)->send(new \App\Mail\SendOtpMail($otp_code));

        return redirect()->route('account_verification');
    }
}
