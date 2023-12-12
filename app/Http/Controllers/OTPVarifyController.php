<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OTPVarifyController extends Controller
{
    public function otpview(){
        return view('OTP_varification');
    }
    public function otpvarify(Request $request){
        $request->validate([
            'otp' => 'required',
        ]);

        $email=Session::get('email');
        $user=User::where('email',$email)->first();
// dd($user->otp);
        if ($user && $user->otp == $request->otp) {
            $user->update(['otp' => null]);

            Auth::login($user);

            return redirect('/dashboard')->with('success', 'OTP verified. You are now logged in.');
        }

        return redirect('OTP_varification')->withErrors(['otp' => 'Invalid OTP']);

    }
}
