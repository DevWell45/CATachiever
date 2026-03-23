<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            Mail::to($credentials['email'])->send(new \App\Mail\SendOTPMail($otp_code));
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
