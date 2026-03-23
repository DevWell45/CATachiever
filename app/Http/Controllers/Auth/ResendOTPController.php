<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ResendOTPController extends Controller
{
    public function new_otp(){

        $id = session('otp_session')['user_id'];
        $user = User::find($id);

        $otp_code = rand(100000, 999999);
        
        User::where('id', $id)->update(['otp' => $otp_code, 'otp_expires_at' => Carbon::now()->addMinutes(10)]);
        Mail::to($user->email)->send(new \App\Mail\SendOTPMail($otp_code));
        return back()->with('success', 'OTP resent successfully');
    }
}
