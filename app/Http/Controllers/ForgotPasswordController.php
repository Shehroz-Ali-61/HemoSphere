<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgetpassword');
    }

    public function submitForgotPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        $email = $request->email;

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        try {
            Mail::send('email', ['token' => $token, 'email' => $email], function ($message) use ($email) {
                $message->to($email)
                        ->subject('Reset Password Notification');
            });
        } catch (\Exception $e) {
            \Log::error('Email sending error: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Failed to send email. Please try again later.']);
        }

        return redirect()->route('account.login')->with('success', 'We have emailed your reset link!');
    }

    public function showresetPasswordForm($token)
    {
        return view('resetpassword', [
            'token' => $token,
            'email' => request()->email
        ]);
    }

    public function submitresetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $passwordReset = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid token!']);
        }

        // Check if token is expired (60 minutes)
        $tokenAge = Carbon::parse($passwordReset->created_at)->diffInMinutes(Carbon::now());
        if ($tokenAge > config('auth.passwords.users.expire')) {
            return back()->withErrors(['email' => 'Token has expired!']);
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->route('account.login')
            ->with('success', 'Your password has been changed!');
    }
}