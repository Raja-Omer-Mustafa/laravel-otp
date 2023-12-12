<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function register(){
        return view('register');
    }
    // Register User
    public function userregister(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('login')->with('success', 'Registration successful! Please log in.');
    }

    public function login(){
        return view('login');
    }

        // login User

    public function userlogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();


        \Session::put('email', $request->email);
        // otp code
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        if ($user && Hash::check($request->password, $user->password)) {
            $user->update(['otp' => $otp]);

            return redirect('OTP_varification')->with('success','Check your email for otp!');

        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid email']);
        }


    }



}
