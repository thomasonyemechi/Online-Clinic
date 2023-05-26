<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Mail\VerifyMail;
use App\Models\ResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    function UserSignUp(Request $request)
    {
        $val = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20',
            'phone' => 'required|string|min:6|max:20',
            'name' => 'required|min:6|max:50'
        ])->validate();
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        $this->sendmail($user->id);
        $log = Auth::loginUsingId($user->id);
        if (!$log) {
            return redirect('/login')->with('success', 'Sign up was sucessfull <br> Verirfication link has been sent to your mail');
        }
        return redirect('/dashboard')->with('success', 'Welcome <br> Verirfication link has been sent to your mail');
    }

    function LogUserIn(Request $request)
    {
        $val = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ])->validate();
        if (!Auth::attempt($val, 1)) {
            return back()->with('error', 'Invalid Credentials');
        }
        return redirect('/dashboard')->with('success', 'Welcome');
    }

    function LogMeOut()
    {
        Auth::logout();
        return redirect('/')->with('success', 'You are logged Out Scuessfully');
    }


    function verifyMail($id, $sha)
    {
        $user = User::find($id);
        if ($user->email_verified_at) {
            return redirect('/login')->with('success', 'Email already verified');
        }
        $user->update([
            'email_verified_at' => now()
        ]);
        return redirect('/login')->with('success', 'Verification Was Sucessfull');
    }


    function sendmail($id)
    {
        $user = User::find($id);
        Mail::to($user->email)->send(new VerifyMail($user));
        return;
    }

    function sendmailGet($id)
    {
        $this->sendmail($id);
        return redirect('/dashboard?ref=verification+sent')->with('success', 'Link has been resent sucessfully');
    }

    function win_hashs($length)
    {
        return substr(str_shuffle(str_repeat('123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
    }

    public function SendResetPasswordLink(Request $request)
    {
        $val = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ])->validate();

        $user = User::where(['email' => $request->email])->first();

        $last_token = ResetToken::where(['user_id' => $user->id])->orderBy('id', 'desc')->first();

        if ($last_token) {
            if ((time() - strtotime($last_token->created_at)) < 60) {
                return back()->with('error', 'Multiple request, wait for 1 miniute');
            }
        }


        $token = ResetToken::create([
            'user_id' => $user->id,
            'token' => $this->win_hashs(20)
        ]);

        Mail::to($user->email)->send(new ResetPassword($user, $token));


        return back()->with('success', 'Password reset link has been sent to your account email address');

        return response([
            'message' => 'Password reset link has been sent to your account email address'
        ]);
    }


    function makePassword(Request $request)
    {
        $val = Validator::make($request->all(), [
            'password' => 'required|string|confirmed',
            'token' => 'required|exists:reset_tokens,token'
        ])->validate();

        $token = ResetToken::where(['token' => $request->token])->first();

        if ($token->status == 1) {
            return back()->with('error', 'This password reset link has already been used');
        }

        User::where('id', $token->user_id)->update([
            'password' => Hash::make($request->password)
        ]);

        $token->update([
            'status' => 1
        ]);

        return back()->with('success', 'You password has been updated scuessfully <br> Proceed to login!');
    }
}
