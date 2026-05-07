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

        $user = User::create([
            'name' => $validated_data['name'], 
            'email' => $validated_data['email'],
            'password' => bcrypt($validated_data['password']),
            'otp' => $otp_code,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);
        Mail::to($user->email)->afterCommit()->queue(new \App\Mail\SendOtpMail($otp_code));

        $otp_session = [
            'otp_id' => Str::random(40),
            'user_id' => $user->id
        ];

        session(['otp_session' => $otp_session]);

        return redirect()->route('account_verification');
    }
}
