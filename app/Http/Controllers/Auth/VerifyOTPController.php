<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyOTPController extends Controller
{
    public function verify_otp(Request $request){

        $otp_input = $request->validate([
            'otp1' => 'required',
            'otp2' => 'required',
            'otp3' => 'required',
            'otp4'=>  'required',
            'otp5' => 'required',
            'otp6' => 'required',
        ]); 

        $otp = $otp_input['otp1'].$otp_input['otp2'].$otp_input['otp3'].$otp_input['otp4'].$otp_input['otp5'].$otp_input['otp6'];
        $otp_session = session('otp_session');

        $user = User::findorFail($otp_session['user_id']);

        
        if($otp === $user->otp){
            if(Carbon::now()->lessThan($user->otp_expires_at)){
                $user->update([ 'verified' => true, 'email_verified_at' => Carbon::now(), 'otp' => null, 'otp_expires_at' => null ]);
                session()->forget('otp_session');
                Auth::login($user);
                return redirect()->route('home_page');
            }else{
                return back()->withErrors(['expired_otp' => 'Your OTP has been expired']);
            }
            
        }


        return back()->withErrors(['otp' => 'Invalid OTP code.']);

    }
}
